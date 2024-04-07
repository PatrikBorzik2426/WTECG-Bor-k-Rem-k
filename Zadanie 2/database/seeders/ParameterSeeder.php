<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the parameters data
        $parameters = [
            ['parameter' => 'color', 'value' => 'red'],
            ['parameter' => 'color', 'value' => 'blue'],
            ['parameter' => 'color', 'value' => 'green'],
            ['parameter' => 'size', 'value' => 'small'],
            ['parameter' => 'size', 'value' => 'medium'],
            ['parameter' => 'size', 'value' => 'large'],
            // Add more parameters as needed
        ];

        // Insert the data into the parameters table
        DB::table('parameters')->insert($parameters);
    }
}