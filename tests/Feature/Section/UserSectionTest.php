<?php

namespace Tests\Feature\Section;

use App\Models\Section;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_is_able_to_fetch_section_data()
    {
        $user = User::factory()->create();
        $sections = Section::factory()->count(5)->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->withHeaders([
            'Accept' => 'application/json',
            ''
        ])->get(route('api.sections.index'));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'content' => $sections[0]->content
                ]
            ]
        ]);
    }
}
