<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['order_status' => 'Completed']);
        Status::create(['order_status' => 'Not Completed']);
        Status::create(['order_status' => 'Cancelled']);
    }
}
