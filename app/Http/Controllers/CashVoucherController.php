<?php

namespace App\Http\Controllers;

use App\Models\CashVoucher;
use Illuminate\Http\Request;

class CashVoucherController extends Controller
{
    public function index()
    {
        return CashVoucher::with('lines')->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'reason' => 'nullable|string',
            'requester_name' => 'nullable|string',
            'approver_name' => 'nullable|string',
            'accountant_name' => 'nullable|string',
            'lines' => 'array',
            'lines.*.line_number' => 'required|integer',
            'lines.*.content' => 'nullable|string',
        ]);

        $voucher = CashVoucher::create($validated);

        if (isset($validated['lines'])) {
            $voucher->lines()->createMany($validated['lines']);
        }

        return response()->json($voucher->load('lines'), 201);
    }

    public function show(string $id)
    {
        return CashVoucher::with('lines')->findOrFail($id);
    }
}
