<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\post;
use App\Models\User;
use App\Models\category;
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
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create(['name' => 'Aditya Kesuma', 'email' => 'aditya@example.com', 'password' => bcrypt('12345')]);

        // post::create(['name' => 'Aditya Kesuma', 'email' => 'aditya@example.com', 'password' => bcrypt('12345')]);

        category::create(['name' => 'Web-programming', 'slug' => 'web-programming']);
        category::create(['name' => 'Personal', 'slug' => 'personal']);
        category::create(['name' => 'Web-Design', 'slug' => 'web-design']);


        // for ($i = 0; $i < 2; $i++) {
        //     post::create(['user_id' => 1, 'category_id' => 1, 'judul' => 'web_programming_' . $i, 'slug' => 'sweb_programming_' . $i, 'excerpt' => 'asdasdsad', 'body' => '<p>sdsdkjksdjsdjk</p> <p>sdjsjkdjksdjsd</p>']);
        // }
        // for ($i = 0; $i < 2; $i++) {
        //     post::create(['user_id' => 1, 'category_id' => 2, 'judul' => 'personal' . $i, 'slug' => 'spersonal_' . $i, 'excerpt' => 'asdasdsad', 'body' => '<p>sdsdkjksdjsdjk</p> <p>sdjsjkdjksdjsd</p>']);
        // }
        // for ($i = 0; $i < 2; $i++) {
        //     post::create(['user_id' => 2, 'category_id' => 2, 'judul' => 'cpersonal' . $i, 'slug' => 'cpersonal_' . $i, 'excerpt' => 'asdasdsad', 'body' => '<p>sdsdkjksdjsdjk</p> <p>sdjsjkdjksdjsd</p>']);
        // }

        post::factory(20)->create();
    }
}