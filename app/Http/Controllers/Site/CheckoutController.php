<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function orderIndex()
    {
        return Inertia::render('Site/Checkout/Order/Index');
    }
    public function orderCreate() {}
    public function orderDelete() {}

    public function addressIndex()
    {
        return Inertia::render('Site/Checkout/Address/Index');
    }
    public function addressStore(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:191',        // Nome do endereço (ex.: "Casa", "Trabalho")
            'recipient_name' => 'required|string|max:191',        // Nome de quem vai receber
            'cep'            => 'required|string|max:9',          // 00000-000
            'street'         => 'required|string|max:191',
            'number'         => 'required|string|max:20',
            'complement'     => 'nullable|string|max:191',
            'district'       => 'required|string|max:191',
            'city'           => 'required|string|max:191',
            'state'          => 'required|string|max:2',          // SP, RJ etc.
            'freight'        => 'nullable|numeric|min:0',
        ]);

        $validated['user_id'] = Auth::id();

        $address = Address::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Endereço cadastrado com sucesso!');
    }

    public function freightIndex()
    {
        return Inertia::render('Site/Checkout/Freight/Index');
    }

    public function paymentIndex()
    {
        return Inertia::render('Site/Checkout/Payment/Index');
    }
}
