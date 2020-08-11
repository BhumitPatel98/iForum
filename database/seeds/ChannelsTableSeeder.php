<?php

use App\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'laravel', 'slug' =>Str::slug('laravel')];
        $channel2 = ['title' => 'angular', 'slug' =>Str::slug('angular')];
        $channel3 = ['title' => 'php', 'slug' =>Str::slug('php')];
        $channel4 = ['title' => '.Net', 'slug' =>Str::slug('.Net')];
        $channel5 = ['title' => 'pyhton', 'slug' =>Str::slug('python')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
