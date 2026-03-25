<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TransactionHistory extends Model
{
	
	 use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'user_id', 'payment_id', 'order_id', 'day', 'month', 'year', 'paying_time', 'amount', 'add_or_withdraw', 'closing_balance', 'remark'
    ];

  
}
