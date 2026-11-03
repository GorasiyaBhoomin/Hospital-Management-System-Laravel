<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Reply</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
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

.thanks-text {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.message {
    font-size: 18px;
    line-height: 1.6;
    margin: 20px 0;
    color: #555;
}

.regards {
    margin-top: 20px;
    font-size: 16px;
    color: #777;
}

</style>
</head>
<body>
    <div class="container">
        <div class="card">
            <img src="https://mehtahospital.com/wp-content/uploads/2019/02/Book_online_appointment.png">
                        <div class="card-body">
                <h2>Hello, {{ $data['appointmentname'] }}</h2>

                <p class="thanks-text">Thanks for Booking an Appointment</p>
            


                <p>We will reply as soon as possible that the appointment is Booked or Rejected.</p>
                <p>Pls be active and check the mail daily.</p>

                <p class="regards">Your Regards: <br>info@kkphospital.org</p>
            </div>
        </div>
    </div>
</body>
</html>
