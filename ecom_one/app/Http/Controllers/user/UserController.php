<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\UserPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            $get_id = Auth::user()->id;
            //dd($get_id);

            $users = User::where('id', $get_id)->select(['id', 'name','email', 'user_rol'])->get();
            foreach($users as $user){
                $all_user = $user;
            }
        }
        return view('bakend.user.pages.profile.create', compact('all_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        if($request->hasFile('profile_img')){
            $file = $request->file('profile_img');
            $file_name = $file->getClientOriginalName();

            $file_store = $file->storeAs('/userProfile', $file_name, 'public');

            $create = UserPhoto::create([
                'profile' => $file_name
            ]);
        }
        session()->flash('profile_update', 'Profile Save Successfull!');
        return redirect()->route('profile.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('bakend.user.pages.userImg.user-img');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bakend.user.pages.profile.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $updat = $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        // if($request->hasFile('profile_img')){
        //     $file = $request->file('profile_img');
        //     $file_name = $file->getClientOriginalName();

        //     $store_file = $file->storeAs('/user', $file_name, 'public');

        //     $updat->update([
        //         'profile' => $file_name
        //     ]);

        // }

        session()->flash('update', 'Your Profile Save Successfull!');
        return redirect()->route('profile.create');

    }
}
