<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task1;

class Users extends Controller
{
    public function addUser()
    {
        $task = new Task1();
        $task->insert(['login' => $login, 'password' => $password1, 'email' => $email, 'role' => 'user' ]);
    }
}
