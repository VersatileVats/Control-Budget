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

    // Query to insert the user_plans table
    $insert_query = "INSERT INTO user_plans (u_id) VALUES ('$_SESSION[id]')";
    $result_insert_query = mysqli_query($connect,$insert_query) or die(mysqli_error($connect));

    header('location: ./../home.php');
