<?php


namespace App\Http\Controllers;

use App\Task1;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    protected $task1;

    public function __construct()
    {
        $this->task1 = new Task1();
    }

    public function create(Request $request)
    {
        $value = $request->session()->get('user')['role'];
        if ($value == 'admin')
        {
            $users = $this->task1->where('role', '=', 'user')->get();
            $data['users'] = $users;

            return view('dashboard.index', $data);
        }
        return view('dashboard.index');
    }

}
