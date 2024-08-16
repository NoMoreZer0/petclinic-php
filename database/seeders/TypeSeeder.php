<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run() {
        $types = [
            [
                'name' => 'Ice',
                'color' => '#96D9D6'
            ],
            [
                'name' => 'Water',
                'color' => '#6390F0'
            ],
            [
                'name' => 'Dragon',
                'color' => '#6F35FC'
            ],
            [
                'name' => 'Dark',
                'color' => '#705746',
            ],
            [
                'name' => 'Fairy',
                'color' => '#D685AD'
            ],
            [
                'name' => 'Poison',
                'color' => '#A33EA1'
            ],
            [
                'name' => 'Psychic',
                'color' => '#F95587'
            ],
            [
                'name' => 'Steel',
                'color' => 'B7B7CE'
            ]
        ];
        foreach ($types as $type) {
            Type::create([
                'name' => $type['name'],
                'color' => $type['color']
            ]);
        }
    }
}
