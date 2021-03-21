<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function testUserRegistrationNameIsRequiredResponse()
    {
        $data = [
          "name" => null,
          "email" => $this->faker->email,
            "password" => "password"
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);
        $response->assertJsonValidationErrors(['name' => "The name field is required"]);
    }



    public function testUserRegistrationEmailIsRequiredResponse()
    {
        $data = [
          "name" => $this->faker->name,
          "email" => null,
            "password" => "password"
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);
        $response->assertJsonValidationErrors(['email' => "The email field is required"]);
    }



    public function testUserRegistrationEmailIsInvalidResponse()
    {
        $data = [
          "name" => $this->faker->name,
          "email" => 'invalid email',
            "password" => "password"
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);
        $response->assertJsonValidationErrors(['email' => "The email must be a valid email address."]);
    }




    public function testUserRegistrationPasswordIsLessThanEightCharactersResponse()
    {
        $data = [
          "name" => $this->faker->name,
          "email" => $this->faker->email,
            "password" => "passrd"
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);
        $response->assertJsonValidationErrors(['password' => "The password must be at least 8 characters."]);
    }



    public function testUserCanRegisterSuccessfully()
    {
        $data = [
          "name" => $this->faker->name,
          "email" => $this->faker->email,
            "password" => "password"
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertCreated(); // sames as assertStatus(201)
        $response->assertJson(['message' => RegisterController::RESPONSE_MESSAGE]);
    }


    public function testUserAlreadyExistsResponse()
    {
        $email = $this->faker->email;

        $user = new User();
        $user->name =  $this->faker->name;
        $user->email = $email;
        $user->password = bcrypt("password");

        $user->save();

        $data2 = [
          "name" => $this->faker->name,
          "email" => $email,
            "password" => "password"
        ];

        $response = $this->postJson('api/auth/register', $data2);

        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);
        $response->assertJsonValidationErrors(['email' => "The email has already been taken."]);
    }


}
