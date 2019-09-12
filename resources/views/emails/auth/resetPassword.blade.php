@component('mail::message')

    <center>
        <h2> Wellcome To 9shop</h2>
    </center>

<p>
    Your Reset Password Code is : <span style="color: blue;"> {{$code}}</span>
</p>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
