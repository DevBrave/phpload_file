<?php

session_start();
$error = [];

/**
 * Check the main directory is exists or not.If is not will make directory .
 * @param string $dir require
 */
function crdir(string $dir){

    if (!is_dir($dir)) mkdir($dir);

}


/**
 * Check the file's type is valid or not and very customizable.
 * @param string $fileType Require
 * @param array $validTypes Require
 */
function valid_type(string $fileType,array $validTypes){

    global $error;
    if (!in_array($fileType,$validTypes)) {
        $message = 'Your File\'s type is ' . $fileType . ' but the files type must be (jpeg,png,jpg)';
        array_push($error, $message);
    }

}



/**
 * Attempts to know is file's size valid.
 * @param int|string $fileSize oRequire
 * @param int $maximumSize Require
 */

function valid_size($fileSize, int $maximumSize){

    $maxSize = $maximumSize;
    global $error;
    if ($fileSize > $maxSize) {
        $message = 'The files size is too big';
        array_push($error, $message);
    }
}


function valid_scale($height,$width,$maxHeight,$maxWidth,$minHeight,$minWidth){

    global $error;
    if ($width > $maxWidth && $height > $maxHeight) {
            $message = 'Your file scale should be within bigger than ('. $maxWidth.'x'. $maxHeight.') and lower than ('. $minWidth.'x'. $minHeight.')';
            array_push($error, htmlspecialchars($message));
    }
}





