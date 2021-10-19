<?php
    require 'common.php';

    // Extracting the data from the change_pwd page:
    $old_pwd = $_POST['password'];
    $old_pwd = mysqli_real_escape_string($connect, $old_pwd);

    // Using the MD5 function to convert the user entered password:
    $old_pwd = md5($old_pwd);

    $new_pwd = $_POST['new_pwd'];
    $new_pwd = mysqli_real_escape_string($connect, $new_pwd);

    $conf_pwd = $_POST['again_pwd'];
    $conf_pwd = mysqli_real_escape_string($connect, $conf_pwd);

    $pwd_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/";

    // Query for getting the data from the database:
    $search_query = "SELECT password from users WHERE email = '$_SESSION[email]'";
    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_search_query);
    
    // Storing the db's password for further evaluations:
    $existing_pwd = $row['password'];

    // Ensuring that the new pwd follows the password pattern
    if (!preg_match($pwd_pattern, $new_pwd))
    {
        echo ("<script>alert('Password doesn\'t fullfill the required parameters'); location.href='./../change_password.php'</script>");  
    }
    // Checking if user entered same NEW PASSWORD & CONFIRM PASSWORD
    elseif ($new_pwd != $conf_pwd)
    {
        echo ("<script>alert('New password and confirm password doesn\'t match'); location.href='./../change_password.php'</script>");  
    } 
    // If user entered wrong OLD PASSWORD
    elseif ($existing_pwd != $old_pwd) 
    {
        echo ("<script>alert('Old Password Mis-matches'); location.href='./../change_password.php'</script>");
    } 
    // If user has entered every detail correctly, then update the password
    else
    {
        $new_pwd = md5($new_pwd);

        $update_query = "UPDATE users SET password = '$new_pwd' WHERE email = '$_SESSION[email]'";
        $result_update_query = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
        echo ("<script>alert('Password Updated Successfully'); location.href='./../change_password.php'</script>");
    }

?>