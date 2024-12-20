<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserModuleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_list_users()
    {
        User::factory()->create(['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com', 'enabled' => true]);
        User::factory()->create(['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com', 'enabled' => false]);
        User::factory()->create(['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com', 'enabled' => true]);

        $response = $this->get('/users');


        $response->assertStatus(200)
                 ->assertJson([
                     "1" => [
                         "id" => 1,
                         "name" => "Alice",
                         "email" => "alice@example.com",
                         "enabled" => true,
                     ],
                     "2" => [
                         "id" => 2,
                         "name" => "Bob",
                         "email" => "bob@example.com",
                         "enabled" => false,
                     ],
                     "3" => [
                         "id" => 3,
                         "name" => "Charlie",
                         "email" => "charlie@example.com",
                         "enabled" => true,
                     ],
                 ]);
    }

    /** @test */
    public function it_can_disable_a_user()
    {
        $user = User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'enabled' => true,
        ]);

        $response = $this->post("/users/disable/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $user->id,
                     'name' => $user->name,
                     'email' => $user->email,
                     'enabled' => false,
                 ]);

        $this->assertFalse($user->fresh()->enabled);
    }

    /** @test */
    public function it_can_enable_a_user()
    {
        $user = User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'enabled' => false,
        ]);

        $response = $this->post("/users/enable/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $user->id,
                     'name' => $user->name,
                     'email' => $user->email,
                     'enabled' => true,
                 ]);

        $this->assertTrue($user->fresh()->enabled);
    }
}
