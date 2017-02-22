<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use  App\Models\User;
use App\Models\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        Contact::truncate();

        foreach(range(1, 25) as $i) {
            Contact::create([
                'user_id' => $user->id,
                'company' => $faker->company,
                'email_address' => $faker->email,
                'contact_name' => $faker->name,
                'job_title' => $faker->jobTitle,
            ]);
        }
    }
}
