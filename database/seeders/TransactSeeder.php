<?php

namespace Database\Seeders;

use Database\Factories\TransactFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transact_factory = new TransactFactory();
        $transact_factory->count(5)
        ->create();
    }
}
