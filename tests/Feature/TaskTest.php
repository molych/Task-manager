<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Task;
use Faker\Factory;

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

    /** @return void */
    public function testStore()
    {
        $data = [
            'name' => Factory::create()->text(30),
            'description' => Factory::create()->text(100),
            'status_id' => $this->taskStatus->id,
            'created_by_id' => $this->user->id,
            'assigned_to_id' => $this->user->id
        ];
        $this->actingAs($this->user)
            ->post(route('tasks.store', $data))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tasks', $data);
    }

    /** @return void */
    public function testShow()
    {
        $this->get(route('tasks.show', $this->task))
        ->assertOk();
    }

    /** @return void */
    public function testEdit()
    {
        $this
            ->actingAs($this->task->createdBy)
            ->get(route('tasks.edit', $this->task))
            ->assertOk();
    }

    /** @return void */
    public function testUpdate()
    {
        $data = [
            'name' => Factory::create()->text(30),
            'description' => Factory::create()->text(100),
            'status_id' => TaskStatus::factory()->create()->id,
            'assigned_to_id' => User::factory()->create()->id
        ];
        $response = $this
            ->actingAs($this->task->createdBy)
            ->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tasks', $data);
    }

    /** @return void */
    public function testDelete()
    {
        $this
            ->actingAs($this->task->createdBy)
            ->delete(route('tasks.destroy', $this->task))
            ->assertSessionHasNoErrors();
        $this->assertDeleted('tasks', [$this->task]);
    }
}
