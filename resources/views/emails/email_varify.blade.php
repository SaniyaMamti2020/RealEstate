<p>Hello, {{$udata->username ?? ''}}</p>
<br>
To verify your account click on this link:

<a href="{{ route('email-varify',$token) }}">Verify Email</a>