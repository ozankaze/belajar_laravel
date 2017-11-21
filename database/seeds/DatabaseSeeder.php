<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentTableSeeder::class); ///tiap kali bikin seeder kita wajib masukkinya di sini supaya bisa di jalankan
        // $this->call(UsersTableSeeder::class);
        $this->call(Users
        TableSeeder::class);
    }
}
