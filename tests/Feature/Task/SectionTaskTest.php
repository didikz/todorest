<?php

namespace Tests\Feature\Task;

use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_is_able_to_see_all_task_by_section()
    {
        $user = User::factory()->create();
        $section = Section::factory()->create(['user_id' => $user->id]);
        $tasks = Task::factory()->count(10)->create(['user_id' => $user->id, 'section_id' => $section->id]);
        $response = $this->actingAs($user)->withHeaders([
            'Accept' => 'application/json'
        ])->get(route('api.sections.tasks', [$section]));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => $tasks[5]->id,
                    'content' => $tasks[5]->content,
                    'section' => [
                        'id' => $section->id,
                        'content' => $section->content
                    ]
                ]
            ]
        ]);
    }

    public function test_user_is_able_to_see_detail_task_by_section()
    {
        $user = User::factory()->create();
        $section = Section::factory()->create(['user_id' => $user->id]);
        $task = Task::factory()->create(['user_id' => $user->id, 'section_id' => $section->id]);
        $response = $this->actingAs($user)->withHeaders([
            'Accept' => 'application/json'
        ])->get(route('api.sections.tasks.detail', [$section, $task]));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $task->id,
                'content' => $task->content,
                'section' => [
                    'id' => $section->id,
                    'content' => $section->content
                ]
            ]
        ]);
    }
}
