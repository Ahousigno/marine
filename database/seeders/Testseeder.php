<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Testseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'nom' => 'Aviet',
                'email' => 'briceline03aout@gmail.com',
                'prenom' => 'Signo Marceline',
                'password' => bcrypt('12345'),
                'contact' => '0787387809',
                'matricule' => 'AVIS10098001',
                'cni' => 'CI00048000',
                'naissance' => date('2000-02-01'),
                'fonction' => date('2000-02-01'),
                'photo' => 'Signo Marceline',
                'password_confirm' => bcrypt('12345'),
            ],

        ]);
    }
}