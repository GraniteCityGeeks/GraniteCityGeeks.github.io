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

    $file_ext = explode('',$file_name);

    print_r($file_ext);

    
}