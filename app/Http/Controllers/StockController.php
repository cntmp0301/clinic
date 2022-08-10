<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\stocks_log;
use App\Models\drugs_list;
use App\Models\stocks_detail;

class StockController extends Controller
{
    public function stock()
    {
        $data['druglist'] = DB::table('drugs_lists')->get();
        return view('stock.showdata')->with('data', $data);
    }
    public function addStock(Request $request)
    {
        $stocks_log = new stocks_log();
        $stocks_log->stock_id = $request->stock_id;
        $stocks_log->status = 1;

        for ($i = 0; $i < count($request->drug_id); $i++) {

            $stocksDetail[] = [
                'stock_id' => $request->stock_id,
                'drug_id' => $request->drug_id[$i],
                'amount' => $request->drug_qty[$i]
            ];

            $drug_qtyOld = drugs_list::where('drug_id', $request->drug_id[$i])->get('item_qty');
            foreach ($drug_qtyOld as $row) {
                $drug_qtyOld =  $row->toArray();
            }
            $data['drug_qtyOld'] = $drug_qtyOld['item_qty'];
            drugs_list::where('drug_id', $request->drug_id[$i])->update([
                'item_qty' => $data['drug_qtyOld'] + $request->drug_qty[$i]
            ]);
        }
        DB::beginTransaction();
        try {
            $stocks_log->save();
            stocks_detail::insert($stocksDetail);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->route('stock')->with('success', "อัพเดทสต๊อกสำเร็จ");
    }
}
