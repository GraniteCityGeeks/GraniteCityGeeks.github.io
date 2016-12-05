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
}