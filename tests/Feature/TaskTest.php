<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Task;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $task;
    protected $user;
    protected $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taskStatus = TaskStatus::factory()->create();
        $this->user = User::factory()->create();
        $this->task = Task::factory()->create();
    }

    /** @return void */
    public function testIndex()
    {
        $this->get(route('tasks.index'))
            ->assertOk();
    }

    /** @return void */
    public function testCreate()
    {
        $this->actingAs($this->user)
        ->get(route('tasks.create'))
        ->assertOk();
    }
}
