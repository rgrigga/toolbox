<?php
class AdminCommentsController extends AdminController
{

    /**
     * Comment Model
     * @var Comment
     */
    protected $comment;

    /**
     * Inject the models.
     * @param Comment $comment
     */
    public function __construct(Comment $comment, Company $company, Post $post)
    {
        parent::__construct();
        $this->comment = $comment;
        $this->company=$company;
        $this->post=$post;
        $this->company=App::make('company');
        View::share('company',$this->company);
    }

    /**
     * Show a list of all the comment posts.
     *
     * @return View
     */
    public function getIndex()
    {


        // Grab all the comment posts
        $comments = $this->comment->with('Post')->orderBy('created_at', 'DESC')->paginate(10);

        // foreach ($comments as $comment) {
        //     // dd($comment->post->title);# code...
        // }
        // Show the page
        return View::make('admin::comments/index')
            ->with(compact('comments'))
            ->with(compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $comment
     * @return Response
     */
	public function getEdit($comment)
	{
        // Show the page
        return View::make('admin::comments/edit', compact('comment'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $comment
     * @return Response
     */
	public function postEdit($comment)
	{
        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the comment post data
            $comment->content = Input::get('content');
            
            // Was the comment post updated?
            if($comment->save())
            {
                // Redirect to the new comment post page
                return Redirect::to('admin/comments/' . $comment->id . '/edit')->with('success', Lang::get('admin/comments/messages.update.success'));
            }

            // Redirect to the comments post management page
            return Redirect::to('admin/comments/' . $comment->id . '/edit')->with('error', Lang::get('admin/comments/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/comments/' . $comment->id . '/edit')->withInput()->withErrors($validator);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $comment
     * @return Response
     */
	public function getDelete($comment)
	{
        // Show the page
        return View::make('admin::comments/delete', compact('comment'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $comment
     * @return Response
     */
	public function postDelete($comment)
	{
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $comment->id;
            $comment->delete();

            // Was the comment post deleted?
            $comment = Comment::find($id);
            if(empty($comment))
            {
                // Redirect to the comment posts management page
                return Redirect::to('admin/comments')->with('success', Lang::get('admin/comments/messages.delete.success'));
            }
        }
        // There was a problem deleting the comment post
        return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.delete.error'));
	}

}