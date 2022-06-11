<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function userdata()
    {
        $data['userlist'] = user::get();
        return view('users.showdata')->with('data', $data);
    }

    public function adduser(Request $request)
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;

        $user->save();

        // $users_image->move(env('UPLOAD_IMG_BUSINESS_MASTER_PATH'), $users_image_name);
        return redirect()->back()->with('success', "เพิ่มข้อมูลสำเร็จ");
    }
}
