<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);
        ddd($request);
        Transaction::create([
            'amount' => $request->amount,
            'type' => $request->type,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);


        return redirect()->back()->with('message', 'Transaction successfully added.');
    }
}
