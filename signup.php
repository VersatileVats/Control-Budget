<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Budget | SignUp</title>
    <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
        crossorigin="anonymous">
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
                    <div class="card m-2">
                        <div class="card-header text-center">
                            <h4>Sign Up</h4>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="utilities/signup_script.php">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Valid Email" required>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between row-hl">
                                        <label for="password" class="item-hl">Password </label>
                                        <!-- Samll info tag to tell the user what exactly the pwd must follow -->
                                        <i 
                                            id="tool"
                                            class="fa fa-exclamation-circle"
                                            data-toggle = "tooltip"
                                            data-placement = "right"
                                            data-html = "true"
                                            title = "<p>Pwd must contain at least <b> one letter, one number, one special character </b> and must be of minimum 06 characters.</p>"
                                        ></i>
                                    </div> 
                                    <input type="password" name="password" class="form-control" placeholder="Enter password (Min. 6 characters)" required>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between row-hl">
                                        <label for="number">Phone Number</label>
                                        <!-- Samll info tag to tell the user what exactly the phone_number must follow -->
                                        <i 
                                            id="tool"
                                            class="fa fa-exclamation-circle"
                                            data-toggle = "tooltip"
                                            data-placement = "right"
                                            data-html = "true"
                                            title = "<p>Phone Number must have 10 digits and should start with <b> either 7,8,9 </b>. </p>"
                                        ></i>
                                    </div>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Valid Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="question">Security Question</label>
                                    <select name="question" class="form-control">
                                        <option>Choose</option>
                                        <option>What was your first owned car/bike ?</option>
                                        <option>What is your first school's name ?</option>
                                        <option>What is your pet's name ?</option>
                                    </select> 
                                    <input type="password" name="answer" class="form-control mt-2" placeholder="Answer of security question" required>
                                </div>
                                <input type="submit" value="Login" class="btn btn-primary btn-block mb-5">
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
        $('[data-toggle = "tooltip"]').tooltip();
    </script>
</body>

</html>