<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class midtranscontroller extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
    public function payment(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-xjEtIdKmZUnF47Iu_oPXQuCO';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    "id" => "a01",
                    "price" => 7000,
                    "quantity" => 1,
                    "name" => "Apple"
                ],
                [
                    "id" => "b02",
                    "price" => 3000,
                    "quantity" => 2,
                    "name" => "Orange"
                ],
            ),
            'customer_details' => array(
                'first_name' => $request -> get('name'),
                'last_name' => '',
                'email' => $request -> get('email'),
                'phone' => $request -> get('nomor'),
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // return $snapToken;
        return view('payment', ['snap_token' => $snapToken]);
    }
    public function payment_post(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order -> status = $json->transaction_status;
        $order -> name = $request->get('name');
        $order -> name = $request->get('email');
        $order -> name = $request->get('nomor');
        $order -> transaction_id = $json->transaction_id;
        $order -> order_id = $json->order_id;
        $order -> gross_amount = $json->gross_amount;
        $order -> payment_type = $json->payment_type;
        $order -> payment_code = $json->payment_code;
        $order -> pdf_url = $json->pdf_url;
        return $order -> save()  ? redirect(url('/'))->with('alert-success', 'order berhasil di buat') : redirect(url('/'))->with('alert-failed', 'terjadi kesalahan saat order');
        // return $request;
    }
}
