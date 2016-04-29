<?php
/*
 *DayID:
 *	0 - Sunday
 *  1 - Monday
 *  2 - Tuesday
 *  3 - Wednesday
 *  4 - Thursday
 *  5 - Friday
 *  6 - Saturday
 */

//make array to hold response
$response = array();

//make sure required files are there
require_once __DIR__ . '/wsbf_connect.php';

//connect..
$db = new DB_CONNECT();

//get all shows
$result = mysql_query("SELECT schedule.dayID, schedule.start_time, schedule.end_time, schedule.description, users.preferred_name
	FROM schedule, users, schedule_hosts
	WHERE active = 1 AND schedule_hosts.scheduleID = schedule.scheduleID AND schedule_hosts.username = users.username
	ORDER BY schedule.dayID, schedule.start_time ASC
") or die(mysql_error());

// make sure we got something back....
if (mysql_num_rows($result) > 0) {
    $response["shows"] = array();

    while ($row = mysql_fetch_array($result)) {
        //array?
        $show = array();
        $show["dayID"] = $row["dayID"];
        $show["start_time"] = $row["start_time"];
        $show["end_time"] = $row["end_time"];
        $show["description"] = $row["description"];
        $show["show_name"] = $row["preferred_name"];

        //$show["active"]=$row["active"];
        //We cut out show_typeID, genre, genre because we don't really need them right now?
        //push?
        array_push($response["shows"], $show);
    }
    $response["success"] = 1;

    //send this bad boy back
    echo json_encode($response);
} else {
    //nothing found :(
    $response["success"] = 0;
    $response["message"] = "I'm not sure what you did but we couldn't find any shows..";

    //echo this back
    echo json_encode($response);
}


?>
