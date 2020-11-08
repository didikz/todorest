<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = [
            'TO_DO',
            'DONE'
        ];

        return [
            'content' => $this->faker->sentence(random_int(2, 5)),
            'status' => $statuses[random_int(0, 1)]
        ];
    }
}
