<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'laravel'];
        $channel2 = ['title' => 'angular'];
        $channel3 = ['title' => 'php'];
        $channel4 = ['title' => '.Net'];
        $channel5 = ['title' => 'pyhton'];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
