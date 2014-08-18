<?php
$email = "Ryan.Grissinger@Gmail.com"; // 
// $email="fail";
$hash = md5( strtolower( trim($email) ) );
$aurl= "http://www.gravatar.com/avatar/".$hash."?d=identicon";
// echo $aurl;
// echo "<hr>";

$purl="http://www.gravatar.com/".$hash.".json";
// echo $purl;
// echo "<hr>";

$json=file_get_contents($purl);
$obj=json_decode($json);
$array=json_decode($json,true);

// die(var_dump($obj));
if($obj != "User not found"){
	$name=$obj->entry[0]->preferredUsername;
	$profileurl=$obj->entry[0]->profileUrl;
}
else {
	$name="Stranger";
	$profileurl="http://gravatar.com";
}
// print_r($array);

// foreach ($array as $k1=>$v1){
// 	echo $k1.PHP_EOL;	
// 	foreach ($v1 as $k2=>$v2){
// 		echo $k2.PHP_EOL;
// 		foreach ($v2 as $k3 => $v3) {
// 			echo $k3.PHP_EOL;
// 		}
// 		// ." => ".$v2.PHP_EOL;
// 	}
// 	// echo $key." => ".$value.PHP_EOL;
// }
?>
<h5>Gravatar</h5>
<h6>{{$name}}</h6>
<img src="{{$aurl}}" alt="{{$email}} Avatar">
<a href="{{$profileurl}}">{{$profileurl}}</a>

