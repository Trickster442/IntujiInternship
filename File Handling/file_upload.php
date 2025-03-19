<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="file">
  <button type="submit" name="submit">Upload</button>
</form>

</body>
</html>

<?php
    if (isset($_POST["submit"])) {
        $file_info = $_FILES['file'];
        print_r($file_info);
        echo '<br>';
        $file_name = $_FILES['file']['name'];
        echo $file_name;
        echo'<br>';
        print_r($file_info);
        echo '<br>';
        $file_extension = explode('.', $file_name);
        print_r($file_extension);
        echo '<br>';
        $file_actual_ext = strtolower(end($file_extension));
        echo $file_actual_ext;
        echo '<br>';
    }
?>