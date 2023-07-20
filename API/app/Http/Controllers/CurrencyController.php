<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return response()->json($currencies);
    }

    // taux de conversion euro-dollar (à titre d'exemple)
    const TAUX_CONVERSION = 1.13;

    public function euroToDollar(Request $request)
    {
        $montant_euro = $request->input('montant');
        $montant_dollar = $montant_euro * self::TAUX_CONVERSION;
        return response()->json(['montant_dollar' => $montant_dollar]);
    }

    public function dollarToEuro(Request $request)
    {
        $montant_dollar = $request->input('montant');
        $montant_euro = $montant_dollar / self::TAUX_CONVERSION;
        return response()->json(['montant_euro' => $montant_euro]);
    }
}

