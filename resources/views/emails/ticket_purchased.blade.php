<!DOCTYPE html>
<html>
<head>
    <title>Ticket Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .front_banner {
            position: relative;
        }
        .front_banner img {
            width: 100%;
            height: auto;
        }
        .front_banner_text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }
        .ticket-details {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .ticket-details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
            border-top: 1px solid #dddddd;
            background-color: #f9f9f9;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="front_banner">
            <img src="{{ asset('images/bluehour.jpeg') }}" alt="Banner Image">
            <div class="front_banner_text">
                <h1 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Thank you for your purchase!</h1>
            </div>
        </div>
        <div class="content">
            <p>Your ticket code is: <strong>{{ $ticket->booking_ticket_code }}</strong></p>
            <div class="ticket-details">
                <p><strong>Product Name:</strong> {{ $ticket->product->name }}</p>
                <p><strong>Quantity:</strong> {{ $ticket->quantity }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($ticket->total_price, 2) }}</p>
                <p><strong>Location:</strong> {{ $ticket->product->location }}</p>
            </div>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
        </div>
    </div>
</body>
</html>
