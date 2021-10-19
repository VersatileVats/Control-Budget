<?php
    require 'utilities/common.php';
    if (!isset($_SESSION['email'])) 
    {   header("location: index.php");  }
    
    // Extracting the plan_no which was passed via url by view.php page
    $plan_no = $_GET['plan'];

    // Query to fetch the plan from the plans table:
    $search_query = "SELECT * FROM plans WHERE id = '$plan_no'";
    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result_search_query);

    // Query to fetch the expenses related to the plans:
    $query = "SELECT * FROM expense WHERE p_id =  $plan_no";
    $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));

    /*/ Query to fetch the expenses related to the plans:
    I have again executed the same query because I will use the same query over two places 
    and I can't use $row over the two places. SO I have executed the same query so that I can
    use them via $row and $row1 respectively*/
    $result_query1 = mysqli_query($connect, $query) or die(mysqli_error($connect));

    // Array to store the amount spent by the person:
    $total = array();

    // This array will store the each expense in a plan.
    // Dynamically adds the amount spent in each expense:
    while ($rows = mysqli_fetch_array($result_query)) 
    {

        // Check the value of the amount spent by the person
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
    }

    /* As after this loop there will be an array having the each expenses, so I have used the 
    foreach loop to sum the values together. */
    $tot = 0;
    foreach ($total as $t) 
    {
        // This is the total expenditure   
        $tot += $t;
    }

    /*As per the functioning of the project, in the expense distribution page, each person
    will be stated by First, Second, Third and so on. So by this person I can find the alphabetical
    equivalent of the person in numbers.Say if Person1 spent 20 Rs, then in the UI it will be First: 20.
    This function will do that conversion*/
    
    /*For the sale of simplicity I have done the conversion of 5 peoples.*/
    function findPerson($a)
    {
        if ($a == 1)
            return "First";

        elseif ($a == 2)
            return "Second";

        elseif ($a == 3)
            return "Third";

        elseif ($a == 4)
            return "Fourth";

        else
            return "Fifth";
    }

    // Function to sum the array elements:
    function arraySum($arr)
    {
        $arrSum = 0;
        foreach ($arr as $a) {
            $arrSum += $a;
        }
        return $arrSum;
    }

    /*This function is used at the line 188, where I have to print statements according
    to the different conditions */
    function text($n)
    {
        if ($n > 0) {
            echo "<p> <font color=#32de84>Gets back &#8377; $n</font> </p>";
        } elseif ($n < 0) {
            $n = abs($n);
            echo "<p> <font color=red>Owes &#8377; $n</font> </p>";
        } else {
            echo "<p> <font color=black>All Settled Up..</font> </p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | Expense Distribution</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    include 'utilities/navbar.php';
    ?>

    <?php
    // Arrays to store the individual amount sum:
    $First = array();
    $Second = array();
    $Third = array();
    $Fourth = array();
    $Fifth = array();

    /* Appraoch to insert amount values to the correct person in case
    the person has more than one expenses*/
    while ($rows1 = mysqli_fetch_array($result_query1)) {
        $d = 1;
        while ($d <= $row['people']) {
            if ($rows1['Person' . $d] != NULL) {
                if ($d == 1) {
                    array_push($First, $rows1['Person' . $d]);
                } elseif ($d == 2) {
                    array_push($Second, $rows1['Person' . $d]);
                } elseif ($d == 3) {
                    array_push($Third, $rows1['Person' . $d]);
                } elseif ($d == 4) {
                    array_push($Fourth, $rows1['Person' . $d]);
                }
            }
            $d++;
        }
    }
    ?>

    <!-- Expense Distribution -->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mb-5">
                    <div class="card mb-5">
                        <div class="card-header text-center" style="background: #c5d5c5">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4><?php echo $row['title'] ?></h4>
                                </div>
                                <div class="col-sm-3 text-right" style="font-size: 20px">
                                    <i class="fas fa-user"></i> <?php echo $row['people'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-sm-9">
                                    <p>Initial Budget</p>
                                </div>
                                <div class="col-sm-3 pl-5 font-weight-bold text-right">
                                    &#8377; <?php echo $row['budget'] ?>
                                </div>
                            </div>
                            <?php
                            $c = 1;
                            while ($c <= $row['people']) {
                            ?>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <p><?php echo findPerson($c) ?></p>
                                    </div>
                                    <div class="col-sm-3 pl-5 text-right"> &#8377;
                                        <!--Logic to print the amount spent by the person:  -->
                                        <?php
                                        if ($c == 1) {
                                            echo arraySum($First);
                                        } elseif ($c == 2) {
                                            echo arraySum($Second);
                                        } elseif ($c == 3) {
                                            echo arraySum($Third);
                                        } elseif ($c == 4) {
                                            echo arraySum($Fourth);
                                        } else {
                                            echo arraySum($Fiifth);
                                        }

                                        ?>
                                    </div>
                                </div>
                            <?php
                                $c++;
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p>Total Amount Spent</p>
                                </div>
                                <div class="col-sm-3 pl-5 font-weight-bold text-right">
                                    &#8377; <?php echo $tot ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Remaining Amount</p>
                                </div>
                                <div class="col-sm-6 pl-5 text-right font-weight-bold">
                                    <?php
                                    $r = ($row['budget'] - $tot);
                                    $a = abs($r);
                                    if ($r < 0) {
                                        echo "<p> <font color=red>Overspent by &#8377; $a</font> </p>";
                                    } elseif ($r > 0) {
                                        echo "<p> <font color=#32de84>&#8377; $r</font> </p>";
                                    } else {
                                        echo "<p> <font color=black>&#8377; $r</font> </p>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p>Individual Shares</p>
                                </div>
                                <div class="col-sm-3 pl-5 text-right">
                                    &#8377; <?php echo round($tot / $row['people']) ?>
                                    <!-- Used the round function to avoid fractions -->
                                </div>
                            </div>
                            <?php
                            $c = 1;
                            while ($c <= $row['people']) {
                            ?>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <p><?php echo findPerson($c) ?></p>
                                    </div>
                                    <div class="col-sm-5 pl-5 text-right font-weight-bold" id="color">
                                        <?php

                                        // Used round() as to neglect the negative numbers
                                        $a = round($tot / $row['people']);

                                        if ($c == 1) {
                                            $b = arraySum($First);
                                        } elseif ($c == 2) {
                                            $b = arraySum($Second);
                                        } elseif ($c == 3) {
                                            $b = arraySum($Third);
                                        } elseif ($c == 4) {
                                            $b = arraySum($Fourth);
                                        } else {
                                            $b = arraySum($Fiifth);
                                        }

                                        $m = ($b - $a);

                                        echo text($m);
                                        ?>
                                    </div>
                                </div>
                            <?php
                                $c++;
                            }
                            ?>
                        </div>
                        <a href="view.php?plan=<?php echo $plan_no ?>" class="btn btn-outline-primary" style="border: 3px solid; border-radius: 8px">
                            <i class="fas fa-arrow-circle-left"></i> Go Back
                        </a>
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