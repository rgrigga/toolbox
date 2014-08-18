<?php

use Illuminate\Support\Facades\URL; # not sure why i need this here :c
use Robbo\Presenter\PresentableInterface;

class Post extends Eloquent implements PresentableInterface {

	/**
	 * Deletes a blog post and all
	 * the associated comments.
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Delete the comments
		$this->comments()->delete();

		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function image()
	{
		return nl2br($this->image);
	}

	public function img($class="thumb")
	
	{
		$company=App::make('company');
		$asset=asset('assets/'.strtolower($company->brand).'/'.$this->image);
		return "<img src='".$asset."' class='".$class."'>";
	}


	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */
	public function comments()
	{
		return $this->hasMany('Comment');
	}

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

// https://github.com/briannesbitt/Carbon/blob/master/src/Carbon/Carbon.php#L797
        return $date->toDateString();
    }

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to('blog/'.$this->slug);
	}

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

    public function getPresenter()
    {
        return new PostPresenter($this);
    }

	public function tags()
	{
		// var_dump($this->meta_keywords);
		$tags=array();

		$tags=explode(',', $this->meta_keywords);
// var_dump($tags);
		$tags=array_map('trim',$tags);

		if(!$tags){

		 array_push($tags, 'private');
		}
		//return $this->hasMany('Tag');
		return $tags;
	}
// http://laravel.io/

}
