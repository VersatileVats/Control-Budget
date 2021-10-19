<?php
    require 'common.php';

    // Extracting the data from the LOGIN page:
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($connect,$email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($connect,$password);
    $password = md5($password);

    // This query will help me in finding whether the email exists or not ?
    // Selected id only to make the query run fast because it is just for checking 
    $query1 = "SELECT id from users WHERE email = '$email'";
    $result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));

    // This query will help me in finding whether the entered password is correct or not?
    // Because this query will be false only if the pwd is wrong as I have checked the email in the previous query
    $query = "SELECT id from users WHERE email = '$email' && password = '$password'";
    $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_query);
   
    // If the email doesn't exists:
    if (mysqli_num_rows($result_query1) == 0) {
        echo ("<script>alert('Provided email is not registered yet!!'); location.href='./../login.php'</script>");
    } 
    // If the entered password is wrong:
    elseif (mysqli_num_rows($result_query) == 0) {
        echo ("<script>alert('Incorrect password!!'); location.href='./../login.php'</script>");
    }
    // If the user exists, then set the session variables
    else {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        header('location: ./../home.php');
    }
?>