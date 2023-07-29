<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //============ Création d'un utilisateur avec le rôle "Admin" et toutes les permissions ============//
        $admin = User::create([
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
            'status' => '0',
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminPermissions = Permission::pluck('id','id')->all();
        $adminRole->syncPermissions($adminPermissions);
        $admin->assignRole([$adminRole->id]);


        // ============Création d'un utilisateur avec le rôle "Stagiaire" et une permission ============//
        $stagiaire = User::create([
            'nom' => 'st',
            'email' => 'stagiaire@gmail.com',
            'prenom' => 'st',
            'password' => bcrypt('12345'),
            'contact' => '00000000000',
            'matricule' => 'ST0000000000',
            'cni' => 'CI0000000',
            'naissance' => date('2000-02-01'),
            'fonction' => date('2000-02-01'),
            'photo' => 'ST',
            'password_confirm' => bcrypt('12345'),
            'status' => '0',
        ]);

        $stagiaireRole = Role::create(['name' => 'Stagiaire']);
        $stagiairePermissions = Permission::where('name', 'view-pageP')->first();
        $stagiaireRole->syncPermissions($stagiairePermissions);
        $stagiaire->assignRole([$stagiaireRole->id]);


        // ============Création d'un utilisateur avec le rôle "Personnel" et une permission ============//
        $personnel = User::create([
            'nom' => 'ps',
            'email' => 'personnel@gmail.com',
            'prenom' => 'ps',
            'password' => bcrypt('12345'),
            'contact' => '00000000000',
            'matricule' => 'PS0000000000',
            'cni' => 'CI0000010',
            'naissance' => date('2000-02-01'),
            'fonction' => date('2000-02-01'),
            'photo' => 'ST',
            'password_confirm' => bcrypt('12345'),
            'status' => '0',
        ]);

        $personnelRole = Role::create(['name' => 'Personnel']);
        $personnelPermissions = Permission::where('name', 'view-pageP')->first();
        $personnelRole->syncPermissions($personnelPermissions);
        $personnel->assignRole([$personnelRole->id]);
    }
}
