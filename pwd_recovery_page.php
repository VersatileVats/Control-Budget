<?php
    require 'utilities/common.php';

    // Extracting the data from the PWD_Recovery page:
    $email = $_POST['email'];

    $search_query = "SELECT id,question from users WHERE email = '$email'";
    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_search_query);

    // Checks if the email is registered or not:
    if($row == 0)
    {
        echo ("<script>alert('Email is not registered yet!!'); location.href='pwd_recovery.php'</script>");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | Change Password</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
        include 'utilities/navbar.php';
    ?>

    <!-- Login Form -->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card m-3">
                        <div class="card-header text-center" style="background: #c5d5c5">
                            <h4>Password Recovery</h4>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="utilities/pwd_recovery_script.php">
                                <div class="form-group">
                                    <label for="password">Email</label>
                                    <input 
                                        type="email" 
                                        name="email"
                                        class="form-control"
                                        required 
                                        readonly
                                        value = 
                                        <?php echo $email ?>
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="question">Security Question</label>
                                    <input  
                                        class="form-control"
                                        required 
                                        readonly
                                        value = 
                                        "<?php echo $row['question'] ?>"
                                    >
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
        require 'utilities/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());
    </script>
</body>

</html>
