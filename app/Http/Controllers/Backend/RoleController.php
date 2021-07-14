<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
        $group_name = User::groupname();
        return view('backend.pages.roles.create',compact('group_name'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
         $request->validate([
            'name' => 'required|unique:roles|min:5|max:15',
         ],[
            'name.required' => 'Please give a role name'
         ]);
         $role = Role::create(['name' => $request->name]);
         $permissions = $request->permissions;
         if (!empty($permissions)) {
            $role->syncPermissions($permissions);
         }
         return redirect('admin/roles');
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
        $role = Role::findById($id);
        $group_name = User::groupname();
        $all_permissions = Permission::all();
        return view('backend.pages.roles.edit',compact('group_name','role','all_permissions'));
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
         
         // return $request->all();
         $request->validate([
            'name' => 'required|min:5|max:15',
         ],[
            'name.required' => 'Please give a role name'
         ]);
         $role = Role::find($id);
         $permissions = $request->permissions;
         if (!empty($permissions)) {
            $role->syncPermissions($permissions);
         }
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
