<?php

class ProjectsController extends \BaseController {

	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();

        $userProjects = Auth::user()->projects()->paginate(5);

		return View::make('projects.index', compact('projects','userProjects'));
	}

	/**
	 * Show the form for creating a new project
	 *
	 * @return Response
	 */
	public function create()
	{
        $companies = Company::all()->lists('name','id');
        $users = User::all()->lists('username','id');
        $owner = Auth::user()->id;

        return View::make('projects.create', compact('users','companies','owner'));
	}

	/**
	 * Store a newly created project in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Project::create($data);

		return Redirect::route('projects.index');
	}

	/**
	 * Display the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::findOrFail($id);


		return View::make('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);
        $companies = Company::all()->lists('name','id');
        $users = User::all()->lists('username','id');

		return View::make('projects.edit', compact('project','users','companies'));
	}

	/**
	 * Update the specified project in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        if (Input::hasFile('screen'))
        {
            $destinationPath=public_path().DIRECTORY_SEPARATOR."project";
            $file=Input::file('screen');
            $fileName=$file->getClientOriginalName();
            $file->move($destinationPath,$fileName);
//            $data['path']=$destinationPath;
            $screen=new Screenshot([
                'path'=>"project/".$fileName,
                'caption'=>$project->name,
            ]);
            $project->screenshots()->save($screen);
            //
        }

        unset($data['screen']);
		$project->update($data);

		return Redirect::route('projects.index')->with('success','SUCCESS!');
	}

	/**
	 * Remove the specified project from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Project::destroy($id);

		return Redirect::route('projects.index');
	}

}
