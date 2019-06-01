<?php

use Illuminate\Database\Seeder;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minModels = 5;
        $rulesCount = \App\Rule::count();
        if($rulesCount < $minModels){
            for($i=0;$i<$minModels;$i++){
                $rule = factory(\App\Rule::class)->create();
            }
        }
    }
}
