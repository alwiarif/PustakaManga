<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->username = "admin";
        $admin->name = "admin";
        $admin->email = "admin@mail.com";
        $admin->roles = json_encode(["ADMIN"]);
        $admin->password = \Hash::make("admin1234");

        $admin->save();

        $this->command->info("User admin berhasil di buat");

    }
}
