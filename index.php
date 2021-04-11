<?php include('includes/db.php'); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mutare Polytechnic </title>
    <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="probootstrap-search" id="probootstrap-search">
        <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
        <form action="#">
            <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
        </form>
    </div>

    <div class="probootstrap-page-wrapper">

        <style>
            .topNav {
                text-align: center;
                background-color: green;
                width: auto;
                height: 80px;
                margin: auto;
                padding: 0px;
            }
            
            img {
                margin-top: 5px;
                float: left;
            }
        </style>

        <div class="topNav">

            <img src="img/logo.png" width="150" height="60">
            <h2 style="margin-top: 0px; color:white;">Mutare Polytechnic</h2>
            <p style="margin-top: 0px; color:white;">Ministry of Higher and Tertiary Education Science and Technology</p>
        </div>




        <section class="probootstrap-section probootstrap-section-colored">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left section-heading probootstrap-animate">
                        <h1 class="mb0">ICT Internal Requisition and Procurement System</h1>
                    </div>
                </div>
            </div>
        </section>



        <section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row probootstrap-gutter0">
                            <div class="col-md-4" id="probootstrap-sidebar">
                                <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                                    <h3>Stakeholders</h3>
                                    <ul class="probootstrap-side-menu">
                                        <li><a href="index.php?change=<?php echo "itDpt" ?>">IT department</a></li>
                                        <li><a href="index.php?change=<?php echo "itMng" ?>">IT Manager</a></li>
                                        <li><a href="index.php?change=<?php echo "proOff" ?>">Procurement Officer</a></li>
                                        <li><a href="index.php?change=<?php echo "sup" ?>">Supplier</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mr-5 col-md-8" id="probootstrap-sidebar">
                                <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                                    <h3>Login As
<?php
if(isset($_GET['change'])){
    $change = $_GET['change'];

    if($change === 'itDpt'){
        echo "<b class='text-info'>ICT Department</b>";
    }elseif($change === 'itMng'){
        echo "<b class='text-success'>ICT Manager</b>";
    }
    elseif($change === 'proOff'){
        echo "<b class='text-dark'>Procurement Officer</b>";
    }
    elseif($change === 'sup'){
        echo "<b class='text-warning'>Supplier</b>";
    }
}
?>
                                    </h3>

                                    <?php
                                    
                                    if(empty($change)){

                                    }else{
                                        include('form.php');
                                    }
                                    
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- END wrapper -->


    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>