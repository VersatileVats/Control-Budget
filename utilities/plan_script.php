<?php
    require 'common.php';

    // Using POST method to get the details
    $budget = $_POST['budget'];
    $people = $_POST['people'];

    // Query to insert the values in the plans table
    $query = "INSERT INTO plans (budget,people) VALUES ('$budget','$people');";
    $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));
    header('location: ./../plan_details.php');

?>