<?php
    require "utilities/common.php";

    /* If any non-logged in user tries to acces the page by writing the url,
    he/she will be directed to the index page */
    if(!isset($_SESSION['email']))
    {   header("location : index.php"); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | Create New Plan</title>
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
                        <div class="card-header text-center bg-primary text-white">
                            <h4>Create New Plan</h4>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="utilities/plan_script.php">
                                <div class="form-group">
                                    <label for="number">Initial Budget</label>
                                    <input type="number" name="budget" min="50" class="form-control" placeholder="Initial Budget (Ex:4000)" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">How many people you want to add in your group?</label>
                                    <input type="number" name="people" min="1" class="form-control" placeholder="No. of people" required>
                                </div>
                                <button class="btn btn-block btn-outline-primary" style="border: 3px solid; border-radius: 8px">Create</button>
                            </form>
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