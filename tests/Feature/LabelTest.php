<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Label;
use App\Models\User;
use Faker\Factory;

class LabelTest extends TestCase
{
    protected $label;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = Label::factory()->create();
        $this->user = User::factory()->create();
    }

    /** @return void */
    public function testIndex()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

     /** @return void */
    public function testCreate()
    {
        $this->actingAs($this->user)
            ->get(route('labels.create'))
            ->assertOk();
    }

     /** @return void */
    public function testStore()
    {
        $name = Factory::create()->text(20);
        $description = Factory::create()->text(100);
        $this->actingAs($this->user)
            ->post(route('labels.store', ['name' => $name, 'description' => $description]))
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('labels', ['name' => $name, 'description' => $description]);
    }

    /** @return void */
    public function testEdit()
    {
        $this->actingAs($this->user)
            ->get(route('labels.edit', $this->label))
            ->assertOk();
    }

    /** @return void */
    public function testUpdate(): void
    {
        $name = Factory::create()->text(20);
        $description = Factory::create()->text(100);
        $this->actingAs($this->user)
            ->put(route('labels.update', $this->label), ['name' => $name, 'description' => $description])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('labels', ['name' => $name, 'description' => $description]);
    }


    /** @return void */
    public function testDelete(): void
    {
        $this->actingAs($this->user)
            ->delete(route('labels.destroy', $this->label))
            ->assertSessionHasNoErrors()
            ->assertRedirect();
    }
}
