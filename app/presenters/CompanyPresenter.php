<?php

use Robbo\Presenter\Presenter;

class CompanyPresenter extends Presenter
{

	public function presentTags(){

		return $this->tags();
	}

	public function presentLogo(){

		return $this->logo();
	}

}