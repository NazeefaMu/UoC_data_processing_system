<?php

//DB connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "uoc_system";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

if (isset($_POST['submit'])){
    echo $fname =  $_REQUEST['fname'];
    echo $lname = $_REQUEST['lname'];
    echo $date =  $_REQUEST['date'];
    echo "</br>";
    echo "<hr>";

    //Get file names and insert to database and folder
    $countfiles = count($_FILES['file']['name']);
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'textfiles/'.$filename);

        $textFiles = array($filename);

        foreach($textFiles as $singleFile) {

            $file = $singleFile;
            $myfile = fopen('textfiles/'.$filename, "r") or die("Unable to open file!");
            $string=fread($myfile,filesize('textfiles/'.$filename));
            fclose($myfile);
            echo $encoding=mb_detect_encoding($string, 'auto');
            $escaped_string=mysqli_real_escape_string($conn,$string);
            $separated_content=$escaped_string."\n"."=============================="."\n";
        }
        $sql="insert into file_data(fname,lname,filename,content) VALUES ('$fname','$lname','$filename','$separated_content')";

        $results=mysqli_query($conn,$sql) or die($conn->error);
        if($results){
            echo "submitted successfully";
        }else{
            echo "form not submitted";
        }
    }

}

mysqli_close($conn);

?>