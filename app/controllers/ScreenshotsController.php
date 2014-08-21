<?php

class ScreenshotsController extends \BaseController {

	/**
	 * Display a listing of screenshots
	 *
	 * @return Response
	 */
	public function index()
	{
		$screenshots = Screenshot::all();

		return View::make('screenshots.index', compact('screenshots'));
	}

	/**
	 * Show the form for creating a new screenshot
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('screenshots.create');
	}

	/**
	 * Store a newly created screenshot in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Screenshot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Screenshot::create($data);

		return Redirect::route('screenshots.index');
	}

	/**
	 * Display the specified screenshot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$screenshot = Screenshot::findOrFail($id);

		return View::make('screenshots.show', compact('screenshot'));
	}

	/**
	 * Show the form for editing the specified screenshot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$screenshot = Screenshot::find($id);

		return View::make('screenshots.edit', compact('screenshot'));
	}

	/**
	 * Update the specified screenshot in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$screenshot = Screenshot::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Screenshot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$screenshot->update($data);

		return Redirect::route('screenshots.index');
	}

	/**
	 * Remove the specified screenshot from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $screen=Screenshot::findOrFail($id);
        $project=$screen->project()->first();

		Screenshot::destroy($id);
		return Redirect::route('projects.show',$project->id)->with('success',"success");
	}

}
