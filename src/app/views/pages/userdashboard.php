<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/"> -->
  <link href="<?php echo URLROOT . 'css/styles.css' ?>" rel="stylesheet" />
  <link href="<?php echo URLROOT . "node_modules/bootstrap/dist/css/bootstrap.min.css"; ?>" rel="stylesheet" />
  <script src="<?php echo URLROOT . "node_modules/bootstrap/dist/js/bootstrap.min.js" ?>"></script>

  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body style="background-image: url(<?php echo URLROOT . 'assets/img/admin-bg.jpg' ?>)">

  <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="mainNav">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="index.html">BLOG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="home">Home</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="profile">My Profile</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="addpost">Create Post</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="viewblog">My Posts</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="signout">SignOut</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid my-5">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-transparent sidebar collapse">
        <div class="position-sticky pt-3 my-5">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active text-dark" aria-current="page" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#">
                <span data-feather="file"></span>
                 My Posts
              </a>
            </li>
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-5">
          <div class="row">
          <h2>Dashboard</h2>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
            <img class="card-img-top" src="<?php echo URLROOT . 'assets/img/blog.jpg' ?>" alt="Card image cap">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-primary">Delete</a>
            </div>
            </div> 
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <img class="card-img-top" src="<?php echo URLROOT . 'assets/img/blog.jpg' ?>" alt="Card image cap">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-primary">Delete</a>
            </div>
            </div>
          </div>
          </div> -->
      </main>
    </div>
  </div>

  <nav aria-label="Page navigation example">
  </nav>
  </div>
  </main>
  </div>
  </div>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>