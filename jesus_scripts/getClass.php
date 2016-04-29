<?php

    /*
     * getClass.php
     * inputs:Beacon UUID, major, minor
     * outputs: Class: name, id, start time,  end time; professor: name;
     *
     * */

    require_once "config.php";
    $response = Array();


    // get the passed in values
    $uuid = $_POST['UUID'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];

    if ($uuid == "" || $major == "" || $minor == "") {
        //not all values give. return error
        $response['success'] = 0;
        $response['message'] = "Error: Invalid parameters";
        echo json_encode($response);
    } else {

        //to make our lives easier we'll get the bacon id first.
        $query = "Select idBeacon FROM Beacon WHERE UUID = '" . $uuid . "' AND major = '" . $major . "' AND minor = '" . $minor . "';";
        if ($result = mysqli_query($connection, $query)) {
            // we found the beacon. let's get the id.
            $row = mysqli_fetch_array($result);
            $beaconID = $row['idBeacon'];

            // now let's get the rest of the info
            $query = "Select Course.idCourse, Course.className, Course.startTime, Course.endTime, Student.name
        FROM Course, Student, Professor 
        WHERE Course.idBeacon = '" . $beaconID . "' AND Course.idProfessor = Professor.idProfessor AND Professor.idStudent = Student.idStudent";

            if($result = mysqli_query($connection,$query)){
                $row = mysqli_fetch_array($result);
                $response['success'] = 1;
                $response['idCourse'] = $row['idCourse'];
                $response['className'] = $row['className'];
                $response['startTime'] = $row['startTime'];
                $response['endTime'] = $row['endTime'];
                $response['name'] = $row['name'];

                //that's it. send this bad boy back
                echo json_encode($response);

            }else{
                echo "something broke man ";
            }



        } else {
            //beacon not found
            $response['success'] = 0;
            $response['message'] = "Error: Invalid Beacon";
            echo json_encode($response);
        }


    }

?>