<?php

namespace App\Http\Controllers;

use App\Commands\StoreUserCommand;
use App\Handlers\StoreUserHandler;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    /**
     * @param StoreUserRequest $request
     * 
     * Creates a new User
     * 
     * 
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        // Using CQRS, initiate the command class to be stored
        $command = new StoreUserCommand(
            $data['email'],
            $data['firstName'],
            $data['lastName']
        );

        // Using CQRS, handle the command
        resolve(StoreUserHandler::class)->handle($command);

        return response()->json(['message' => 'User created successfully'], 201);
    }
}
