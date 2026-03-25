@extends('layouts.master')

@section('head')
<title>ludomaster Support</title>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            background-color: #f5f5f5;
        }

        .policy-section {
            background-color: white;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .policy-header {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .policy-header h2 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .policy-content {
            padding: 20px;
            display: none;
            line-height: 1.6;
            color: #666;
        }

        .policy-header::after {
            content: '+';
            font-size: 20px;
            color: #666;
        }

        .active .policy-header::after {
            content: '-';
        }

        .active .policy-content {
            display: block;
        }
    </style>
</head>
<body>
    <div class="policy-section">
        <div class="policy-header">
            <h2>Terms & Conditions</h2>
        </div>
        <div class="policy-content">
            <p>These terms and conditions outline the rules and regulations for the use of our Website.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Cancellation & Refund Policy</h2>
        </div>
        <div class="policy-content">
            <p>Our refund and cancellation policies are designed to be fair and transparent.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Privacy Policy</h2>
        </div>
        <div class="policy-content">
            <p>We respect your privacy and are committed to protecting your personal data.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>GST Policy</h2>
        </div>
        <div class="policy-content">
            <p>Information about our GST policies and procedures.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>TDS Policy</h2>
        </div>
        <div class="policy-content">
            <p>Details about TDS deductions and compliance.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Responsible Gaming</h2>
        </div>
        <div class="policy-content">
            <p>Our commitment to promoting responsible gaming practices.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Anti-Money Laundering Policy</h2>
        </div>
        <div class="policy-content">
            <p>Our measures to prevent money laundering and maintain compliance.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>About Us</h2>
        </div>
        <div class="policy-content">
            <p>Learn more about our company and our mission.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Contact us</h2>
        </div>
        <div class="policy-content">
            <p>Get in touch with us for any queries or support.</p>
        </div>
    </div>

    <div class="policy-section">
        <div class="policy-header">
            <h2>Grievance Redressal</h2>
        </div>
        <div class="policy-content">
            <p>Information about our grievance handling process.</p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.policy-header').forEach(header => {
            header.addEventListener('click', () => {
                const section = header.parentElement;
                section.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
