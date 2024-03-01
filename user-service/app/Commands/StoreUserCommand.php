<?php
namespace App\Commands;

class StoreUserCommand
{
  public $email;
  public $firstName;
  public $lastName;

  public function __construct($email, $firstName, $lastName)
  {
    $this->email = $email;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }
}