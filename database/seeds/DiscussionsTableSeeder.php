<?php

use App\Discussion;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = 'laravel';
        $a2 = 'angular';
        $a3 = 'php';
        $a4 = '.net';
        $a5 = 'python';

        $b1 = [

            'title' => $a1,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.',
            'channel_id'=> 1,
            'user_id' => 1,
            'slug' =>Str::slug($a1)
        ];

        $b2 = [

            'title' => $a2,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.',
            'channel_id'=> 2,
            'user_id' => 1,
            'slug' =>Str::slug($a2)
        ];

        $b3 = [

            'title' => $a3,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.',
            'channel_id'=> 3,
            'user_id' => 1,
            'slug' =>Str::slug($a3)
        ];

        $b4 = [

            'title' => $a4,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.',
            'channel_id'=> 4,
            'user_id' => 1,
            'slug' =>Str::slug($a4)
        ];

        $b5 = [

            'title' => $a5,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.',
            'channel_id'=> 5,
            'user_id' => 1,
            'slug' =>Str::slug($a5)
        ];

        Discussion::create($b1);
        Discussion::create($b2);
        Discussion::create($b3);
        Discussion::create($b4);
        Discussion::create($b5);
    }
}
