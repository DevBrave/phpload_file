<?php
session_start();
const VALID_TYPES = ['jpeg','png','jpg'];
const MAXIMUM_SIZE = 2048000;
const MAXIMUM_WIDTH = 1500;
const MAXIMUM_HEIGHT = 1400;
const MINIMUM_WIDTH = 300;
const MINIMUM_HEIGHT = 200;
require 'functions.php';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
    if (file_exists($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){

        $targetDir = 'uploads/';
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileExtension = pathinfo($fileName,PATHINFO_EXTENSION);
        $fileInfo = getimagesize($_FILES["image"]["tmp_name"]);
        $width = $fileInfo[0];
        $height = $fileInfo[1];

        crdir($targetDir); // Create Directory if is not exists.
        valid_type($fileExtension,VALID_TYPES); // Check type is valid or not.
        valid_size($fileSize,MAXIMUM_SIZE); // Check size of file is enough or too big.
        // Check scale of image is enough or too big.
        valid_scale($height,$width,MAXIMUM_HEIGHT,MAXIMUM_WIDTH,MINIMUM_HEIGHT,MINIMUM_WIDTH);

        if (empty($error)){
            move_uploaded_file($tmpName,$targetDir.$fileName);
            $_SESSION['success_upload'] = 'Your File already have uploaded';
        }else{
            $_SESSION['error'] = $error;
        }

        header("Location: index.php");


    }else{
        $_SESSION['fail_upload'] = 'Your image didn\'t upload. Something Wrong!(try again)';
    }
}

    header('Location: index.php');


