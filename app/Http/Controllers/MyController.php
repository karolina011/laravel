<?php


namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Task1;

class MyController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Task1();
    }

    public function show(Request $request)
    {
        echo 'in MyControllers in Show';
    }

    public function createRegister()
    {
        return view('auth.register');
    }

    public function registerValidate(Request $request)
    {
        $messages = [
            'loginReg.required' => 'Login is required!',
            'password1.required' => 'A Password is required',
            'password2.same' => 'Passwords do not the same',
            'email.required' => 'We need to know your e-mail address!'
        ];

        $validator = Validator::make($request->all(),[
            'loginReg' => 'required|min:5|max:20|unique:task1,login',
            'password1' => 'required|min:5|max:20',
            'password2' => 'required|same:password1',
            'email' => 'required|email:rfc'
        ], $messages);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator);
        }
        else
        {
            $login = $_POST['loginReg'];
            $password1 = password_hash($_POST['password1'], PASSWORD_BCRYPT);
            $email = $_POST['email'];
//            redirect('addUser');
            $this->task->insert(['login' => $login, 'password' => $password1, 'email' => $email, 'role' => 'user' ]);
            session(['registerSuccess' => 'Register success. Log in.']);
//            redirect('login');

//            echo '<pre>';
//            print_r($task->email);
        }
    }

    public function createLogin()
    {
        return view('auth.login');
    }

    public function loginValidate(Request $request)
    {
        $messages = [
            'login.required' => 'Enter the Login',
            'password.required' => 'Enter the Password'
        ];

        $validator = Validator::make($request->all(),[
            'login' => 'required',
            'password' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator);
        }
        else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = $this->task->where('login', '=', $login)->first();
//            echo '<pre>';
//            var_dump($user->password);
//            die;

            if($user && password_verify($password, $user->password))
            {
                session(['user' => $user]);

                return redirect('dashboard');
            }


        }


    }



}
