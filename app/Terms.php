<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table='terms_content';
    protected $fillable=[
        'content_type',
        'content'
        ];
}
