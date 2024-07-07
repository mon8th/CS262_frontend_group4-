<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'review' => $request->review,
        ]);

        return back()->with('success', 'Your review has been submitted.');
    }
}
