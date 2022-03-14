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
        <link href="<?php echo URLROOT.'css/styles.css'?>" rel="stylesheet"/>
        <link href="<?php echo URLROOT."node_modules/bootstrap/dist/css/bootstrap.min.css";?>" rel="stylesheet" />
        <script src="<?php echo URLROOT."node_modules/bootstrap/dist/js/bootstrap.min.js"?>"></script> 
    </head>
    <body style="background-image: url('<?php echo URLROOT.'assets/img/post-bg.jpg';?>')">
    .<div class="container-fluid">
        <div class="row">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto py-4 py-lg-0">
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="home">Home</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about">About</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">My Blogs</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact">Contact</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">SignOut</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
         
        <!-- Page Header-->

        <div class="row">
            <!-- Post Content-->
        <div class="col col-md-12 my-5 d-flex justify-content-center align-items-center">
               
            <form method="POST" action="" class="col-md-12">
                <h1 class="h3 mb-3 mx-5 my-3 fw-normal text-white">Create Post</h1>
                    
            <!-- Successful signup message here --> 
                <span class="text-warning"><?php //echo $data['msg']??$data['msg']->msg?> </span>
                <div class="form-floating col-md-11 my-2 mx-5 bd-secondary">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Title">
                    <label for="floatingInput">Blog Title</label>
                </div>
                <div class="form-group floatingInput col-md-11 my-2 mx-5 ">
                    <textarea class="form-control rounded-0 bg-secondary text-white" id="exampleFormControlTextarea1" rows="10" placeholder="Content"></textarea>
                </div>
                <input name="action" value="POST" class="btn btn-lg btn-primary  mx-5" type="submit">
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
               
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
        </div>
        
    </div>
       
    </body>
</html>
