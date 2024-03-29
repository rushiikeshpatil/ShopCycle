<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ShopCycle</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
        </script>

    <script>
        $(function () {
            $("#header").load("header.html", function () {
                myFunction("My Info");
            });
            $("#footer").load("footer.html");

        });
    </script>
    <?php
include'partials/db_connect.php';
$result = mysqli_query($conn,"SELECT * FROM user order by u_id DESC LIMIT 1");
    ?>
</head>


<body>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar & Hero Start -->
        <div id="header"></div>
        <!-- Navbar & Hero End -->


        <!-- Info Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Info</h5>
                    <h1 class="mb-5">All Yours!!!</h1>
                </div>
                <?php while ($row = mysqli_fetch_array($result)){?>
                <div class="row g-4 justify-content-md-center">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="d-flex p-4 ">
                                <h5 class="col mb-1"> My Name - <?php echo"".$row['u_name']?></h5> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-md-center">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="d-flex p-4 ">
                                <h5 class="col mb-1"> My Email - <?php echo"".$row['u_email']?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-md-center">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="d-flex p-4 ">
                                <h5 class="col mb-1"> My Phone Number - <?php echo"".$row['u_phone']?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-md-center">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="d-flex p-4 ">
                                <h5 class="col mb-1"> My Address - <?php echo"".$row['u_address']?> </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>

        <!-- Footer Start -->
        <div id="footer"></div>
        <!-- Footer End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>