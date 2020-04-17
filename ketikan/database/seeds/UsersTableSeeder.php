<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $masyarakatRole = Role::where('name', 'masyarakat')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        
        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas')
        ]);
        $masyarakat = User::create([
            'name' => 'Kalam',
            'email' => 'kalam@gmail.com',
            'password' => bcrypt('kalam1313')
        ]);

        $admin->roles()->attach($adminRole);
        $petugas->roles()->attach($petugasRole);
        $masyarakat->roles()->attach($masyarakatRole);
    }
}
