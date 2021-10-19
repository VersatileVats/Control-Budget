<?php
    require 'utilities/common.php';
    // Will not allow not-logged in users to access this page
    if(!isset($_SESSION['email']))
    {
        header("location: index.php");
    }

    // Query to select all plans from the plans table
    $search_query = "SELECT * from plans";
    $result_search_query = mysqli_query($connect,$search_query) or die(mysqli_error($connect));

    // Traversing each and every row of the query:
    while($row = mysqli_fetch_array($result_search_query))
    {
        /* All these 3 variables will contain the attributes of the last row returned by the query.
        In this manner, we will get the recently added row. */
        $id = $row['id'];     
        $people = $row['people'];
        $budget = $row['budget'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | Plan Details</title>
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
                        <div class="card-body py-4">
                            <form method="POST" action="utilities/plan_details_script.php">
                                <div class="form-group">
                                    <label for="text" class="font-weight-bold">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title (Ex: Trip To Delhi)" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="font-weight-bold">From</label><br>
                                            <input type="date" name="start" class="form-control" min="2021-03-01" max="2021-03-28" style="width: 100%" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="font-weight-bold">To</label><br>
                                            <input type="date" name="end" class="form-control" min="2021-03-01" max="2021-03-28" style="width: 100%" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="number" class="font-weight-bold">Initial Budget</label><br>
                                            <input class="form-control" id="initial_budget" style="width:100%" readonly value="<?php echo $budget ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="number" class="font-weight-bold">No. of People</label><br>
                                            <input class="form-control" id="people" style="width: 100%" readonly value="<?php echo $people ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $var = 1;
                                // Loop will show the fields of people accordingly to the number of people in the plan
                                while ($var <= $people) { ?>
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">Person <?php echo $var ?></label><br>
                                        <input type="name" class="form-control" placeholder="Name" required="true">
                                    </div>
                                <?php $var++;
                                } ?>

                                <input type="submit" value="Submit" class="font-weight-bold mb-5 btn btn-outline-primary btn-block" style="border:3px solid">
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