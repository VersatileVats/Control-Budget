<?php
    require 'common.php';

    // Extracting values from GET METHOD
    $plan_no = $_GET['plan'];
    $people = $_GET['people'];

    // Extracting values from POST METHOD
    $title = $_POST['title'];
    $spent_on = $_POST['spent_on'];
    $amount = $_POST['amount'];
    $person = $_POST['person'];

    // Bill Upload Functionality
    $bill = $_FILES['bill']['name'];
    $tmp = $_FILES['bill']['tmp_name'];
    move_uploaded_file($tmp, "./../bill_img/".$bill);

    // Query to look out for the total fields in the expense table:
    $search_query = "SELECT * FROM expense";
    $result_search_query = mysqli_query($connect,$search_query) or die(mysqli_error($connect));
    $col = mysqli_num_fields($result_search_query);
    // The $col will have the total number of fields in the expense table.

    /*************** Dnamically adds the number of people field in the expense table:  ***************/
    /*As in the Expense table, there will always be a minimum of 04 fields (id, p_id, title, spent_on), so in order to dynamically 
    check the total number of new fields for people to be added. This will be calculated by the expression: $people - ($col-4) */ 

    /* Initially I don't have any People field in the expense table, but due to this loop the field gets automatically add. */
    $var = 1;
    $x = ($col-4);
    $t = ($col-3);
    while($var <= ($people - $x))
    {
        $alter_query="ALTER TABLE expense ADD Person$t int";
        $result_alter_query = mysqli_query($connect,$alter_query) or die(mysqli_error($connect));
        $var ++;
        $t ++; 
    }

    // Dynamically Update (Add) the Per Person Expenses in the Expense Table
    $insert_query = "INSERT INTO expense (p_id,title,spent_on,$person) VALUES ('$plan_no','$title','$spent_on','$amount')";
    $result_insert_query = mysqli_query($connect,$insert_query) or die(mysqli_error($connect));

    $exp_id = mysqli_insert_id($connect);

    // Add the data into the exp_bill data:
    $query1 = "INSERT INTO exp_bill (exp_id,bill_name) VALUES ('$exp_id','$bill')";
    $result_quer1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));

    header("location: ./../expense_distribution.php?plan=".$plan_no);
