<p>Hello, Admin</p>
<br>
<p>Username: {{$udata->username ?? ''}}</p>
<p> Your Wallet Id: {{$udata->trc_20 ?? ''}}</p>
<p>WithDrawl Amt: {{$amt ?? ''}}</p>
<p>Mobile No: <a href="tel:{{$udata->mobile_no ?? ''}}">{{$udata->mobile_no ?? ''}}</a></p>