<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Regras;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regra_master = Regras::where('nome', 'master')->first();

        $master = new User();
        $master->name = "Master";
        $master->email = "master@teste.com";
        $master->password = bcrypt('123456');
        $master->save();
        $master->regras()->attach($regra_master);
    }
}
