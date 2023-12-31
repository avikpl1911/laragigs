<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
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
        

        $user = \App\Models\User::factory()->
        create([
                'name' => 'john Doe',
                'email' => 'john@gmail.com',
            ])
        ;

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::factory(6)->create([
          'user_id'=>$user->id
        ]);
    }
}
