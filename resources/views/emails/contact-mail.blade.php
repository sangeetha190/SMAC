<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Name : {{$mailData['name']}}</p>
    @if(!empty($mailData['service']))
    <p>Service : {{ $mailData['service'] }}</p>
    @endif
    <p>Email : {{$mailData['email']}}</p>
    @if(!empty($mailData['phone']))
    <p>Phone Number : {{ $mailData['phone'] }}</p>
   @endif
    @if(!empty($mailData['message']))
    <p>Message : {{$mailData['message'] }}</p>
    @endif
</body>
</html>
