<?php

namespace Tests\Unit\Handlers;


use App\Commands\StoreUserCommand;
use App\Handlers\StoreUserHandler;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreUserHandlerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_new_user()
    {
        // Arrange
        $command = new StoreUserCommand(
            'test@example.com',
            'John',
            'Doe'
        );

        // Act
        $handler = new StoreUserHandler();
        $handler->handle($command);

        // Assert
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }
}
