<?php
    require 'utilities/common.php';
    // Restricting unauthorized users.
    if (!isset($_SESSION['email'])) 
    {
        header("location: index.php");
    }
    
    // Getting the plan_no from the url sent by the home.php page
    $plan_no = $_GET['plan'];

    // Query To Select The Current Selected Plan
    $search_query = "SELECT * FROM plans WHERE id = '$plan_no'";
    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_search_query);

    // Query To Get the Details of the Expenses
    $query = "SELECT * FROM expense WHERE p_id = $plan_no";
    $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));

    // Array to store the amount spent by the person:
    $total = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | View</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    include 'utilities/navbar.php';
    ?>

    <!-- Section for the plan details (at the top) -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header text-center" style="background: #c5d5c5">
                            <div class="row">
                                <div class="col-sm-9 text-center">
                                    <h4>
                                        <?php echo $row['title'] ?>
                                    </h4>
                                </div>
                                <div class="col-sm-3 text-right" style="font-size: 20px">
                                    <i class="fas fa-user"></i>
                                    <?php echo $row['people'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-sm-10 font-weight-bold">
                                    <p>Budget</p>
                                </div>
                                <div class="col-sm-2 text-right">
                                    &#8377;
                                    <?php echo $row['budget'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 font-weight-bold">
                                    <p>Remaining Amount</p>
                                </div>
                                <div class="col-sm-4 text-right font-weight-bold" id="whole">
                                    <span id="currency"></span>&#8377;
                                    <!--Dynamically updated by a script..-->
                                    <span id="amount">
                                        <!-- This will be upadted by a script present at the bottom of the page -->
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 font-weight-bold">
                                    <p>Date</p>
                                </div>
                                <div class="col-sm-5 text-right">
                                    <!--Limiting the user to choose dates from time period of the plan -->
                                    <?php echo $row['start'] . " to " . $row['end'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="d-flex flex-column row-hl">
                        <div class="p-4 item-hl"></div>
                        <div class="p-4 item-hl">
                            <a href="expense_distribution.php?plan=<?php echo $plan_no ?>" class="btn btn-block btn-outline-primary" style="border: 3px solid; border-radius: 8px">
                            Expense Distribution
                            </a>
                        </div>
                        <div class="p-4 item-hl"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section for the expenses and ADD NEW expenses -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="row">
                        <?php
                        // This array will display the each expense in a plan.
                        while ($rows = mysqli_fetch_array($result_query)) {

                            /* Check the value of the amount spent by the person.
                            Following the same logic as of the expense distribution page*/
                            $f = 1;
                            $sum = 0;
                            // Say this plan has 2 people in it, so the loop will run 2 times
                            for ($f; $f <= $row['people']; $f++) {
                                /* As in every expense, only one of the person would have spent,
                                So the loop stops when there is a numeric value present and it
                                continues of there is NULL value */
                                if ($rows['Person' . $f] != NULL) {
                                    $sum += $rows['Person' . $f];
                                    break;
                                }
                            }
                            // Using the array_push method to put all the amount of expense in the total() array.
                            array_push($total, $sum);
                        ?>
                            <div class="col-sm-6 mt-3">
                                <div class="card mb-5">
                                    <div class="card-header text-center" style="background: #c5d5c5">
                                        <div class="row">
                                            <div class="col text-center">
                                                <h4><?php echo $rows['title'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p>Amount</p>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                &#8377;
                                                <!-- Take the amount spent on the expense -->
                                                <?php
                                                $g = 1;
                                                /* As in the epense table, every expense will be paid by only one person
                                                so I have used the for loop and it will stop if a numeric value is found*/
                                                for ($g; $g <= $row['people']; $g++) {
                                                    if ($rows['Person' . $g] != NULL) {
                                                        // As Person1, Person2 and so on have some values, so that will be dispalyed
                                                        echo $rows['Person' . $g];
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p>Paid By</p>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <!-- Logic to find the person who has spent on this expense -->
                                                <?php
                                                    // Displaying the alphabetical quivalent of the person who spent the money
                                                    $x = 1;
                                                    for ($x; $x <= $row['people']; $x++) 
                                                    {
                                                        if ($rows['Person' . $x] != NULL) {
                                                         break;
                                                        }
                                                    }

                                                    if ($x == 1)
                                                        echo "First";

                                                    elseif ($x == 2)
                                                        echo "Second";

                                                    elseif ($x == 3)
                                                        echo "Third";

                                                    elseif ($x == 4)
                                                        echo "Fourth";

                                                    else
                                                        echo "Fiifth";

                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Paid On</p>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <?php echo $rows['spent_on'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                        // Query to find the bill_name from the exp_bill table (if exists)
                                        $query1 = "SELECT bill_name FROM exp_bill WHERE exp_id = '$rows[id]'";
                                        $result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));
                                        $rows1 = mysqli_fetch_array($result_query1);

                                        // If no bill exists for the expense:
                                        if ($rows1['bill_name'] == NULL) {
                                    ?>
                                        <a class="btn m-0 text-primary disabled" style="border:3px solid; border-radius: 8px;">You don't have bill</a>
                                    <?php
                                    } else {
                                        // If a bill exists for the expense:
                                        $url = "bill_img/" . $rows1['bill_name'];
                                    ?>
                                        <a href=<?php echo $url; ?> target="blank" class="btn m-0 text-primary" style="border:3px solid; border-radius: 8px;">View bill</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- Code to find the sum of the expenses (via the array) -->
                <!-- Not used in the top as there I can't access the $total array -->
                <?php
                $tot = 0;
                foreach ($total as $t) {
                    // This is the total expenditure
                    $tot += $t;
                }
                ?>

                <!-- Another div for Expense table -->
                <div class="col-sm-5 my-3" style="height:600px;">
                    <div class="card">
                        <div class="card-header text-center" style="background: #c5d5c5">
                            <div class="text-center">
                                <h4>Add New Expense</h4>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="utilities/view_script.php?plan=<?php echo $plan_no ?>&people=<?php echo $row['people'] ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="text" class="font-weight-bold">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Expense Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="font-weight-bold">Date</label>
                                    <input type="date" name="spent_on" class="form-control" min="<?php echo $row['start'] ?>" max="<?php echo $row['end']; ?>" style="width: 100%" required>
                                </div>
                                <div class="form-group">
                                    <label for="number" class="font-weight-bold">Amount Spent</label>
                                    <input class="form-control" name="amount" placeholder="Amount Spent" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="person">
                                        <option>Choose</option>

                                        <!-- Loop for displaying the apt person in the select option -->
                                        <?php $var = 1;
                                        while ($var <= $row['people']) { ?>
                                            <div class="form-group">
                                                <option>Person<?php echo $var ?></option>
                                            </div>
                                        <?php $var++;
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Upload</label>
                                    <input type="file" class="form-control" name="bill">
                                </div>

                                <input type="submit" value="Submit" class="font-weight-bold btn btn-outline-primary btn-block" style="border:3px solid; border-radius: 8px">
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
    <script>
        // Script to update the reamining amount colors and properties:
        <?php
        // $q is the Remaining Amount
        $q = ($row['budget'] - $tot);
        // In case of overspent, I don't want the negative number, so by using the abs(), negated the negative sign
        $a = abs($q);
        $o = "Overspent by "
        ?>
        <?php
        // If remaining amount is greater than 0.
        if ($q > 0) {
        ?>
            document.getElementById("amount").innerHTML = <?php echo $q ?>;
            document.getElementById("whole").style.color = "#32de84";
        <?php
        } 
        // If remaining amount is less than 0.
        elseif ($q < 0) {
        ?>
            document.getElementById("amount").innerHTML = <?php echo "$a" ?>;
            document.getElementById("currency").innerHTML = <?php echo "'$o '" ?>;
            document.getElementById("whole").style.color = "red";
        <?php
        } else {
        ?>
            document.getElementById("amount").innerHTML = <?php echo $q ?>;
            document.getElementById("whole").style.color = "black";
        <?php
        }
        ?>
    </script>
</body>

</html>