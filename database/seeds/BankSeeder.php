<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = array(
            array('id' => '1','name' => 'Access Bank','code'=>'044', 'short' => 'ACC'),
            array('id' => '2','name' => 'Citibank','code'=>'023', 'short' => 'CTB'),
            array('id' => '3','name' => 'Diamond Bank','code'=>'063', 'short' => 'DBN'),
            array('id' => '4','name' => 'Dynamic Standard Bank','code'=>'', 'short' => 'DSB'),
            array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050', 'short' => 'ECO'),
            array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070', 'short' => 'FID'),
            array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011', 'short' => 'FBN'),
            array('id' => '8','name' => 'First City Monument Bank','code'=>'214', 'short' => 'FCMB'),
            array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058', 'short' => 'GTB'),
            array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030', 'short' => 'HBP'),
            array('id' => '11','name' => 'Jaiz Bank','code'=>'301', 'short' => 'JB'),
            array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082', 'short' => 'KBL'),
            array('id' => '13','name' => 'Providus Bank Plc','code'=>'101', 'short' => 'PBP'),
            array('id' => '14','name' => 'Polaris Bank','code'=>'076', 'short' => 'PB'),
            array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221', 'short' => 'IBTC'),
            array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068', 'short' => 'SCB'),
            array('id' => '17','name' => 'Sterling Bank','code'=>'232', 'short' => 'STB'),
            array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100', 'short' => 'SBNL'),
            array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032', 'short' => 'UBN'),
            array('id' => '20','name' => 'United Bank for Africa','code'=>'033', 'short' => 'UBA'),
            array('id' => '21','name' => 'Unity Bank Plc','code'=>'215', 'short' => 'UBP'),
            array('id' => '22','name' => 'Wema Bank','code'=>'035', 'short' => 'WEM'),
            array('id' => '23','name' => 'Zenith Bank','code'=>'057', 'short' => 'ZEB')
        );

        DB::table('banks')->insert($banks);
    }
}
