<?php
    /*
     * inputs:  username (string)
     * outputs: student id in the database if successful. error message otherwise.
     * */
    require_once "config.php";

    $response = Array();

    //get the arguments from the request. we'll only have one here, the student's username
    $username = $_POST['username'];
    if ($username == "") {
        //    they didn't send anything.. what am i supposed to do with this?
        // todo: echo "didn't receive username";
        $response['success']=0;
        $response['message']="no username sent";
        echo json_encode($response);

    } else if ($result = mysqli_query($connection, "select * from Student where usename = '" . $username . "'")) {
        //username already taken can't do it man
        // todo: echo "username taken can't do it";
        $response['success']=0;
        $response['message']="username already being used";
        echo json_encode($response);



    } else {
        //username good. insert it
        $query = "INSERT INTO Student(username) VALUES ('" . $username . "');";
        if ($result = mysqli_query($connection, $query)) {
            // query successful let's notify the user
            // but first to make our lives easier let's get their userid for reference later.
            if ($result = mysqli_query($connection, "SELECT idStudent FROM Student WHERE username='" . $username . "'")) {
                $row = mysqli_fetch_array($result);
                $userid = $row["idStudent"];

                // echo "userid = " . $userid;
                $response['success']=1;
                $response['id']=$userid;
                echo json_encode($response);

            }
        }
    }
?>