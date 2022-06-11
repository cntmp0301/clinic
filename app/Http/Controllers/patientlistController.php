<?php

namespace App\Http\Controllers;

use App\Models\patient_list;
use App\Models\sex;
use Illuminate\Http\Request;

class patientlistController extends Controller
{
    public function patientbone()
    {
        $data['patientlist'] = patient_list::where('type', "กระดูก")->get();
        $data['sex'] = sex::get();
        return view('patient_bone.showdata')->with('data', $data);
    }

    public function addpatientbone(Request $request)
    {
        //dd($request);
        //Encode Image Name
        // $users_image = $request->file('users_image');
        //Generate Image Name
        // $name_gen = hexdec(uniqid());
        //Get Image Extension
        // $users_image_ext = strtolower($users_image->getClientOriginalExtension());

        // $users_image_name = $name_gen . '.' . $users_image_ext;
        // $fullpathusers_image = env('UPLOAD_IMG_BUSINESS_MASTER_PATH') . $users_image_name;

        $patient_list = new patient_list();
        $patient_list->name = $request->name;
        $patient_list->nickname = $request->nickname;
        $patient_list->tel = $request->tel;
        $patient_list->contact = $request->contact;
        $patient_list->sex = $request->sex;
        $patient_list->age = $request->age;
        $patient_list->drug_allergy = $request->drug_allergy;
        // $patient_list->users_image = $fullpathusers_image;
        $patient_list->line_id = $request->line_id;
        $patient_list->type = $request->type;

        $patient_list->save();

        // $users_image->move(env('UPLOAD_IMG_BUSINESS_MASTER_PATH'), $users_image_name);
        return redirect()->back()->with('success', "เพิ่มข้อมูลสำเร็จ");
    }

    public function editpatientbone($id)
    {
        $data['patient_list'] = patient_list::where('id', $id)->get();
        $data['sex'] = sex::get();
        return view('patient_bone.edit')->with('data', $data);
    }

    public function updatepatientbone(Request $request)
    {
        // dd($request);
        $id = $request->patient_id;
        patient_list::where('id', $id)->update([
            'name' => $request->patient_name,
            'nickname' => $request->patient_nickname,
            'tel' => $request->patient_tel,
            'contact' => $request->patient_contact,
            'sex' => $request->sex,
            'age' => $request->patient_age,
            'drug_allergy' => $request->patient_drug_allergy,
            'line_id' => $request->patient_line_id
        ]);
        return redirect()->route('patientbone')->with('success', "แก้ไขข้อมูลสำเร็จ");
    }


    //---------------------------------------------------------------------------------------------------------------------
    public function patientchild()
    {
        $data['patientlist'] = patient_list::where('type', "เด็ก")->get();
        $data['sex'] = sex::get();
        return view('patient_child.showdata')->with('data', $data);
    }

    public function addpatientchild(Request $request)
    {
        //dd($request);
        //Encode Image Name
        // $users_image = $request->file('users_image');
        //Generate Image Name
        // $name_gen = hexdec(uniqid());
        //Get Image Extension
        // $users_image_ext = strtolower($users_image->getClientOriginalExtension());

        // $users_image_name = $name_gen . '.' . $users_image_ext;
        // $fullpathusers_image = env('UPLOAD_IMG_BUSINESS_MASTER_PATH') . $users_image_name;

        $patient_list = new patient_list();
        $patient_list->name = $request->name;
        $patient_list->nickname = $request->nickname;
        $patient_list->tel = $request->tel;
        $patient_list->contact = $request->contact;
        $patient_list->sex = $request->sex;
        $patient_list->age = $request->age;
        $patient_list->drug_allergy = $request->drug_allergy;
        // $patient_list->users_image = $fullpathusers_image;
        $patient_list->line_id = $request->line_id;
        $patient_list->type = $request->type;

        $patient_list->save();

        // $users_image->move(env('UPLOAD_IMG_BUSINESS_MASTER_PATH'), $users_image_name);
        return redirect()->back()->with('success', "เพิ่มข้อมูลสำเร็จ");
    }

    public function editpatientchild($id)
    {
        $data['patient_list'] = patient_list::where('id', $id)->get();
        $data['sex'] = sex::get();
        return view('patient_child.edit')->with('data', $data);
    }

    public function updatepatientchild(Request $request)
    {
        $id = $request->patient_id;
        patient_list::where('id', $id)->update([
            'name' => $request->patient_name,
            'nickname' => $request->patient_nickname,
            'tel' => $request->patient_tel,
            'contact' => $request->patient_contact,
            'sex' => $request->patient_sex,
            'age' => $request->patient_age,
            'drug_allergy' => $request->patient_drug_allergy,
            'line_id' => $request->patient_line_id,
        ]);
        return redirect()->route('patientchild')->with('success', "แก้ไขข้อมูลสำเร็จ");
    }
}
