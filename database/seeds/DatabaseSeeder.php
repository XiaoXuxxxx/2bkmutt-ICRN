<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\HasRole;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(StaticContentSeeder::class);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@2bkmutt.com',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        User::where('name', '=', 'admin')->first()->roles()->attach(Role::where('name', '=' ,'admin')->first()->id );

	DB::table('users')->insert([
            'name' => 'SeniorTester',
            'email' => 'senior@2bkmutt.com',
            'password' => bcrypt('senior'),
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        User::where('name', '=', 'SeniorTester')->first()->roles()->attach(Role::where('name', '=' ,'senior')->first()->id );
    	
	DB::table('users')->insert([
            'name' => 'JuniorTester',
            'email' => 'junior@2bkmutt.com',
            'password' => bcrypt('junior'),
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        User::where('name', '=', 'JuniorTester')->first()->roles()->attach(Role::where('name', '=' ,'junior')->first()->id );

    }
}
