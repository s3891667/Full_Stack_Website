<?php
if(isset($_POST['delete_file']))
{
 $filename = $_POST['file_name'];
 unlink($filename);
 header("Location:./listofimage.php");
}
