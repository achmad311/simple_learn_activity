<?php

namespace Database\Seeders;

use App\Models\LearnActivityMethod;
use Illuminate\Database\Seeder;

class LearningActivityMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            [
                "name" => "Workshop/ Self Learning",
            ],
            [
                "name" => "Sharing Practice/ Profesional's Talk",
            ],
            [
                "name" => "Discussion Room",
            ],
            [
                "name" => "Coaching",
            ],
            [
                "name" => "Mentoring",
            ],
            [
                "name" => "Job Assignment",
            ],
        ];
        foreach ($methods as $method) {
            LearnActivityMethod::create($method);
        }
    }
}
