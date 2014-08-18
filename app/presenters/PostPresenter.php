<?php

use Robbo\Presenter\Presenter;

class PostPresenter extends Presenter
{

	public function presentTags(){

		return $this->tags();
	}

	public function presentLogo(){

		return $this->logo();
	}

}