<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 2,
            'discussion_id' => 1,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.'
        ];

        $r2 = [
            'user_id' => 2,
            'discussion_id' => 2,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.'
        ];

        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.'
        ];

        $r4 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.'
        ];

        $r5 = [
            'user_id' => 2,
            'discussion_id' => 5,
            'content' => 'The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
        Reply::create($r5);
    }
}
