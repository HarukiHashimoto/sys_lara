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
        $faker = Faker\Factory::create('ja_JP');

        $user = new \App\User();
        $user->name = $faker->name;
        $user->email = $faker->unique()->safeEmail;
        $user->password = bcrypt('password');
        $user->remember_token = str_random(10);
        $user->save();

        $user_model = new \App\UserModel();
        $user_model->user_id = $user->id;
        $user_model->url = $faker->url;
        $user_model->save();

        $material = new \App\Material();
        $material->title = $faker->word;
        $material->text = $faker->realText(1000);
        $material->save();
    }
}
