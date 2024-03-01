<?php
namespace App\Handlers;

use App\Commands\StoreUserCommand;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use App\Events\UserCreated;

class StoreUserHandler
{
  public function handle(StoreUserCommand $command)
  {
    $user = User::create(
      [
        'email' => $command->email,
        'first_name' => $command->firstName,
        'last_name' => $command->lastName
      ]
    );
    // Dispatch event to rabbitMQ
    Event::dispatch(new UserCreated($user->toArray()));

  }
}
