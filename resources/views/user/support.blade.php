

@section('content')
<div class="main-area" style="padding-top: 60px;">
    <div class="cxy flex-column mx-4" style="margin-top: 70px;">
        <img src="{{asset('frontend/images/contact_us.png')}}" width="280px" alt="">
        <div class="games-section-title mt-4 text-center" style="font-size: 1em;">
            <p>Support Timing is From 10:00 AM to 8:00 PM</p>
            <p>(Monday to Saturday)</p>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .support-option {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            cursor: pointer;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .support-option:hover {
            background-color: #f9f9f9;
        }
        .support-option img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Support Page</h1>

        <!-- WhatsApp Support -->
        <div class="support-option" onclick="window.open('https://wa.me/8619994865', '_blank')">
            <img src="{{asset('frontend/images/sahil1.png')}}" alt="WhatsApp">
            <div>
                <h5>WhatsApp Support</h5>
                <p>Chat with us on WhatsApp.</p>
            </div>
        </div>

        <!-- Gmail Support -->
        <div class="support-option" onclick="window.location.href='mailto:support@ludomaster.site?subject=Support%20Request&body=Please%20describe%20your%20issue'">
            <img src="{{asset('frontend/images/sahil2.png')}}" alt="Gmail">
            <div>
                <h5>Gmail Support</h5>
                <p>Send us an email for support.</p>
            </div>
        </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
<script defer src="https://static.getbutton.io/widget/bundle.js?id=woIoW" ></script>
</html>
