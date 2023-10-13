<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Kartikey\PanelPulse\Models\Payment;
use Kartikey\PanelPulse\Models\Taxation;

class SettingController extends Controller
{
    public function index()
    {
        return view('PanelPulse::admin.settings.setting');
    }

    public function shippings()
    {
        $payments = Payment::get();
        return view('PanelPulse::admin.settings.shipping', compact('payments'));
    }

    public function taxes()
    {
        $taxes = Taxation::get();
        return view('PanelPulse::admin.settings.taxes', ['taxes' => $taxes]);
    }

    public function payments()
    {
        $payments = Payment::get();
        return view('PanelPulse::admin.settings.payments', ['payments' => $payments]);
    }

    public function payments_method()
    {
        $payments = Payment::where('payment_mode', 'COD')->get();
        return view('PanelPulse::admin.settings.payment_method', ['payments' => $payments]);
    }

    public function payments_method_add(Request $request)
    {
        Payment::create([
            'country_id' => 1,
            'country' => $request->country,
            'state' => $request->state,
            'payment_mode' => $request->mode,
            'min_order_value' => $request->min_order_value,
            'max_order_value' => $request->max_order_value
        ]);

        return back();
    }
}
