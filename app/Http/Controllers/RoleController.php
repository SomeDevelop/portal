<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
//Importing laravel-permission models
//use Spatie\Permission\Models\Role;
use App\Role;
//use Spatie\Permission\Models\Permission;
use App\Permission;
use Session;


class RoleController extends Controller
{
    public function __construct() {
//        $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roles = Role::all();//Get all roles

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::all();//Get all permissions

        return view('roles.create', ['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Validate name and permissions field
        $this->validate($request, [
                'name'=>'required|unique:roles|max:10',
                'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $role = Role::where('name', $name)->first();

            $p = Permission::where('id', '=', $permission)->first();
            //Fetch the newly created roles and assign permission
            $role->attachPermission($p);
        }

//        return redirect()->route('roles.index')
//            ->with('flash_message',
//                'Role'. $role->name.' added!');
        flash('Role '. $role->name.' was added! ')->important();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $role = Role::findOrFail($id);//Get roles with the given id
        //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:10|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();

        $p_all = Permission::all();//Get all permissions

        foreach ($p_all as $p) {
            $role->detachPermission($p); //Remove all permissions associated with roles
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $role->attachPermission($p);  //Assign permission to roles
        }

//        return redirect()->route('roles.index')
//            ->with('flash_message',
//                'Role'. $role->name.' updated!');
        flash('Role '. $role->name.' was updated! ')->important();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $_role = Role::findOrFail($id);
        $role = Role::whereId($id);
//        dd($_role->name);
        $role->delete();

        flash('Role '. $_role->name.' was deleted! ')->important();
        return redirect()->route('roles.index');

    }
}
