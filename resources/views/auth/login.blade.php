<h3>Login</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
</ul>
</div>
@endif

<form action="{{ action('MyController@loginValidate') }}" method="post">
    @csrf
    <label for="login">Login</label>
    <input type="text" name="login" id="login" value=""><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value=""><br>
    <input type="submit" value="Log in">
</form>
