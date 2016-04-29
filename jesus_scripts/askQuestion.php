<?php
    /*
     * askQuestion.php
     * inputs:  idCourse*, question
     *         *(course id should have been stored from Previous calls),
     * outputs: Boolean Success/Failure
     * */

    require_once "config.php";
    $response = Array();


    $idCourse = $_POST['idCourse'];
    $question = $_POST['question'];

    if ( $idCourse == "" || $question == "") {
        //not all values give. return error
        $response['success'] = 0;
        $response['message'] = "Error: Invalid parameters";
        echo json_encode($response);
    } else {
        $query1 = "INSERT INTO Question(questionText) VALUES ('".$question."');";
        $query2 = "INSERT INTO courseQuestion (idCourse, idQuestion) VALUES('".$idCourse."', LAST_INSERT_ID())";
        if(mysqli_query($connection,$query1)){
            //we're good
            if(mysqli_query($connection,$query2)){
                //still good
                $response['success'] = 1;
                echo json_encode($response);

            }else {
                $response['success'] = 0;
                $response['message'] = "Error: it failed... i'm not sure why but it did";
                echo json_encode($response);

            }

        }else{
            //error
            $response['success'] = 0;
            $response['message'] = "Error: it failed... i'm not sure why but it did";
            echo json_encode($response);

        }

    }


?>