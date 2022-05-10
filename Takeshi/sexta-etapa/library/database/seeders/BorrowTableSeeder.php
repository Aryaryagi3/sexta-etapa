<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BorrowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Borrow::factory(100)->create();
    }
}
