<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("form");
    }
    public function userdata()
    {
        $sno = 1;
        $objuser = user::all();
        return view("formdata",compact("objuser","sno"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "txtname" => "required|unique:users,username",
            "txtemail" => "required|unique:users,email",
            "txtpass" => [
                'required',
                'string',
                'min:10',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[!@#$%^&*()_+-]/', // Fixed regex to remove the '='
            ],
        ], 
        [
            'txtname.required' => 'The username field is required.',
            'txtname.unique' => 'The username has already been taken.',
            'txtemail.required' => 'The email field is required.',
            'txtemail.unique' => 'The email has already been registered.',
            'txtpass.required' => 'The password field is required.',
            'txtpass.min' => 'The password must be at least 10 characters.',
            'txtpass.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
        ]);

        $objuser = new user();
        $objuser->username = $request->input('txtname');
        $objuser->email = $request->input('txtemail');
        $objuser->password = Crypt::encrypt($request->input('txtpass'));
        $res = $objuser->save();

        if($res)
        {
            return back()->with("success","Form Submitted Successfully");
        }
        else
        {
            return back()->with("fail","Error! in submitting form");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $id)
    {
        $decid = Crypt::decrypt($id->route('id'));
        $user = user::find($decid);
        return view("updateform",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userid)
    {
       $user = user::find($userid);
       
       $user->username = $request->input('txtname');
       $user->email = $request->input('txtemail');
       $res = $user->save();

       if($res)
        {
            return back()->with("success","Form Submitted Successfully");
        }
        else
        {
            return back()->with("fail","Error! in submitting form");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
