<?php

use Robbo\Presenter\Presenter;

class CommentPresenter extends Presenter
{
	function presentTags(){
		dd($this->tags());
		// return $this->post();
	}
}