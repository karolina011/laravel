Register

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('MyController@registerValidate') }}" method="post">
    @csrf
    <label for="loginReg">Login</label>
    <input type="text" name="loginReg" id="loginReg" value=""><br>
    <label for="password1">Password</label>
    <input type="password" name="password1" id="password1" value=""><br>
    <label for="password2">Password confirm</label>
    <input type="password" name="password2" id="password2" value=""><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value=""><br>
    <input type="submit" value="Register">
</form>

{{--http://dev21.modulesgarden-demo.com/whmcs/laravel/public/registerValidate--}}
