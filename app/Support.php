<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support';
    protected $fillable=[
        'support_no',
        'support_type'
        ];
}
