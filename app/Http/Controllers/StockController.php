<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drugs_list;

class StockController extends Controller
{
    public function stock()
    {
        $data['stock'] = drugs_list::get();
        return view('stock.showdata')->with('data', $data);
    }
}
