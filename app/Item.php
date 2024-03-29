<?php

namespace App;

use App\Loan;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'nfc_code', 'max_loan_duration', 'description', 'comment'
    ];
    
    public function loans() {
        return $this->hasMany(Loan::class);
    }

    public function loan() {
        return $this->loans->where('returned', '=', '0')->first();
    }

    public function isBorrowed() {
        return (bool) $this->loans->where('returned', '=', '0')->count();
    }

}
