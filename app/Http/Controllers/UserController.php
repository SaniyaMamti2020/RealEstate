<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\DataTables\UserDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Hash;
use Auth;
use File;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = Hash::make($request->password);

        $validated = $request->all();
        $validated['password'] = $password;
        unset($validated['roles']);
        $user = User::create($validated);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success', 'User Added Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.user.edit' ,compact('user','userRole','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->all();
        unset($validated['_token']);
        unset($validated['_method']);
        unset($validated['desc']);
        unset($validated['roles']);
        $user = User::where('id',$id)->update($validated);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user = User::find($id);    
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success', 'User Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::where('id',$id)->delete();
        return Response()->json($user);
    }
}
