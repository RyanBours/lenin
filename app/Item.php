<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nfc_code', 'name', 'max_loan_duration', 
    ];
    
}
