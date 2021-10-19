<?php

require 'utilities/common.php';
if (!isset($_SESSION['email'])) {
    header("location: index.php");
}

// Query to get the details of the columns which are common in both users and plans table
$query = "SELECT * FROM user_plans up INNER JOIN users u ON up.u_id = u.id INNER JOIN plans p ON p.id = up.p_id WHERE u.email = '$_SESSION[email]'";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | Home</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    include 'utilities/navbar.php';
    ?>

    <section>
        <div class="container">
            <?php
            // If the logged in user don't have any plans
            if (mysqli_num_rows($result) == 0) {
            ?>
                <h3>You don't have any active plans 😮</h3>
                <div class="row">
                    <div class="card m-3 p-3">
                        <div class="card-body d-flex justify-content-center row-hl" style="width: 300px; height:180px">
                            <div class="d-flex row-hl align-items-center">
                                <a href="create_new_plan.php"><i class="fas fa-plus-circle"></i>
                                    Click here to create a plan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                // If there are some plans for the logged in user:
            } else {
            ?>
                <h3>Your Plans</h3>
                <div class="row">
                    <?php while ($row = mysqli_fetch_array($result)) {
                        // Stroing a new session vaiable for the plan_no
                        $_SESSION['plan_no'] = $row['p_id'];
                    ?>
                        <div class="col-sm-4 mb-3">
                            <div class="card">
                                <div class="card-header text-center" style="background: #c5d5c5">
                                    <div class="row">
                                        <div class="col-sm-9 text-center">
                                            <h4><?php echo $row['title']; ?></h4>
                                        </div>
                                        <div class="col-sm-3 text-right" style="font-size: 20px">
                                            <i class="fas fa-user"></i> <?php echo $row['people']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <p>Budget</p>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            &#8377; <?php echo $row['budget']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p>Date</p>
                                        </div>
                                        <div class="col-sm-8 text-right">
                                            <?php echo $row['start'] . " to " . $row['end']; ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="view.php?plan=<?php echo $row['p_id'] ?>" class="btn btn-outline-primary m-0" style="border:3px solid; border-radius: 8px;">View Plan</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <?php
    // Display the plus icon at the bottom only if there are some plans
    if (mysqli_num_rows($result) != 0) {
    ?>
        <div class="d-flex flex-row-reverse row-hl">
            <div class="p-4 item-hl">
                <a href="create_new_plan.php" class="change"><i class="fas fa-plus-circle fa-4x margin-self" style="color:#007bff;;"></i></a>
            </div>
        </div>
    <?php
    }
    ?>

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