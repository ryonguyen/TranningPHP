<?php
/**
 * Created by PhpStorm.
 * User: hoangnm
 * Date: 4/5/16
 * Time: 12:28 AM
 */

if(isset($array_title)){
    $array_title = array();
}
if(isset($array_content)){
    $array_content = array();
}



if(isset($_POST['value_title']) && isset($_POST['value_content'])){
    $array_title[] = $_POST['value_title'] ;
    $array_content[] = $_POST['value_content'];
}

//foreach ($array_title as $value) {
//    echo "Value: $value<br />\n";
//}
//$max = sizeof($huge_array);
$max = count($array_title);
echo $max."<br/>";
for($i=0;$i<$max;$i++){
    echo 'title: '.$array_title[$i].' and '.$array_content[$i]."<br/>";
}