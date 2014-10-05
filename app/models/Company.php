<?php
use Robbo\Presenter\PresentableInterface;
// https://github.com/robclancy/presenter#usage

// class Company extends Eloquent implements PresentableInterface{
class Company extends Eloquent implements PresentableInterface{
    protected $guarded = array();

    public static $rules = array(
		'brand' => 'required',
		'name' => 'required',
		'phone' => 'required',
		'menus' => 'required'
	);

	public function getPresenter()
	    {
	        return new CompanyPresenter($this);
	    }

	public function logo($option=null)
	
	{
		if(in_array($option,['center','centered'])){
			$myclass='img-center';
		}
		else{
			$myclass=$option;
		}
		// return "BAM BAM";
        $minipath='assets/'.strtolower($this->brand).'/'.$this->image;

        if(File::exists($minipath)){
            $asset=asset($minipath);
        }else{
            $asset=asset('assets/img/Five_petal_flower_icon.svg');
        }


        if($option=='url'){
//            echo $minipath;
//            echo "<hr>";
//            echo $asset;


            return $asset;
        }


        return "<img class='logo img-responsive ".$myclass."' src='".$asset."' alt='".$this->brand."'>";

	// <img class="img-responsive img-center" src="{{asset('packages/rgrigga/'.strtolower($company->brand).'/logo.png')}}" alt="{{$company->brand}}">

	}	
	public function img()
	
	{
		$asset=asset('assets/'.strtolower($this->brand).'/'.$this->image);
		return "<img class='img-responsive' src='".$asset."'>";
	}

    public function menus()
	{
		// var_dump($this->meta_keywords);
		$menus=array();
		$menus=explode(',', $this->menus);

		$menus=array_map('trim',$menus);

		// var_dump($menus);
		if(!$menus){
		 array_push($menus, 'private');
		}
		//return $this->hasMany('Tag');
		return $menus;

		// foreach ($this->post->get() as $post) {

		// 	foreach ($post->tags() as $mytag) {
		// 		if(!in_array($mytag, $alltags)){
		// 			array_push($alltags, trim($mytag));
		// 		}
		// 	}

		// }
	}

public function pages(){
	// die("COMPANY MODEL PAGES()");
	//return an array of page names
	$mypages = array();
	$brand=strtolower($this->brand);
	$path="../app/views/site/".$brand."/pages/";

	// die($path);

	foreach (glob($path."*.blade.php") as $filename) {
		// die($filename);
	        $filename=str_replace($path, "", $filename);
	        $filename=str_replace(".blade.php", "", $filename);
	        array_push($mypages,$filename);
	    }
	// die(var_dump($mypages));
	return $mypages;


}
	public function posts($tags="")
	{
		//tags could be an array or a single.  It is a has many 
		//relationship
		// $posts=
		// return $posts;
		die("COMPANY MODEL -> POSTS()");
	}

	public function directory(){
		return "assets/".strtolower($this->brand)."/";
	}
    function brand()
    {
        return $this->brand;
    }
    function twitter()
    {
        return '@'.$this->twitter;
    }
}