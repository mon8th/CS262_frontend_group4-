<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ticket;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function welcome()
    {
        $trendingProducts = Product::where('trending', true)->take(6)->get();
        return view('welcome', ['trendingProducts' => $trendingProducts]);
    }

    public function trending()
    {
        $products = Product::where('trending', true)->paginate(6);
        return view('products.index', ['products' => $products, 'trending' => true]);
    }

    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', ['products' => $products]);
    }

    public function hostEvent()
    {
        $products = Product::where('user_id', Auth::id())->paginate(3);
        return view('hosts.hosts', ['products' => $products]);
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->paginate(10);
        return view('products.index', ['products' => $products, 'category' => $category]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->orderBy('created_at', 'desc')->paginate(3);
        return view('products.show', ['product' => $product, 'reviews' => $reviews]);
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'event_date' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'location' => $request->location,
            'image' => $imagePath,
            'event_date' => $request->event_date,
        ]);

        return redirect()->route('host.event')->with('success', 'Event created successfully.');
    }

    public function viewCustomers($id)
    {
        $tickets = Ticket::where('product_id', $id)->with('user')->paginate(6);
        return view('hosts.view_customers', ['tickets' => $tickets]);
    }
}
