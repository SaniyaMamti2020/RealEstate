<p>Hello, {{$udata[0]['username'] ?? ''}}</p>
<br>
You can reset password from bellow link:

<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>