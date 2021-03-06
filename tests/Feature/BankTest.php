<?php

namespace Tests\Feature;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Seeder;

class BankTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    public $user;
    public $token;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        parent::seed(\BankSeeder::class);

        $this->authenticateUser();
    }



    public function testUserCanGetListOfBanks()
    {
        $response = $this->withToken($this->token)->getJson('api/banks/list');

        $response->assertOk();
        $response->assertJsonStructure(['data']);
    }



    public function testUserCanSaveBankAccountDetail()
    {
        $data = [
            "bank_id" => 1,
            "name" => "William",
            "type" => "savings",
            "number" => "0123456789"
        ];

        $response = $this->withToken($this->token)->postJson('api/user/bank/account', $data);



        $response->assertOk();
        $response->assertJsonStructure(['data']);
        $response->assertJson(['message' => "Successful"]);
    }







    private function authenticateUser()
    {

        $user = factory(User::class)->create();
        $response = $this->postJson('api/auth/login', ["email" => $user->email, "password" => "password"]);
        $data = $response->json();

        $this->token = $data['access_token'];
    }
}
