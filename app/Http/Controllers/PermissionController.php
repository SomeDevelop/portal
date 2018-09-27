<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

//use Spatie\Permission\Models\Role;
use App\Role;
//use Spatie\Permission\Models\Permission;
use App\Permission;


use Session;

class PermissionController extends Controller {

    public function __construct() {
//        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $permissions = Permission::all(); //Get all permissions

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::get(); //Get all roles

        return view('admin.permissions.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more roles is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input roles to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->attachPermission($permission);
            }
        }

//        return redirect()->route('permissions.index')
//            ->with('flash_message',
//                'Permission'. $permission->name.' added!');
        flash('Permission '.$permission->name.'  saved! ')->important();
        return redirect()->route('permissions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
//        flash('Permission '.$permission->name.'  edited! ')->important();
//        return redirect()->route('permissions.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
//        $input = $request->all();
        $name = $request->input("name");
        $permission->fill(["name"=>$name])->save();

        flash('Permission '.$permission->name.'  updated! ')->important();
        return redirect()->route('permissions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission
        if ($permission->name == "admin") {
            return redirect()->route('admin.permissions.index')
                ->with('flash_message',
                    'Cannot delete this Permission!');
        }

        $permission->delete();

//        return redirect()->route('permissions.index')
//            ->with('flash_message',
//                'Permission deleted!');
        flash('Permission '.$permission->name.'  deleted! ')->important();
        return redirect()->route('permissions.index');

    }
}