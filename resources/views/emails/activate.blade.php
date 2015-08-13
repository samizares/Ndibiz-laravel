<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the verification demo app.<br/>
            Please Click the link below or copy the link to a browser to verify your email address<br/>
            <a href="{{ URL::to('activate/' . $confirmation_code) }}">click here</a>.

        </div>

    </body>
</html>