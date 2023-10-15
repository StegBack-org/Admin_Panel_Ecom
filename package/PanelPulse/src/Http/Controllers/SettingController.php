<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Kartikey\PanelPulse\Helper\CommonHelper;
use Kartikey\PanelPulse\Models\Payment;
use Kartikey\PanelPulse\Models\Shipping;
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

    public function shippings_rates($country)
    {
        $shippings = Shipping::where('id', $country)->orderBy('name', 'asc')->get();
        return view('PanelPulse::admin.settings.shipping_list', ['shippings' => $shippings]);
    }

    public function shipping_add(Request $request)
    {
        Shipping::create([
            'country' => $request->country,
            'state' => $request->state,
            'deliverable' => 'Yes',
            'name' => $request->name,
            'cost' => $request->cost,
            'min_order_value' => $request->min_order_value,
            'max_order_value' => $request->max_order_value
        ]);

        return redirect()->back();
    }

    //*TAxation Here
    public function taxes()
    {
        $taxes = Taxation::get();
        return view('PanelPulse::admin.settings.taxes', ['taxes' => $taxes]);
    }
    public function taxes_detail($country)
    {
        $taxes = Taxation::where('country', $country)->first();
        return view('PanelPulse::admin.settings.taxes_edit', ['taxes' => $taxes]);
    }
    public function taxes_store($country, Request $request)
    {

        ($request->charge) ? $charge = "Yes" : $charge = "No";

        Taxation::where('country', $country)->update([
            'tax' => $request->tax,
            'charge' => $charge
        ]);
        return redirect('/admin/settings/taxes');
    }
    public function taxes_delete($id)
    {
        Taxation::where('id', $id)->delete();
        return redirect()->back();
    }
    //*TAxation End Here

    public function payments()
    {
        $payments = Payment::get();
        return view('PanelPulse::admin.settings.payments', ['payments' => $payments]);
    }

    public function payments_method()
    {
        $payments = Payment::where('payment_mode', 'Bank')->get();
        return view('PanelPulse::admin.settings.payment_method', ['payments' => $payments]);
    }

    public function payments_method_add(Request $request)
    {
        $countryArray = explode('-', "$request->country");

        Payment::create([
            'country_id' => $countryArray[0],
            'country' => $countryArray[1],
            'state' => $request->state,
            'payment_mode' => $request->mode,
            'min_order_value' => $request->min_order_value,
            'max_order_value' => $request->max_order_value
        ]);

        Taxation::create(['country' => $countryArray[1],]);

        return back();
    }

    public function payments_method_update(Request $request)
    {
        Payment::where('id', $request->id)->update([
            'state' => $request->stateUpdate,
            'payment_mode' => $request->mode,
            'min_order_value' => $request->min_order_value,
            'max_order_value' => $request->max_order_value
        ]);
        return redirect()->back();
    }

    public function payments_method_delete(Request $request)
    {
        $payment = Payment::where('id', $request->id)->first();
        Taxation::where('country', $payment->country)->delete();
        $payment->delete();
        return true;
    }
}
