<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr; //Doc.-https://laravel.com/docs/master/helpers 
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;


class RoleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(  'permission:role-list|role-create|role-edit|role-delete',
                         ['only' => ['index','store']]);
        $this->middleware(  'permission:role-create',
                         ['only' => ['create','store']]);
        $this->middleware(  'permission:role-edit',
                         ['only' => ['edit','update']]);
        $this->middleware(  'permission:role-delete',
                         ['only' => ['destroy']]);
/**/
    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);

        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
       
            $this->validate($request, ['name'=>'required|unique:roles,name',
            'permission' => 'required']);

           $role = Role::create(['name'=> $request->input('name')]);
           $role -> syncPermissions($request->input('permission'));

           return redirect()->route('roles.index')->with('success', 'Perfil criado com sucesso');

    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show ($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions",
                                            "role_has_permissions.permission_id",
                                            "=",
                                            "permissions.id")
                                            ->where("role_has_permissions.role_id",$id)
                                            ->get();

         return view('roles.show', compact('role', 'rolePermissions'));    

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id){

        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
                                    ->where("role_has_permissions.role_id", $id)
                                     ->pluck("role_has_permissions.permission_id")
                                        ->all();

        return view ('role.edit', compact('role','permissions','rolePerissions'));

    }


    public function update(Request $request,$id){
        $this->validate($request, ['name'=> 'required',
                                    'permission'=>'required']);
                                
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role -> syncPermissions($request->input('permission'));                            
    
        return redirect()->route('roles.index')->with('success', 'Perfil atualizado');
        

}

public function destroy($id)
{
    DB::table("roles")->where('id',$id)->delete();

    
}

}
