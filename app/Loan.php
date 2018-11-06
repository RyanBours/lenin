<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $table = 'item_user_loans';
    const CREATED_AT = 'start_date';
    
    protected $fillable = [
        // replace start & end with timestamp
        'start_date', 'end_date', 'expected_end_date', 'returned', 'user_id', 'item_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function isReturned() {
        return $this->returned ? true : false;
    }

}
