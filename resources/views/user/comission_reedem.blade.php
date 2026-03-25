@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
@endsection



@section('content')
<div class="main-area" style="padding-top: 60px; background: linear-gradient(135deg, #f6f9fc, #e5eaf5); min-height: 100vh;">
    <div class="center-xy text-center">
        <picture class="mt-1">
            <img width="226px" src="{{ asset('frontend/images/referral-user-welcome.png') }}" alt="Welcome">
        </picture>
        <div class="mb-3">
            <div class="font-15" style="color: #444; font-weight: 600;">Unlock Your Referral Earnings 🥳</div>
            <div class="font-13" style="color: #555; margin-top: 5px;">Please note: TDS (15%) will be applied after your annual earnings exceed ₹15,000.</div><br>

            <div class="text-bold mt-3">
                <form action="{{ url('comission-sent') }}" method="post">
                    @csrf
                    <input type="number" class="form-control" name="amount" placeholder="Enter Amount to Redeem" min="95" required autocomplete="off">
                    <div class="amount-info">
                        <span>Minimum withdrawal amount ₹95</span>
                        <span>Funds will be credited to your Wallet.</span>
                    </div>
                    <div class="mt-4">
                        <input type="submit" name="submit" class="redeem-button" value="Redeem Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="divider-x"></div>
</div>

<style>
    /* Main background gradient */
    .main-area {
        background: linear-gradient(135deg, #f6f9fc, #e5eaf5);
        min-height: 100vh;
    }

    /* Button Styles */
    .redeem-button {
        background: linear-gradient(45deg, #28a745, #218838);
        color: #fff;
        font-size: 18px;
        padding: 12px 30px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    /* Hover effect for button */
    .redeem-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        background: linear-gradient(45deg, #218838, #28a745);
    }

    /* Active button state */
    .redeem-button:active {
        background: #1e7e34;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transform: translateY(0);
    }

    /* Focus effect for button */
    .redeem-button:focus {
        outline: none;
    }

    /* Input field style */
    .form-control {
        font-size: 16px;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
        outline: none;
    }

    /* Amount info styling */
    .amount-info {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #444;
        margin-top: 8px;
    }

    .amount-info span {
        font-weight: 300;
    }

    /* Divider line style */
    .divider-x {
        border-top: 2px solid #ddd;
        margin: 30px 0;
    }

    /* Responsive button and input styling */
    @media (max-width: 768px) {
        .redeem-button {
            padding: 12px 20px;
            font-size: 16px;
        }

        .form-control {
            width: 80%;
            margin-bottom: 10px;
        }
    }
</style>
@endsection
