<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | About</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    require 'utilities/common.php';
    include 'utilities/navbar.php';
    ?>

    <div class="container" style="font-size: 18px">
        <div class="row">
            <div class="col-md-6">
                <h2>Who are we?</h2>
                <p class="text-justify">We are a group of young technicats who came up with an idea of solving budget and time issues
                    which we usually face in our daily lifes. We are here to provide a budget controller according
                    to your aspects.
                </p><br>
                <p class="text-justify">Budget Control is the biggest financial issue in the present world. One should look after their
                    budget control to get rid off from their financial crisis
                </p>
            </div>
            <div class="col-md-6">
                <h2>Why Choose us?</h2>
                <p class="text-justify">We provide with a pre-dominant way to control and manage your budget estimations with ease of
                    accessing for multiple users. 
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <p> Email: vishal.vats@acem.edu.in <br>
                    Mobile: +91-9854003124
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        require 'utilities/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        // Get the current year for the copyright (Not playing any part in functioning)
        $('#year').text(new Date().getFullYear());
    </script>
</body>

</html>