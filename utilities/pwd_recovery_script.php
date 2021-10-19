<?php
    require 'common.php';

    $security_answer = $_POST['answer'];
    $email = $_POST['email'];

    $new_pwd = $_POST['new_pwd'];
    $new_pwd = mysqli_real_escape_string($connect, $new_pwd);

    $conf_pwd = $_POST['again_pwd'];
    $conf_pwd = mysqli_real_escape_string($connect, $conf_pwd);

    $pwd_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/";

    $query = "SELECT answer from users WHERE email = '$email'";
    $result_query = mysqli_query($connect,$query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_query);

    if(!preg_match($pwd_pattern, $new_pwd))
    {
        echo ("<script>alert('Password doesn\'t fullfill the required parameters'); location.href='./../pwd_recovery.php'</script>");  
    }
    elseif($new_pwd != $conf_pwd)
    {
        echo ("<script>alert('New password and confirm password doesn\'t match'); location.href='./../pwd_recovery.php'</script>");  
    }
    elseif( $security_answer != $row['answer'] )
    {
        echo ("<script>alert('Incorrect security answer!!'); location.href='./../pwd_recovery.php'</script>");
    }
    else
    {
        $new_pwd = md5($new_pwd);

        $update_query = "UPDATE users SET password = '$new_pwd' WHERE email = '$email'";
        $result_update_query = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
        echo ("<script>alert('Password Updated Successfully'); location.href='./../login.php'</script>");
    }
?>