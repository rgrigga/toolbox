<?php

class AdminRolesController extends AdminController {

    public $layout = 'layouts.master';
    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Role Model
     * @var Role
     */
    protected $role;

    protected $company;

    /**
     * Permission Model
     * @var Permission
     */
    protected $permission;

    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(Company $company, User $user, Role $role, Permission $permission)
    {
        parent::__construct();
        $this->company=$company;
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
        $this->company=App::make('company');
        View::share('company',$this->company);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        return $this->getIndex();
    }
    public function getIndex()
    {
        // Grab all the groups
        $roles = $this->role->paginate(10);

        // Show the page
        $this->layout->main= View::make('roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Get all the available permissions
        $permissions = $this->permission->all();

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Show the page
        return View::make('roles/create', compact('permissions', 'selectedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);
        // Check if the form validates with success
        if ($validator->passes())
        {
            // Get the inputs, with some exceptions
            $inputs = Input::except('csrf_token');

            $this->role->name = $inputs['name'];
            $this->role->save();

            // Save permissions
            $this->role->perms()->sync(
                $this->permission->preparePermissionsForSave($inputs['permissions'])
            );

            // Was the role created?
            if ($this->role->id)
            {
                // Redirect to the new role page
                return Redirect::to('admin/roles/' . $this->role->id . '/edit')->with('success', Lang::get('admin/roles/messages.create.success'));
            }

            // Redirect to the new role page
            return Redirect::to('admin/roles/create')->with('error', Lang::get('admin/roles/messages.create.error'));

            // Redirect to the role create page
            return Redirect::to('admin/roles/create')->withInput()->with('error', Lang::get('admin/roles/messages.' . $error));
        }

        // Form validation failed
        return Redirect::to('admin/roles/create')->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $role=Role::find($id);
        return View::make('roles/show')->with(compact('role'));
    }
    public function getShow($id)
    {
        // redirect to the frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return Response
     */
    public function edit($role){
        return $this->getEdit($role);
    }
    public function getEdit(Role $role)
    {
        if(! empty($role))
        {
            $permissions = $this->permission->preparePermissionsForDisplay($role->perms());
        }
        else
        {
            // Redirect to the roles management page
            return Redirect::to('roles')->with('error', Lang::get('roles/messages.does_not_exist'));
        }

        // Show the page
        return View::make('roles/edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $role
     * @return Response
     */
    public function update($role)
    {
        return $this->postEdit($role);
    }
    public function postEdit(Role $role)
    {
        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the role data
            $role->name = Input::get('name');
//            dd(Input::get('permissions'));
            $perms=Input::get('permissions');
            if(empty($perms)){
                $perms = [];
            }
//            dd($perms);
            $permIdArray=$this->permission->preparePermissionsForSave($perms);
//            dd($permIdArray);

            $result=$role->perms()->sync($this->permission->preparePermissionsForSave($perms));
            $result=$role->users()->sync($this->user->prepareUsersForSave(Input::get('users')));

            // Was the role updated?
            if ($role->save())
            {
//                dd("success");
                // Redirect to the role page
                $success="Success!";
                Session::flash('message','success');
                return Redirect::to('roles/' . $role->id . '/edit')
                    ->with('success','SUCCESS');
            }
            else
            {
//                dd("fail");
                // Redirect to the role page
                Session::flash('message','fail');
                return Redirect::to('roles/' . $role->id . '/edit')
                    ->with('message', "FAIL")
                ->with('error', "FAIL");
            }
        }

        dd($validator->messages());

        // Form validation failed
        return Redirect::to('roles/' . $role->id . '/edit')
               ->withInput()
            ->withErrors($validator)->with('error', "FAIL");;
    }


    /**
     * Remove user page.
     *
     * @param $role
     * @return Response
     */
    public function getDelete($role)
    {
        // Show the page
        return View::make('roles/delete', compact('role'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param $role
     * @internal param $id
     * @return Response
     */
    public function postDelete($role)
    {
            // Was the role deleted?
            if($role->delete()) {
                // Redirect to the role management page
                return Redirect::to('admin/roles')->with('success', Lang::get('admin/roles/messages.delete.success'));
            }

            // There was a problem deleting the role
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.delete.error'));
    }

//    function missingMethod($params=[])
//    {
//        dd($params);
//    }
}