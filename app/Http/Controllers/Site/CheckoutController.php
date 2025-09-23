<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
            'cep'            => 'required|string|max:9',
            'street'         => 'required|string|max:191',
            'number'         => 'required|string|max:20',
            'complement'     => 'nullable|string|max:191',
            'district'       => 'required|string|max:191',
            'city'           => 'required|string|max:191',
            'state'          => 'required|string|max:2',
            'freight'        => 'nullable|numeric|min:0',
        ]);

        $address = Address::create($validated);
        $order = Auth::user()->order()->update(['address_id' => $address->id]);
        return redirect()->route('site.checkout.freight.index');
        return redirect()
            ->back()
            ->with('success', 'Endereço cadastrado com sucesso!');
    }

    public function freightIndex()
    {
        $address = Auth::user()->order->address;
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'User-Agent'    => 'Aplicação bruno080101@gmail.com',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTYiLCJqdGkiOiJlMjJmZGU5MmY3OGRhMjAyMTI4NmVkMjk3NzhmMzY0ODlmN2U4OGFhZTYzNTRkM2Q0NGVkNzE1NzdlOGNkYmYyNWM0MjM3MjdmMTc2YjQ2MiIsImlhdCI6MTc1ODA2NDIzOC40MjA3MDIsIm5iZiI6MTc1ODA2NDIzOC40MjA3MDQsImV4cCI6MTc4OTYwMDIzOC40MTM4OTgsInN1YiI6IjllYWU4YjgzLWE2OWItNGMwMS04NjJjLTgxMzYxNTlhYmE1YyIsInNjb3BlcyI6WyJzaGlwcGluZy1jYWxjdWxhdGUiXX0.t52gzN_P6dnnLZVfdWOTdCEkq8gBl5WQVNrMeCaoAOxO6NIWhFGJiGVjM5jyaoPjYBxJYb1f3B870wlY19KOy0fyCJY80SxtIpcCzdzCeOgqFpc2l2hchLK5g6FQ6KkQkSm2HC_5vASCOiKTj347RpRrykkrGEmOygtEe-kPJM3PCgDHUwr1SzeK6e0yAiaIfbVuQCSQppJfMllTUGNXTk7L6Vyx0CIoURBfVtddKFoie8sZOvbKtDtZOkR5Ek9C3gyQRpvAN-ngLi6M3G3Qa0hNWCSr-wuT7MoQBcmsKTKaz2QGLf1ARkLP13-tslTxLXxuLMIZMfFMr50agQ7pyc-8NoQFpKrdDUqf2Qi279PJoWXbGpIu4SaCwK72-LZHw_x0BYYzIlJXijtjqbQGGpDyoepl73gOLV7qFcRF-uUnqjPXMkahXUIkM8t3V-8MJRhjcyODVC8fChGb4O8p0lCxwkC-jOa_xAYXF0DWCNQSewmWo0e_LDKhcuFoz4Ki5he2slWClvHmqcMjdjghgFzNCCpjq03kh5wRNd3YIwHlU9A0aOqPmhmAcMsY2iAXVMUmHfYEYIKqI1Oz9CWJREbV-JRrMNIMJcW78iBiV9OBiS8r-GedvGC3yitB7DnTcvBOO5vnRG0QI-L0PZMLdU-Zk4kq2VGRWEyY7vcG1Wk',
        ])->post('https://sandbox.melhorenvio.com.br/api/v2/me/shipment/calculate', [
            "from" => [
                "postal_code" => "02180000",
            ],
            "to" => [
                "postal_code" =>  $address->cep,
            ],
            "package" => [
                "height" => 3,    // espessura
                "width"  => 25,   // largura do envelope
                "length" => 30,   // comprimento do envelope
                "weight" => 0.25, // 250g (camiseta comum)
            ],
            "options" => [
                "receipt"  => false,
                "own_hand" => false,
            ],
            "services" => "2,4,22",
        ]);



        return Inertia::render('Site/Checkout/Freight/Index', ['freights' =>  $response->json()]);
    }
    public function freightStore(Request $request)
    {
        $order = Auth::user()->order()->update($request->all());
        return redirect()->route('site.checkout.payment.index');
    }

    public function paymentIndex()
    {
        return Inertia::render('Site/Checkout/Payment/Index');
    }

    public function paymentStore(Request $request)
    {
        $payment = Payment::create($request->all());
        return $request->all();
    }
}
