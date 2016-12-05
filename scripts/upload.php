<?php
/**
 * Created by PhpStorm.
 * User: 1608354
 * Date: 05/12/2016
 * Time: 16:23
 */

if (isset($_FILES['file'])){
    $file = $_FILES['file'];
    print_r($file);
    // store file properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $file_ext = explode('',$file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('jpg','bmp','gif','png');

    print_r($file_ext);

    if(in_array($file_ext,$allowed)){
        if ($file_error === 0) {

            $file_name_new = uniqid('',true).'.'.$file_ext;
            $file_destination = 'uploads/'.$file_name_new;

            if(move_uploaded_file($file_tmp,$file_destination)){
                echo $file_destination . 'Was Uploaded Successfully!';
            }

        }
    }

    
}