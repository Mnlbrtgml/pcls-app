<?php

namespace Database\Seeders;

use Database\Factories\ScheduleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule_factory = new ScheduleFactory();
        $schedule_factory->count(5)
        ->create();
    }
}
