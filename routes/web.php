<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('login', 'UserController@loginWithOtpForm')->name('login');

//login and register route
Route::post('login', 'UserController@login')->name('newlogin');
Route::post('loginWithOtp', 'UserController@loginWithOtp')->name('loginWithOtpSubmit');
Route::get('login-with-OTP', 'UserController@loginWithOtpForm')->name('loginWithOtpForm');
Route::post('sendOtp', 'UserController@sendOtp');
Route::post('newregister', 'UserController@register')->name('newregister');
Route::get('rules', 'UserController@rules');
Route::get('info-conditions', 'UserController@info_conditions');
Route::get('referral/{id}', 'UserController@loginWithOtpForm1');
Route::get('referral', 'UserController@loginWithOtpForm');
Route::get('top-10-players', 'PlayerController@index');
Route::get('referral-history', 'RefferalController@index');

Route::post('upigateway/create', 'UPIGatewayController@create');
Route::get('upigateway/transaction-status', 'UPIGatewayController@transaction_status');

Route::get('cashfree/payments/create', 'CashfreePaymentController@create')->name('callback');
Route::post('cashfree/payments/store', 'CashfreePaymentController@store')->name('store');
Route::any('cashfree/payments/success', 'CashfreePaymentController@success')->name('success');



Route::group(['middleware' => ['auth','admin']], function () {

	Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin_dashboard');

	//game controller
	Route::resource('/admin/games', 'Admin\GameController');
	Route::post('/admin/games/update/{id}', 'Admin\GameController@update');
	Route::get('/admin/games/destroy/{id}', 'Admin\GameController@destroy');
	
	//notification
	Route::resource('/admin/notifications', 'Admin\NotificationController');
	Route::post('/admin/notifications/update/{id}', 'Admin\NotificationController@update');
	Route::get('/admin/notifications/destroy/{id}', 'Admin\NotificationController@destroy');
	
	//support
	Route::resource('/admin/support', 'Admin\SupportController');
	Route::post('/admin/support/update/{id}', 'Admin\SupportController@update');
	
	//terms
	Route::resource('/admin/terms', 'Admin\TermsController');
	Route::post('/admin/terms/update/{id}', 'Admin\TermsController@update');


	//kyc controller
	Route::get('/admin/kyc-pending', 'Admin\KYCController@kyc_pending');
	Route::get('/admin/kyc-details/{id}', 'Admin\KYCController@kyc_view');
	Route::get('/admin/kyc-approved', 'Admin\KYCController@kyc_approved');
	Route::get('/admin/kyc-verify/{id}', 'Admin\KYCController@kyc_verify');
	Route::get('/admin/kyc-reject/{id}', 'Admin\KYCController@kyc_rejected');

	//player
	Route::get('/admin/players', 'Admin\PlayerController@index');
	Route::get('/admin/player-view/{id}', 'Admin\PlayerController@player_view');
	Route::get('/admin/player-edit/{id}', 'Admin\PlayerController@player_edit');
    Route::get('/admin/rechage-wallet/{user_id}', 'Admin\PlayerController@recharge_wallet');
    Route::post('/admin/rechage-now', 'Admin\PlayerController@recharge_now');
    Route::get('/admin/block-user/{id}', 'Admin\PlayerController@block_user');
    Route::get('/admin/unblock-user/{id}', 'Admin\PlayerController@unblock_user');
    Route::get('/admin/players-blocked', 'Admin\PlayerController@block_players_list');

	//battle
	Route::get('/admin/new-battles', 'Admin\BattleController@new_battle');
	Route::get('/admin/battle/delete/{id}', 'Admin\BattleController@delete_battle');
	Route::get('/admin/new_battle_table', 'Admin\BattleController@new_battle_table');
	Route::get('/admin/running-battles', 'Admin\BattleController@running_battle');
	Route::get('/admin/running_battle_table', 'Admin\BattleController@running_battle_table');
	Route::get('/admin/battles-result', 'Admin\BattleController@battle_result');
	Route::get('/admin/battles-dispute', 'Admin\BattleController@battle_dispute');
	Route::get('/admin/battle_result_table', 'Admin\BattleController@battle_result_table');
	Route::get('/admin/battle-view/{id}', 'Admin\BattleController@battle_view');
	Route::get('/admin/battle-pending/{id}', 'Admin\BattleController@battle_pending');
	Route::post('/admin/update-result/{id}', 'Admin\BattleController@update_result');
	Route::post('/admin/add-penalty', 'Admin\BattleController@add_penalty')->name('admin.add.penalty');
	Route::get('/admin/cancel-battle/{id}', 'Admin\BattleController@cancel_battle');

	//payment
	Route::get('/admin/payments', 'Admin\PaymentController@index');
	Route::get('/admin/transaction-history/{id}', 'Admin\PaymentController@transaction_history');
	Route::get('/admin/payment-details/{id}', 'Admin\PaymentController@payment_view');
	Route::get('/admin/recharge-user', 'Admin\PaymentController@recharge_user');
	Route::post('/admin/search-user-result', 'Admin\PaymentController@search_user_result');
	Route::get('/admin/payments-settings', 'Admin\PaymentController@settings');
	Route::post('/admin/payment-gateway-update/', 'Admin\PaymentController@payment_gateway_update');
	Route::post('/admin/payment-paytm/update/{id}', 'Admin\PaymentController@payment_paytm_update');
	Route::post('/admin/payment-cashfree/update/{id}', 'Admin\PaymentController@payment_cashfree_update');
	Route::post('/admin/payment-upigateway/update/{id}', 'Admin\PaymentController@payment_upigateway_update');

	//dashboard
	Route::get('/admin/dashboard', 'Admin\DashboardController@index');

	Route::get('/admin/admin-settings', 'Admin\AdminController@settings');
	Route::post('/admin/mode', 'Admin\AdminController@mode');
    Route::post('/admin/signup-bonus', 'Admin\AdminController@signupbonus')->name('admin.signup.bonus');
	Route::post('/admin/update-comission/{id}', 'Admin\AdminController@update_commision');

	//withdraw request
	Route::get('/admin/withdraw-request', 'Admin\WithdrawController@index');
	Route::get('/admin/withdraw-view/{id}', 'Admin\WithdrawController@withdraw_view');
	Route::get('/admin/withdraw-approved/{id}', 'Admin\WithdrawController@withdraw_approved');
	Route::get('/admin/withdraw-reject/{id}', 'Admin\WithdrawController@withdraw_reject');

	//marquee
	Route::get('/admin/marquee-notification', 'Admin\MarqueeController@marquee_view');
	Route::post('/admin/marquee-save', 'Admin\MarqueeController@marquee_save');

});
Route::group(['middleware' => ['auth','user']], function () {
     Route::get('/user/dashboard', 'DashboardController@index')->name('user_dashboard');
     Route::post('user/update-email', 'ProfileController@update_email')->name('user_email');
     Route::post('user/update-profile', 'ProfileController@update_profile')->name('update.profile');
     Route::get('/profile', 'ProfileController@profile')->name('profile');
     Route::post('/saveVplayID', 'ProfileController@saveVplayID')->name('saveVplayID');
     Route::post('/saveRefferBy', 'ProfileController@saveRefferBy')->name('saverefferID');
     Route::get('/add-funds', 'WalletController@add_fund')->name('addFund');
     Route::get('/wallet', 'WalletController@wallet')->name('wallet');
     Route::get('/withdraw-alert', 'WalletController@withdraw_alert');
     Route::get('/game-history', 'ProfileController@game_history');
     Route::get('/transaction-history', 'ProfileController@transaction_history');
     Route::get('/notification', 'ProfileController@notification');
     Route::get('/support', 'ProfileController@support');
     Route::match(['get','post'],'/complete-kyc/step1', 'KycController@step1');
     Route::match(['get','post'],'/complete-kyc/step2', 'KycController@step2');
     Route::match(['get','post'],'/complete-kyc/step3', 'KycController@step3');
     Route::match(['get','post'],'/complete-kyc/kyc-submit', 'KycController@kyc_submit');


   	Route::get('/refer-earn', 'RefferController@index');
   	Route::get('/referral-history', 'RefferController@referral_history');
   	Route::get('/comission-reedem', 'RefferController@comission_reedem');
   	Route::post('/comission-sent', 'RefferController@comission_sent');

	Route::get('/lobby/start/{id}', 'LobbyController@start');
	Route::get('/lobby/join/{id}', 'LobbyController@join_battle');
	Route::get('/lobby/delete/{id}', 'LobbyController@delete');
	Route::get('/lobby/{url}', 'LobbyController@index');
	Route::post('/create-lobby', 'LobbyController@create');
	Route::get('/lobby/send-request/{id}', 'LobbyController@send_request');
	Route::get('/lobby/cancel-request/{id}', 'LobbyController@cancel_request');
	Route::get('/lobby/reject-request/{id}', 'LobbyController@reject_request');
	Route::get('lobby/reject-request-joiner/{id}', 'LobbyController@reject_request_joiner');
	Route::get('/view-battle/{battle_id}', 'LobbyController@view_battle');
	Route::post('/battle-result/{battle_id}', 'LobbyController@battle_result');

	//javascript call page  realtime
	Route::get('/battle_open/{game_id}', 'LobbyController@battle_open');
	Route::get('/battle_end/{game_id}', 'LobbyController@battle_end');
	Route::get('/battle_running/{game_id}', 'LobbyController@battle_running');
	Route::get('/wallet_balance', 'WalletController@wallet_balance');
	Route::get('/ear', 'WalletController@wallet_bal');

	Route::get('/send-money', 'WalletController@send_money_form');
	Route::post('/money-sent', 'WalletController@send_money_submit');

	Route::get('/withdraw-check', 'WithdrawController@withdraw_check');
	Route::get('/withdraw-through-upi', 'WithdrawController@withdraw_through_upi');
	Route::get('/withdraw-through-bank-transfer', 'WithdrawController@withdraw_through_bank_transfer');
	Route::post('/withdraw-now', 'WithdrawController@withdraw_now');
	Route::post('/withdraw-now-bank', 'WithdrawController@withdraw_now_bank');

});
