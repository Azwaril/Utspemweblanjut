<?php
namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request) {
        Review::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Review berhasil dikirim!');
    }
}
