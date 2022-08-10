<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drugs_list;

class DrugListController extends Controller
{
    public function drugslist()
    {
        $data['drugslist'] = drugs_list::orderBy('created_at')->get();
        return view('drugslist.showdata')->with('data', $data);
    }
    public function drugslow()
    {
        $data['drugslist'] = drugs_list::where('item_qty', '<=', 2)->get();
        return view('drugs-low.showdata')->with('data', $data);
    }
    public function addDrugs(Request $request)
    {
        $drugs_list = new drugs_list();
        $drugs_list->drug_id = $request->drug_id;
        $drugs_list->drug_name = $request->drug_name;
        $drugs_list->cost_price = $request->cost_price;
        $drugs_list->sell_price = $request->sell_price;
        $drugs_list->item_qty = $request->item_qty;
        $drugs_list->description = $request->description;

        $drugs_list->save();
        return redirect()->back()->with('success', "เพิ่มข้อมูลสำเร็จ");
    }
    public function editDrugs($id)
    {
        $data['typedrugslist'] = drugs_list::where('id', $id)->get();
        return view('drugs.showdata')->with('data', $data);
    }
}
