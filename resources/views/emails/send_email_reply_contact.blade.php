<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Reply</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

.container {
    text-align: center;
    margin: 50px auto;
    max-width: 600px;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
}

.card img {
    width: 100%;
    height: auto;
}

.card-body {
    padding: 20px;
}

.message {
    font-size: 18px;
    line-height: 1.6;
    margin: 20px 0;
}

.reply-text {
    font-weight: 300;
    color: green;
    margin: 20px 0;
}

.regards {
    margin-top: 20px;
    font-size: 16px;
    color: #555;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
          <img src="https://cdni.iconscout.com/illustration/premium/thumb/thank-you-doctor-and-nurse-2984108-2493786.png">
          <div class="card-body">
                <h2>Hello, {{ $data['contactname'] }}</h2>

                <p>According to your message:</p>
                @if(isset($data['message']))
                    <p class="message" style="font-weight: 300; color:red;">{{ $data['message'] }}</p>
                @endif

                <p style="font-weight: 300; color:green;" class="reply-text">We have replied to you:</p>
                <p>{{ $data['replied'] }}</p>

                <p class="regards">Your Regards:<br>info@kkphospital.org</p>
            </div>
        </div>
    </div>
</body>
</html>
