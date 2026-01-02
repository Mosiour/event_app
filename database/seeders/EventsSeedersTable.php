<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Illuminate\Support\now;

class EventsSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Music Concert',
            'description' => 'An evening of classical music performances.',
            'start_time' => now()->addDays(10)->setTime(19, 0, 0),
            'end_time' => now()->addDays(10)->setTime(22, 0, 0),
        ]);
        Event::create([
            'title' => 'Art Exhibition',
            'description' => 'Showcasing contemporary art from local artists.',
            'start_time' => now()->addDays(15)->setTime(10, 0, 0),
            'end_time' => now()->addDays(15)->setTime(18, 0, 0),
        ]);
        Event::create([
            'title' => 'Tech Conference',
            'description' => 'A gathering of tech enthusiasts and professionals.',
            'start_time' => now()->addDays(30)->setTime(9, 0, 0),
            'end_time' => now()->addDays(30)->setTime(17, 0, 0),
        ]);
    }
}
