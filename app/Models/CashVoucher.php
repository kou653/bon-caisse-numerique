<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashVoucher extends Model
{
    protected $fillable = [
        'project',
        'amount',
        'reason',
        'requester_name',
        'approver_name',
        'accountant_name',
    ];

    public function lines()
    {
        return $this->hasMany(CashVoucherLine::class);
    }
}
