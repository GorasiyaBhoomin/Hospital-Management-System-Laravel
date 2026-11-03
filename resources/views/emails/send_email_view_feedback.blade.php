<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    text-align: center;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    margin: 20px auto;
    max-width: 600px;
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

.thanks-text {
    font-size: 24px;
    font-weight: bold;
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
            <img src="https://tonsofthanks.com/wp-content/uploads/2020/10/Thank-you-for-your-feedback.jpg" alt="Feedback Image">
            <div class="card-body">
                <h2>Hello, {{ $data['name'] }}</h2>

                @if(isset($data['message']))
                    <p class="message">{{ $data['message'] }}</p>
                @endif

                <p class="thanks-text">Thanks for Your Feedback</p>

                <p class="regards">Your Regards<br>info@kkphospital.org</p>
            </div>
        </div>
    </div>
</body>
</html>
