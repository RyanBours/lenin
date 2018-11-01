<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $table = 'item_user_loans';

    protected $fillable = [
        // replace start & end with timestamp
        'start_date', 'end_date', 'expected_end_date', 'returned', 'user_id', 'item_id',
    ];
}
