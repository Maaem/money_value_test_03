<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;
use App\Models\Conversion;

class ConversionController extends Controller
{
    public function convert(Request $request)
    {
        $data = $request->validate([
            'source_currency_id' => 'required|exists:currencies,id',
            'target_currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $pair = Pair::where('source_currency_id', $data['source_currency_id'])
                    ->where('target_currency_id', $data['target_currency_id'])
                    ->first();

        if ($pair) {
            $exchange_rate = $pair->exchange_rate;
            $converted_amount = $exchange_rate * $data['amount'];

            $pair->conversion_count++;
            $pair->save();

            Conversion::create([
                'pair_id' => $pair->id,
                'amount' => $converted_amount,
            ]);

            return response()->json(['converted_amount' => $converted_amount]);
        } else {
            return response()->json(['message' => 'Pair not found. Conversion failed.'], 404);
        }
    }
}

