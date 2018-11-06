<?php

namespace App;

use App\Loan;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nfc_code', 'name', 'max_loan_duration', 
    ];
    
    public function loans() {
        return $this->hasMany(Loan::class);
    }

}
