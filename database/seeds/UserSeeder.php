<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'bigchun1010',
            'email' => '610107@163.com',
            'password' => Hash::make('gzisa'),
            'profile' => './uploads/20180818/15345629427097.jpeg',
            'intro' => 'intro1010'
        ]);
        /*factory(App\User::class, 50)->create()->each(function($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
