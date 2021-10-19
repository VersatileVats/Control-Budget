<?php
    require 'common.php';

    // Using the POST method to fetch the data from the signup form
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($connect,$name);

    $email = $_POST['email'];

    $password = $_POST['password'];

    $phone = $_POST['phone'];

    $security_question = $_POST['question'];
    $security_question = mysqli_real_escape_string($connect,$security_question);
    
    $security_answer = $_POST['answer'];
    $security_answer = mysqli_real_escape_string($connect,$security_answer);

    // Regular expression / pattern which an email should follow:
    $email_pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';
    
    // Regular expression for phone pattern: It should start with either 7,8,9 and must have 10 digits
    $phone_no_pattern = '/^[789]\d{9}$/';

    // Regular expression for password field: Minimum eight characters, at least one letter, one number and one special character:
    $pwd_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/";

    // Query to search if the entered email already exists or not?
    $search_query = "SELECT email from users WHERE email = '$email'";
    $result_search_query = mysqli_query($connect,$search_query) or die(mysqli_error($connect));
    $row = mysqli_num_rows($result_search_query);

    // If the email id already exists then the user can't use that again to signup
    if ($row != 0) 
    {
        echo ("<script>alert('Email address already exists'); location.href='./../signup.php'</script>");
    }
    // If the user entered email, doesn't matches the email pattern:
    if (!preg_match($email_pattern, $email))
    {
        echo ("<script>alert('Not a valid email address'); location.href='./../signup.php'</script>");
    } 
    // If the user entered phone number doesn't follow the pattern:
    elseif (!preg_match($phone_no_pattern, $phone)) 
    {
        echo ("<script>alert('Not a valid phone number'); location.href='./../signup.php'</script>");
    } 
    // If the user entered pwd, doesn't matches the password pattern:
    elseif (!preg_match($pwd_pattern, $password))
    {
        echo ("<script>alert('Not a valid password'); location.href='./../signup.php'</script>");
    } 
    // If all the entered data is correct, then do the manipulations
    else 
    {
        $email = mysqli_real_escape_string($connect,$email);

        $password = mysqli_real_escape_string($connect, $password);
        $password = md5($password);
        // Used the MD5() if only the entered data satisfies all above conditions (minimizes the computation time)

        // Query to INSERT the values in the users table:
        $user_query = "INSERT into users (name,email,password,phone_no,question,answer) VALUES ('$name','$email','$password','$phone','$security_question','$security_answer')";
        $user_result = mysqli_query($connect, $user_query) or die(mysqli_error($connect));
        // Setting up the session variables
        $_SESSION['email'] = $email;
        $_SESSION['id'] = mysqli_insert_id($connect);
        echo ("<script>alert('User Registered Successfullly'); location.href='./../home.php'</script>");
}
?>