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
            'bahasa' => 'Korea',
            'deleted_by' => null
        ]);

        DB::table('contents')->insert([[
            'reference_key' => 'head',
            'value' => 'Welcome to Nihonesia',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ], [
            'reference_key' => 'sub judul',
            'value' => 'nihonesia is an audio dataset consisting of short clip of human speech in japanese.',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ], [
            'reference_key' => 'about word',
            'value' => 'T',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ], 
        [
            'reference_key' => 'about left',
            'value' => 'Nihonesia Speech Dataset',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ],
        [
            'reference_key' => 'about long',
            'value' => 'he voice issued by humans is a medium for communicating with fellow humans. The sound issued is basically unique to each individual. 
            With the development of technology, machines can recognize human voices. Nihonesia is a voice dataset collection website in Japanese that aims to 
            help everyone build a voice recognition system or other type of application that requires voice data. Nihonesia was developed by Multimedia Nusantara University 
            students and focuses on providing more voice data for everyone who wants to build voice-based technology.',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,

        ]]);
    }
}
