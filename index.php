<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Control budget | Index</title>
  <script src="https://kit.fontawesome.com/d5d0f39f2f.js" crossorigin="anonymous"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
    rel="stylesheet"
  />
  <link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"
  />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"
      integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ=="
      crossorigin="anonymous"
    />
  <link rel="stylesheet" href="css/style.css" />
  
</head>

<body style="margin-top: 70px;">
    <?php
    include 'utilities/navbar.php';
    ?>

    <!-- Showcase Carousel -->
    <section id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- indicators -->
      <ol class="carousel-indicators">
        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item carousel-img-2 active">
          <div class="light-overlay"></div>
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right m-5">
              <h1 class="display-3">
                <span style="color: orange">Greetings, </span>Dear User
              </h1>
              <p class="lead mt-4">
                We welcome you to the one of the most refined
                and advance platforms for managing your financial
                liabilities online!!
              </p>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-img-1">
          <div class="light-overlay"></div>
          <div class="container">
            <div class="carousel-caption d-none d-sm-block mb-5">
              <h1 class="display-3">
                <span style="color: orange">Proudly</span>
                Made
                <span style="color: green"> By Myself</span>
              </h1>
              <p class="lead"></p>
              <a href="signup.php" class="btn btn-lg" style="background: #05386B; color: #5CDB95"
                >Sign Up Now</a
              >
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-img-3">
          <div class="light-overlay"></div>
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
              <h1 class="display-3">
                <i class="fas fa-cloud-rain"></i>
                Raining Deals
              </h1>
              <p class="lead mt-4">
                As our company is committed towards best customer
                Satisfcation, we guarantee you with one of the best online experience you may ever
                come across. Upto 55% off on every premium purchase
              </p>
              <a href="about.php" class="btn btn-success btn-lg"
                >Learn More</a
              >
            </div>
          </div>
        </div>
      </div>

      <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#myCarousel" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </section>

  <!-- Boxes -->
  <section class="p-4 m-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3 text-center mb-2">
          <div class="card" style="border-radius: 10%;">
              <div class="card-header">
                <i class="fas fa-users fa-3x" style="color: #05386B;"></i>
              </div>
              <div class="card-body">
                <div class="card-title">
                  <h3>Be Better</h3>
                </div>
                <p>
                Move ahead from rest of the crowd by joining us and be
                a part of the change
                </p>
              </div>
            </div>
        </div>
        <div class="col-md-3 text-center mb-2">
          <div class="card" style="border-radius: 10%;">
              <div class="card-header">
                <i class="fa fa-user-circle-o fa-3x" style="color: #05386B;"></i>
              </div>
              <div class="card-body">
                <div class="card-title">
                  <h3>Be Smarter</h3>
                </div>
                <p>
                Be the one to use one of the advance website to set
                yourself apart from others
                </p>
              </div>
            </div>
        </div>
        <div class="col-md-3 text-center mb-2">
          <div class="card" style="border-radius: 10%;">
              <div class="card-header">
                <i class="fas fa-fast-forward fa-3x" style="color: #05386B;"></i>
              </div>
              <div class="card-body">
                <div class="card-title">
                  <h3>Be Faster</h3>
                </div>
                <p>
                Easily manage your liabilities & assets so that
                within a click you explore them easiy
                </p>
              </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="card" style="border-radius: 10%;">
              <div class="card-header">
                <i class="fas fa-book-open fa-3x" style="color: #05386B;"></i>
              </div>
              <div class="card-body">
                <div class="card-title">
                  <h3>Be Stronger</h3>
                </div>
                <p>
                Don't waste hours in managing your financial
                profile. Use this website
                </p>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Showcase-->
  <section id="showcase1" class="d-none d-md-block mb-3">
    <div class="primary-overlay text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center">
            <h1 class="display-2 mt-5 pt-5">We help you control your budget..</h1>
            <p class="h4">
              Do What You Dream Of...
            </p>
            <a href="login.php" class="btn btn-outline-secondary btn-lg text-white">
              <i class="fas fa-arrow-right"></i> Start Today
            </a>
          </div>
          <div class="col-lg-6">
            <img src="img/budget.jpg" alt="image" class="img-fluid d-none d-lg-block mt-5 rounded-circle" />
          </div>
        </div>
      </div>
    </div>
  </section>  

  <!-- About -->
  <section id="about" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="info-header mb-5">
            <h1 class="text-primary pb-3">Why This Website?</h1>
            <p class="lead pb-3">
              We provide with a pre-dominant way to control and
              manage your budget estimations.
            </p>
          </div>

          <!-- Accordian -->
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Get Inspired
                  </div>
                </h5>
              </div>

              <div id="collapse1" class="collapse show">
                <div class="card-body">
                  As a company we provide the best UI and backend support to meet your needs.
                  So you can blindfoldly trust us and the rest will be taken care by us.
                  We provide with a pre-dominant way to control and manage your budget estimations 
                  with ease of accessing for multiple users.
                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse3" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Lead In This Era
                  </div>
                </h5>
              </div>

              <div id="collapse3" class="collapse">
                <div class="card-body">
                  Use our website to keep track of all of your expenditures
                  to monitor your financial stability. We will help you to
                  manage your expense account.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Home heading -->
  <section id="home-heading" class="">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container pt-4 text-center" >
            <h1 style="color: #5CDB95;" class="text-center">Are You Ready To Get Started ?</h1>
            <p class="d-none d-md-block text-justify">
              I am sure you will be thrilled to use this website which is my first official 
              project. Here is the link to the directory structure of the 
              <a 
                href="https://docs.google.com/drawings/d/1IhPdMpr7iDjV1j34NlEHbQq3t0mIkKILQeWS9uHUDNo/edit?usp=sharing" 
                target="blank" style="color: #5CDB95"> project.
              </a>
              For the front-end I have used HTML 5, CSS 3 alongwith Bootstrap to make the website
              more responsive and thus easy to implement the styling aspects. I have made a flow-chart
              for the project. You can find the flowchart 
              <a
                href="https://docs.google.com/drawings/d/1CYrARjkrT6XDcFP5yFYhuPL_tn8dVtM-sFRZ12vyBp4/edit?usp=sharing"
                target="blank" style="color: #5CDB95"> here.
              </a>
              For the front-end I have used PHP (for majority of the functioning) along with JavaScript and JQuery.
              For the Databse support I have used MySQL as it provides smooth connectivity for PHP..
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Photo Gallery -->
  <section id="gallery" class="py-5">
      <div class="container">
        <h1 class="text-center">
          Photo Gallery
          <span style="color: #007bff">
            <i class="fas fa-images"></i>
          </span>
        </h1>
        <p class="text-center">
          Check out our Corporate Associates which are supporting us in our campaign. Do check some projects
        </p>
        <div class="row mb-4">
          <div class="col-md-4 mb-2">
            <a
              href="./img/4.jpg"
              data-toggle="lightbox"
              data-gallery="img-gallery"
              data-gallery="560"
              data-width="560"
              data-title="Always be yourself and have faith in yourself"
              ><img src="./img/4.jpg" class="img-fluid"
            /></a>
          </div>

          <div class="col-md-4 mb-2">
            <a
              href="./img/creativity.jpg"
              data-toggle="lightbox"
              data-gallery="img-gallery"
              data-gallery="560"
              data-width="560"
              data-title="Hardships often prepare ordinary people for an extraordinary life"
              ><img src="./img/creativity.jpg" class="img-fluid"
            /></a>
          </div>

          <div class="col-md-4 mb-2">
            <a 
              href="./img/project.jpg" 
              data-toggle="lightbox" 
              data-gallery="img-gallery" 
              data-gallery="560" 
              data-width="560"
              data-title="Intelligence plus character - that is the true goal of education"
              ><img
              src="./img/project.jpg" class="img-fluid" 
            /></a>
          </div>
        </div>
      </div>
    </section>

  <!-- videoModal-->
  <section id="video-play">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container p-5" style="color: #5CDB95;">
            <a href="#" class="video" data-video="https://www.youtube.com/embed/6Ib-bdko5cE" data-toggle="modal"
              data-target="#videoModal"><i class="fas fa-play fa-3x" style="color: #5CDB95;"></i></a>
            <h1>Budgeting Is Must</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Video Modal -->
  <div class="modal fade" id="videoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
          <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-1 text-white" style="background-color: rgba(0,0,0,0.7)">
    <div class="container">
      <div class="row text-center">
        <div class="m-auto">
          <p class="lead">Copyright &copy; <span id="year"></span>
            ControlBudget. All Rights Reserved | Contact us:+91-8448444853</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
      integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
      crossorigin="anonymous"
    ></script>
  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    $(".carousel").carousel({
      interval: 3500,
      pause: "hover",
    });

    // Lightbox
    $(document).on("click", '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });

    // Video Play
    $(function () {
      // Auto play modal video
      $(".video").click(function () {
        var theModal = $(this).data("target"),
          videoSRC = $(this).attr("data-video"),
          videoSRCauto =
            videoSRC +
            "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        $(theModal + " iframe").attr("src", videoSRCauto);
        $(theModal + " button.close").click(function () {
          $(theModal + " iframe").attr("src", videoSRC);
        });
      });
    });
  
  </script>
</body>

</html>