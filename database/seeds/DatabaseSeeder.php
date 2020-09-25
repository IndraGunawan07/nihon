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
            'secret_question' => 'testjua',
            'secret_answer' => 'test',
            'role' => 'Contributor',
            'is_locked' => 1,
            'created_by' =>1, 
            'deleted_at' =>null,
            'deleted_by' =>null, 
        ]);

        DB::table('terms')->insert([
            'in_jws' => 'Katakana',
            'in_rws' => 'Aapa hayo',
            'bahasa_translation' => 'ini apa',
            'sound_file_url' => '',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
            'created_by' => 1,
            'updated_by' => 1,
            'deleted_by' => null
        ]);
    }
}
