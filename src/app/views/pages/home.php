<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo URLROOT . 'css/styles.css' ?>" rel="stylesheet" />
    <link href="<?php echo URLROOT . "node_modules/bootstrap/dist/css/bootstrap.min.css"; ?>" rel="stylesheet" />
    <script src="<?php echo URLROOT . "node_modules/bootstrap/dist/js/bootstrap.min.js" ?>"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html"><?php $_SESSION['user']['fullname']??''?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="home">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo !isset($_SESSION['user']) ? 'login' : 'signout' ?>"><?php echo !isset($_SESSION['user']) ? 'SignIn' : 'SignOut' ?></a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo !isset($_SESSION['user']) ? 'signup' : '' ?>"><?php echo !isset($_SESSION['user']) ? 'SignUp' : '' ?></a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo isset($_SESSION['user']) ? 'profile' : '' ?>"><?php echo isset($_SESSION['user']) ? 'MY Profile' : '' ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url(<?php echo URLROOT . 'assets/img/home-bg.jpg' ?>)">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1 class="text-white">Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <?php
                $html = "";
                $t=time();
                $today = date("d-M-y", $t);
                foreach ($data['blogs'] as $value) {
                    $date = json_encode($value->date);
                    $date = json_decode($date);

                    $d=explode(' ', $date->date);
                    $newDate = date("d-M-Y", strtotime($d[0]));

                    if ($newDate==$today) {
                        $time = "Today";
                    } else {
                        $time = $newDate;
                    }
                    $html .='<div class="card p-3 my-3 shadow bg-white rounded">
                    <a href="fullpost?id='.$value->blog_id.'"><img class="card-img-top" src='. URLROOT . "assets/img/".$value->blogimage."".' alt="Card image cap"></a>
                    <div class="card-block">
                        <h4 class="card-title fw-bold mt-2">'. $value->blogtitle .'</h4>
                        <p class="card-text small text-justify">'.$value->content.'</p>
                        <p class="fw-bold text-secondary small" >Posted by :<span class="font-italic text-dark">'.$value->username.'</span></p>
                        <span class="font-italic text-dark small">Posted on: '.$time.'</span>
                        <hr class="my-2" />
                        <a href="#" class="btn"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a><span class="font-italic small">102 likes</span>
                        <a href="#" class="btn"><i class="fa fa-comment" aria-hidden="true"></i></a><span class="font-italic small">20 comments</span>
                    </div>
                </div>';
                }
                echo $html;
                ?>     
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2021</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>