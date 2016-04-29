<?php
    /*
     * signIn.php
     * inputs:  idStudent, idCourse (both from previous calls)
     * outputs: Boolean success/failure
     * */

    require_once "config.php";
    $response = Array();

    $idStudent = $_POST['idStudent'];
    $idCourse = $_POST['idCourse'];

    if($idStudent =="" || $idCourse==""){
        //not all values give. return error
        $response['success'] = 0;
        $response['message'] = "Error: Invalid parameters";
        echo json_encode($response);
    }else{
        //values are fine. let's mark them present
        $query = "INSERT INTO Attendance(idCourse, idStudent, classDate) VALUES('".$idCourse."','".$idStudent."',CURDATE());";
        if($result = mysqli_query($connection,$query)){
            $response['success'] = 1;
            echo json_encode($response);
        }else{
            //it failed somehow....
            $response['success']=0;
            $response['message']="i'm not really sure how this failed.. but it did";
            echo json_encode($response);
        }
    }


?>