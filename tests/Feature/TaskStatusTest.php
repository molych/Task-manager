<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use Faker\Factory;

class TaskStatusTest extends TestCase
{
    protected $taskStatus;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taskStatus = TaskStatus::factory()->create();
        $this->user = User::factory()->create();
    }
    /** @return void */
    public function testIndex()
    {
        $this->get(route('task_statuses.index'))
            ->assertOk();
    }

    /** @return void */
    public function testCreate()
    {
        $this->actingAs($this->user)
            ->get(route('task_statuses.create'))
            ->assertOk();
    }

    /** @return void */
    public function testStore()
    {
        $name = Factory::create()->text(10);
        $this->actingAs($this->user)
            ->post(route('task_statuses.store', ['name' => $name]))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('task_statuses', ['name' => $name]);
    }

    /** @return void */
    public function testEdit()
    {
        $this->actingAs($this->user)
            ->get(route('task_statuses.edit', $this->taskStatus))
            ->assertOk();
    }

    /** @return void */
    public function testUpdate()
    {
        $data = Factory::create()->text(10);
        $this->actingAs($this->user)
            ->patch(route('task_statuses.update', $this->taskStatus), ['name' => $data])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
        $this->assertDatabaseHas('task_statuses', ['name' => $data]);
    }

    /** @return void */
    public function testDelete()
    {
        $this->actingAs($this->user)
            ->delete(route('task_statuses.destroy', $this->taskStatus))
            ->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertDeleted('task_statuses', [$this->taskStatus]);
    }
}
