<?php

namespace App\Http\Controllers;

use App\Models\typedrugs;
use Illuminate\Http\Request;

class TypedrugsController extends Controller
{
    public function typedrugs()
    {
        $data['typedrugslist'] = typedrugs::get();
        return view('drugs.showdata')->with('data', $data);
    }
    public function addtype(Request $request)
    {
        $typedrugs = new typedrugs();
        $typedrugs->typename = $request->typename;
        $typedrugs->save();

        return redirect()->back()->with('success', "เพิ่มข้อมูลสำเร็จ");
    }
    public function editType($id)
    {
        $data['typedrugslist'] = typedrugs::where('id', $id)->get();
        return view('drugs.showdata')->with('data', $data);
    }

    public function updateType(Request $request){

        // dd($request);
        typedrugs::find($request->idInModal)->update([
            'typename' => $request->typenameInModal
        ]);

        return redirect()->route('typedrugs')->with('success', "แก้ไขข้อมูลสำเร็จ");
    }
}
