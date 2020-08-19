<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'username' => 'indra',
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
            'secret_question' => 'test',
            'secret_answer' => 'test',
            'role' => 'test',
            'is_locked' => 1,
            'created_by' => 1,
            'deleted_at' => null,
            'deleted_by' => 1
        ]);
    }
}
