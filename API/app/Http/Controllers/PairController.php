<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

class PairController extends Controller
{
    public function index()
    {
        $pairs = Pair::with(['sourceCurrency', 'targetCurrency'])->get();
        return response()->json($pairs);
    }
}
