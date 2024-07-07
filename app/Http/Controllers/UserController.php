<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hostInfo($package)
    {
        return view('hosts.host_info', ['package' => $package]);
    }

    public function submitBecomeHost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'package' => 'required|string',
        ]);

        $user = Auth::user();
        $user->role = 'host';
        $user->save();

        return redirect()->route('home')->with('success', 'You have successfully applied to become a host.');
    }
}
