<?php

use Illuminate\Database\Seeder;
use App\CinemaBranch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $arr = [
            'Fastlane Lagos',
            'Fastlane Ibadan',
            'Fastlane Abeokuta'
        ];
        
        foreach($arr as $ar){
            CinemaBranch::create(
             ['name' => $ar]
            );
        }
 
    }
}
