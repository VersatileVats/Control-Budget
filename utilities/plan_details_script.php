<?php
    require 'common.php';

    // Query to find the recently added i.e. last added plan in the plans table
    $search_query = "SELECT id from plans";
    $result_search_query = mysqli_query($connect,$search_query) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($result_search_query)){
        $last = $row['id'];     
        // $last refers to the recently added plan as we have to add the details of the recently added plan
    }
   
    // Using POST method to extract the details
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($connect, $title);
    $start = $_POST['start'];
    $end = $_POST['end'];

    // Query to update / insert the data into the plans table
    $update_query = "UPDATE plans SET title= '$title', start= '$start', end = '$end' WHERE id = '$last';";
    $result_update_query = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

    // Query to insert the user_plans table
    $insert_query = "INSERT INTO user_plans (u_id, p_id) VALUES ('$_SESSION[id]','$last')";
    $result_insert_query = mysqli_query($connect,$insert_query) or die(mysqli_error($connect));

    header('location: ./../home.php');
