<?php

namespace App\Http\Controllers\Shop_Auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredShopController extends Controller
{
    public function create(): View
    {
        return view('auth.shop-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Shop::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'post_code' => ['required','integer','digits:7'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $shop = Shop::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'post_code' => $request->post_code,
            'address' => $request->address
        ]);

        event(new Registered($shop));

        Auth::login($shop);

        return redirect(RouteServiceProvider::HOME);
    }
}
