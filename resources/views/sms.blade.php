<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS</title>
</head>
<body>
    <h1>Send Message</h1>
    <hr>
    <form action="{{url('sms/send')}}" method="POST">
        @csrf
        <p>
            <input type="text" name='number' placeholder="number">
        </p>
        <p>
            <input type="text" name="sms" placeholder="message">
        </p>
        <button>Send</button>
    </form>
</body>
</html>