<?php

//DB connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "uoc_system";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    //Merge files based on date
    $sql = 'select substring_index(substring_index(filename,"_", 1), "_", -1) as date_result,COUNT(*) as number_of_files,GROUP_CONCAT(content) as content from file_data group by date_result;';
    $retval =mysqli_query($conn,$sql) or die($conn->error);

    if(! $retval ) {
        die('Could not get data: ' . mysqli_error());
    }
    echo "Fetched data successfully\n";
    foreach($retval as $row){
        //replace multiple line breaks with one
        $tab_removed_content=preg_replace("/[\r\n]+/", "\n", $row['content']);
        //replace ,## breaks with ##
        $comma_removed_content=preg_replace("/,##/", "##", $tab_removed_content);
        $mergedFile=$row['date_result'];
        file_put_contents('uploaded_files/'.$mergedFile.'.txt', print_r($comma_removed_content, true));

}

mysqli_close($conn);

?>