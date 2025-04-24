<?php
namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class TransactionController extends Controller
{
    public function checkout(Request $request) {
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'total_price' => $request->total_price,
            'status' => 'pending'
        ]);

        Payment::create([
            'transaction_id' => $transaction->id,
            'method' => $request->payment_method,
            'amount' => $request->total_price
        ]);

        return redirect('/dashboard')->with('success', 'Tiket berhasil dipesan');
    }

    public function dashboard() {
        $transactions = Transaction::where('user_id', Auth::id())->with('payment')->get();
        return view('dashboard', compact('transactions'));
    }
}
