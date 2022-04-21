<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'Name' => $this->faker->name(),
            'NIK_pegawai' => rand(100001,100099),
            'Branch' => 'Jakarta',
            'Jabatan' => 'Staff',
            'Join_date' => $this->faker->date(),
            'Resign_date' => '1900-12-31',
        ];
    }
}
