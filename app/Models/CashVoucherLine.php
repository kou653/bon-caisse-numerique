<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashVoucherLine extends Model
{
    protected $fillable = [
        'cash_voucher_id',
        'line_number',
        'content',
    ];

    public function voucher()
    {
        return $this->belongsTo(CashVoucher::class);
    }
}
