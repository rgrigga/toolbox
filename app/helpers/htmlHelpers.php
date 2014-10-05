<?php

//function btn($text,$class,$data){
//    $str="";
//    foreach($data as $key=>$value){
//        $str.=" data-".$key."='".$value."' ";
//    }
//    echo "<button class='btn $class' $str >$text</button>";
//}

//function btn($id){
//    echo "<button type='button'
//                    class='btn btn-danger'
//                    data-toggle='collapse'
//                    data-target='#$id'>
//                $id</button>";
//}


function danger($in, $cssclass = '')
{
    echo "<div class='alert alert-danger $cssclass'>$in</div>";
}

function warning($in)
{
    echo "<div class='alert alert-warning'>$in</div>";
}

function success($in)
{
    echo "<div class='alert alert-success'>$in</div>";
}

function btn($text, $class, $data, $options)
{

    //class refers to 'css class'
    $str = "";
    $dataElements = "year";

    $className = get_class_name($data);

    if (!empty($className)) {
        $str .= "data-" . strtolower($className) . "id=" . $data->id;
//        $text=$className.":".$text;
    }
    if ($className == 'Field') {
        $dataElements2 = "id,fldName,fieldid,farmid";
    }
    if ($className == 'Account') {
        $dataElements2 = "id,fName,lName,name";
    } else {
        $dataElements2 = "id,name";
    }

    if (!empty($options['icon'])) {
        $text = "<i class='" . $options['icon'] . "'></i> " . $text;
    }

    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $str .= " data-" . $key . "='" . $value . "' ";
        }
    }

//    $cols=$data->columns();
    if (!empty($options['data'])) {
        foreach (explode(',', $options['data']) as $key) {
            $value = $data->$key;
            $str .= " data-" . $key . "='" . $value . "' ";
        }
    }

    foreach (explode(',', $dataElements2) as $key2) {
//        if(in_array($key2,$cols)){
        $value = $data->$key2;
        $str .= " data-" . $key2 . "='" . $value . "' ";
//        }
    }
    if (!empty($options)) {
        if (is_string($options)) {
            $options = explode(',', $options);
        }
        foreach ($options as $key => $value) {
            if (empty($value)) {
                continue;
            } elseif (in_array($key, explode(',', $dataElements))) {
                $value = str_replace('"', '', $value);
                $str .= " data-" . $key . "='" . $value . "' ";
//        }elseif(in_array($key,explode(',',$dataElements))){
            } elseif ($key == 'id') {
                $str .= " id='" . $value . "' ";
            } elseif ($key == 'url') {
                $str .= " href='" . $value . "' ";
            } else {
                $str .= " " . $key . "='" . $value . "' ";
            }
        }
    }

    echo "<button class='btn $class' $str >$text</button>";
}

function label($content)
{
    $r = rand(999, 99999);
    echo "<div class='label' id='$r'>$content</div>";
}

function dot($content)
{
    $r = rand(999, 99999);
    echo "<div class='dot rotate' id='$r'><div class='inner'>$content</div></div>";
}

function li($str)
{
    echo "<li>" . $str . "</li>";
}

function ul(array $in)
{
    echo "<ul>";
    foreach ($in as $item) {
        echo "<li>";
        echo $item;
        echo "</li>";
    }
    echo "</ul>";
}

function ol(array $in)
{
    echo "<ol>";
    foreach ($in as $item) {
        echo "<li>";
        echo $item;
        echo "</li>";
    }
    echo "</ol>";
}

function h6($str)
{
    echo "<h6>" . $str . "</h6>";
}

function h5($str)
{
    echo "<h5>" . $str . "</h5>";
}

function h4($str)
{
    echo "<h4>" . $str . "</h4>";
}

function h3($str)
{
    echo "<h3>" . $str . "</h3>";
}

function h2($str)
{
    echo "<h2>" . $str . "</h2>";
}

function h1($str)
{
    echo "<h1>" . $str . "</h1>";
}

function p($str)
{
    echo "<p>$str</p>";
}

function span($str, $class = "badge")
{
    echo "<span class='" . $class . "'>$str</span>";
}

function badge($str,$class='')
{
    echo "<span class='badge ".(($class)?"badge-".$class:"")."'>" . $str . "</span>";
}

function alert($str)
{
    echo "<div class='alert'>" . $str . "</div>";
}

function num($str)
{
    return "<strong>" . number_format($str, 2) . "</strong>";
}

function pre($text, $options = array())
{

    if (!is_string($text)) {
        $text = print_r($text);
    }
    $str = "<pre " . implode('=', $options) . ">" . $text . "</pre>";
    echo $str;
    return $str;
}

;

function code($str)
{
    $str = "<code>" . $str . "</code>";
    return $str;
}

function s($str)
{
    echo "<span> " . $str . " </span>";
}

function b($str)
{
    echo "<b> " . $str . " </b>";
}

//function e($in)
//{
//    return htmlentities($in);
//}

function td($str)
{
    echo "<td> " . $str . " </td>";
}

function tr($str)
{
    echo "<tr> " . $str . " </tr>";
}

function get_class_name($object = null)
{
    if (!is_object($object) && !is_string($object)) {
        return false;
    }

    $class = explode('\\', (is_string($object) ? $object : get_class($object)));
    return $class[count($class) - 1];
}

function human_filesize($bytes, $decimals = 2)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

function is_email($in)
{
    if (strpos($in, '@') !== false) {
        return true;
    }
    return false;
}

//http://us3.php.net/get_class
//function get_class_name($classname)
//{
//    if ($pos = strrpos($classname, '\\')) return substr($classname, $pos + 1);
//    return $pos;
//}

//abstract class htmlHelper{
//    public static function hello(){
//        echo "Hello";
//    }
//
//}

//$btn=function($id){
//    echo "<button type='button'
//                    class='btn btn-danger'
//                    data-toggle='collapse'
//                    data-target='#$id'>
//                $id</button>";
//};

////function dump($thing,$name=""){
////    if($name=="")
////        $name="<code>".get_class($thing)."</code>";
////    echo "<h3>".$name.":</h3>";
//////    echo "<div class='alert'>";
////    echo "<pre>";
////    print_r($thing);
////    echo "</pre>";
//////    echo "</div>";
////}
