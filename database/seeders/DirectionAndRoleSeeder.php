<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Direction;
use App\Models\Role;

class DirectionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'Гость',
                'slug' => 'guest',
            ],
            [
                'name' => 'Студент',
                'slug' => 'student',
            ]
        ]);

        Direction::insert([
            [
                'name' => 'Бакалавр',
            ],
            [
                'name' => 'Магистр',
            ]
        ]);
    }
}
