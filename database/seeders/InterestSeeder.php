<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->interests() as $key => $interestName) {
            $interest = new Interest;
            $interest->id = $key + 1;
            $interest->name = $interestName;
            $interest->save();
        }
    }

    /**
     * @return string[]
     */
    private function interests(): array
    {
        return [
            'Travel',
            'Reading',
            'Photography',
            'Cooking',
            'Gardening',
            'Sports',
            'Dance',
            'Art',
            'Writing',
            'Painting',
            'Camping',
            'Music',
            'Fishing',
            'Singing',
            'Baking',
            'Hiking',
            'Basketball',
            'Surfing',
        ];
    }
}

