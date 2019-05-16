<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class CurrencyController extends Controller
{
    public function index()  {
        $currencies = array('USD', 'EUR', 'GBP', 'RUB', 'AED','AMD', 'AUD', 'AZN', 'BGN', 'CAD', 'CHF', 'CNY', 'CZK', 'DKK');
        $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
        
        return view('currency', compact('client', 'currencies'));
    }

    public function calculateChange(Request $request) {
        $from = $request->from;
        $to  = $request->to;
        $amount = $request->amount;

        if (is_numeric($amount)) {
            $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
            $amount = (float) $amount;

            if ($from == "GEL") {
                $from_rate = 1;
            } else {
                $from_rate = (float) $client->GetCurrency($from);
            }

            if ($to == "GEL") {
                $to_rate = 1;
            } else {
                $to_rate = (float) $client->GetCurrency($to);
            }

            $result = $amount * $from_rate / $to_rate;
            return response()->json(round($result, 2));
        }
        return "0.00";

    }
}
