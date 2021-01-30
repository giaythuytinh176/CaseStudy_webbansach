<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->email = 'giaythuytinh176@gmail.com';
        $user->password = Hash::make('0979029556');
        $user->admin = 1;
        $user->save();
        echo "Insert admin 1 ... \r\n";
        $user = new User();
        $user->email = 'giaythuytinh176@live.com';
        $user->password = Hash::make('0979029556');
        $user->admin = 0;
        $user->save();
        echo "Insert admin 2 ... \r\n";
        $user = new User();
        $user->email = 'giaythuytinh176@hotmail.com';
        $user->password = Hash::make('0979029556');
        $user->admin = 0;
        $user->save();
        echo "Insert admin 3 ... \r\n";
    }
}
