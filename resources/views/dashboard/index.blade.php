<h2>Dashboard</h2>

@if(isset($users))
    <h3>USERS:</h3>
    <table>
        <thead>
        <tr>
            <th>Login</th>
            <th>Email</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)

        <tr>
            <td>{{ $user->login}}</td>
            <td>{{ $user->email}}</td>
            <td><a href="#">Delete </a>
                <a href="#">Edit</a>
            </td>
        </tr>

        @endforeach

        </tbody>
    </table>
@endif
