<?php


class AdminPermissionsController extends AdminController {

    /**
     * Permission Repository
     *
     * @var Permission
     */
    protected $permission;

    public function __construct(Permission $permission,Role $role)
    {
        $this->permission = $permission;
        $this->role=$role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = $this->permission->all();

        return View::make('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Permission::$rules);

        if ($validation->passes())
        {
            $this->permission->create($input);

            return Redirect::route('permissions.index');
        }

        return Redirect::route('permissions.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permission->findOrFail($id);

        return View::make('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permission->find($id);
        $roles=Role::all();

        if (is_null($permission))
        {
            return Redirect::route('permissions.index');
        }

        return View::make('permissions.edit', compact('permission','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Permission::$rules);

        if ($validation->passes())
        {
            $permission = $this->permission->find($id);

            $roles=Input::get('roles');
            if(empty($roles)){
                $roles=[];
            }

//            dd($roles);
//            $permIdArray=$this->permission->preparePermissionsForSave($perms);
//            dd($permIdArray);

//            dd($this->role->prepareRolesForSave($roles));
            $result=$permission->roles()->sync($this->role->prepareRolesForSave($roles));
//            $result=$role->users()->sync($this->user->prepareUsersForSave(Input::get('users')));

//            dd($result);
            // Was the role updated?
//            if ($role->save())
//            {

            unset($input['roles']);
            $permission->update($input);


            return Redirect::route('permissions.index', $id)->with('success','you did it!');
        }

        return Redirect::route('permissions.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->permission->find($id)->delete();

        return Redirect::route('permissions.index');
    }

    public function addRole(Permission $perm, Role $role){


        // $role=$role->get();
        // $role->addPermission($perm);
        // return $role;

        $role->attachPermission($perm);
        $role->save();
        $perms=$role->perms()->get();

        // return $perms;
        // if($role->perms()->sync([$perm->id])){
        Session::flash('message','Saved!');
        // }
        // else{
        // Session::flash('message','Not Saved!');

        // }
        // Session::flash('message','Not Saved!');

        return Redirect::route('permissions.edit',$perm->id);
    }

    public function removeRole(Permission $perm, Role $role){
        ;

        if($role->perms()->detach($perm))
            Session::flash('message','Saved!');
        else
            Session::flash('message','Not Saved!');

        return Redirect::route('permissions.edit',$perm->id);
    }
}

