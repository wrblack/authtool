<?php
    /*
     * answerQuestion.php
     * inputs: idCourse, idStudent, answer
     * outputs: boolean success/failure
     * */

    require_once "config.php";
    $response = Array();

    $idStudent = $_POST['idStudent'];
    $idCourse = $_POST['idCourse'];
    $answer = $_POST['answer'];


    if($idStudent =="" || $idCourse=="" || $answer=="") {
        //not all values give. return error
        $response['success'] = 0;
        $response['message'] = "Error: Invalid parameters";
        echo json_encode($response);
    }else{
        $query = "INSERT INTO Answers(idCourse, idStudent, dateAsked, answer) VALUES('".$idCourse."','".$idStudent."',CURDATE(),'".$answer."')";
        if(mysqli_query($connection,$query)){
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