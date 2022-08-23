<?php
$Priority_Number = filter_input(INPUT_POST, 'Priority_Number');
$Patient_Name = filter_input(INPUT_POST, 'Patient_Name');
$Patient_MRN = filter_input(INPUT_POST, 'Patient_MRN');
$Modality = filter_input(INPUT_POST, 'Modality');
$Date_Time = filter_input(INPUT_POST, 'Date_Time');
$Hospital_Location = filter_input(INPUT_POST, 'Hospital_Location');
$Inspection = filter_input(INPUT_POST, 'Inspection');
$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
$uploads_dir = './image';
// create a folder of image name
$size = $_FILES['file']['size']/1024;
if (!empty($Priority_Number) && !empty($Patient_Name) && !empty($Patient_MRN) && !empty($Modality) && !empty($Date_Time) && !empty($Hospital_Location) && !empty($Inspection)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "dbname in sql sever";
    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($size<200){
        move_uploaded_file($_FILES['file']['tmp_name'],$uploads_dir.'/'.$pname);
        $sql = "INSERT into fileup(image,Patient_Name,Patient_MRN) VALUES ('$pname','$Patient_Name','$Patient_MRN')";   
        if(mysqli_query($conn,$sql)){
            echo "File successfully uploaded";
        }
        else{
            echo "File upload error";
        }
    }else{
        echo "Please uplaod file of 200kb or below.";
    };

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO worklist (Priority_Number, Patient_Name, Patient_MRN, Modality, Date_Time, Hospital_Location, Inspection)
        values ('$Priority_Number','$Patient_Name','$Patient_MRN', '$Modality', '$Date_Time', '$Hospital_Location', '$Inspection')";
        if ($conn->query($sql)) {
            echo "New record is inserted sucessfully";
        } else {
            echo "Error: " . $sql . " " . $conn->error;
        }
        $conn->close();
    }
} else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Please fill all the field in form!")';
    echo '</script>';
    // use redirect to code here to redirect to form back "backend part"
    die();
}
