<?php
/**
 * Template Name: Your template name
 */
ini_set('display_errors',1);
$name=$_POST['name'];
$shohrat=$_POST['shohrat'];
$cat=$_POST['cat'];
$brithday=$_POST['brithday'];
$img=$_POST['img'];
$body=$_POST['body'];
$file=$_FILES['file']['name'];
//
//if(!empty($_POST['name']) || !empty($_POST['shohrat']) || !empty($_FILES['file']['name'])){
//    $uploadedFile = '';
//    if(!empty($_FILES["file"]["type"])){
//        $fileName = time().'_'.$_FILES['file']['name'];
//        $valid_extensions = array("jpeg", "jpg", "png");
//        $temporary = explode(".", $_FILES["file"]["name"]);
//        $file_extension = end($temporary);
//        if((($_FILES["hard_file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
//            $sourcePath = $_FILES['file']['tmp_name'];
//            $targetPath = "uploads/".$fileName;
//            if(move_uploaded_file($sourcePath,$targetPath)){
//                $uploadedFile = $fileName;
//            }
//        }
//    }


        global $wpdb;

$GLOBALS['wpdb']->insert('form_data',array(
        'name_m'=>"34",
        'cat'=>"234",
        'brithday'=>"23",
        'img_url'=>"23",
        'body'=>"345",
        'file'=>"234"
    ));


//}
