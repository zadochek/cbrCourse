<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertrRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CBR\CurrencyDaily;

class CbrController extends Controller
{
 public function convertr(ConvertrRequest $request)
 {
    $currency = DB::table('currency_courses')->select('value')->where('code', $request->currency)->first();

    return view('welcome', compact('currency'));
 }
}
