<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketPurchased;

class TicketController extends Controller
{
    // Display the cart page
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $total = array_reduce($cartItems, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('customers.index', ['cartItems' => $cartItems, 'total' => $total]);
    }

    // Add item to cart
    public function add(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product || $product->quantity <= 0) {
            return redirect()->route('cart.index')->with('error', 'Product not available.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->name])) {
            if ($cart[$product->name]['quantity'] < $product->quantity) {
                $cart[$product->name]['quantity']++;
            } else {
                return redirect()->route('cart.index')->with('error', 'Not enough stock available.');
            }
        } else {
            $cart[$product->name] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image ?? 'default.jpg'
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    // Remove item from cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->name])) {
            unset($cart[$request->name]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
    }

    // Update item quantity in cart
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->name])) {
            $product = Product::where('name', $request->name)->first();
            if ($product && $request->quantity <= $product->quantity) {
                $cart[$request->name]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                return redirect()->route('cart.index')->with('success', 'Product quantity updated successfully!');
            } else {
                return redirect()->route('cart.index')->with('error', 'Not enough stock available.');
            }
        }
        return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
    }

    // Handle checkout process
    public function checkout(Request $request)
    {
        $request->validate([
            'cardName' => 'required|string',
            'cardNumber' => 'required|numeric',
            'cardExpiration' => 'required',
            'cardCvv' => 'required|numeric',
        ]);

        $cartItems = session()->get('cart', []);
        $userId = Auth::id();
        $totalPrice = array_reduce($cartItems, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        foreach ($cartItems as $item) {
            $product = Product::where('name', $item['name'])->first();
            if ($product) {
                $ticket = Ticket::create([
                    'product_id' => $product->id,
                    'user_id' => $userId,
                    'quantity' => $item['quantity'],
                    'total_price' => $item['price'] * $item['quantity'],
                    'booking_ticket_code' => strtoupper(Str::random(10)),
                ]);

                // Update the product quantity
                $product->quantity -= $item['quantity'];

                if ($product->quantity <= 0) {
                    $product->quantity = 0;
                }
                $product->save();

                // Send the email with the ticket details
                Mail::to(Auth::user()->email)->send(new TicketPurchased($ticket));
            }
        }

        // Clear the cart after successful checkout
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Checkout successful! An email with your ticket code has been sent.');
    }
}
