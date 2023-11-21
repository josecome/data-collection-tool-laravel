<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
'field_name'=>'LCD200',

class ProjectFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_forms')->insert([
            [
                'field_name'=>'first_name',
                'field_label'=>'First Name',
                'field_description'=>'First Name Field',
                'field_type'=>'String',
                'field_size'=>'40',
                "user_id"=>1,
            ],
        ]);
    }
}
