<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image</title>
</head>
<body>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <?php
    session_start();
    if (isset($_SESSION['error']) && !is_null($_SESSION['error'])) {

        foreach ($_SESSION['error'] as $error) {
            echo '<div style="color: red;font-size: large">' . $error . '.' . '</div><br>';
        }
        unset($_SESSION['error']);

    }elseif (isset($_SESSION['success_upload'])){
        echo '<div style="color: green;font-size: large">'.$_SESSION['success_upload'].'</div><br>';
        unset($_SESSION['success_upload']);

    }elseif (isset($_SESSION['fail_upload'])){
        echo '<div style="color: green;font-size: large">'.$_SESSION['fail_upload'].'</div><br>';
        unset($_SESSION['fail_upload']);
    }
    ?>
    <input type="file" name="image">
    <button type="submit" name="uploadBtn" value="Upload">Upload</button>
</form>
</body>
</html>
