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
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about">About</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="profile">My Profile</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="viewblog">All Blogs</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="signout">SignOut</a></li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid my-5">
    <div class="row">
      </nav> 
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-5">
          <h2>Dashboard</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm text-center">
              <thead>
                <tr>
                  <th scope="col">User Id</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $html="";
                foreach ($data['users'] as $value) {
                    $html .= "<tr>
                  <td>".$value->user_id."</td>
                  <td>".$value->username."</td>
                  <td>".$value->fullname."</td>
                  <td>".$value->email."</td>
                  <td><a class='btn btn-primary' type='submit' href='changeStatus?id=".$value->user_id."'>".$value->status."</a> </td>
                  <td><a class='btn btn-danger' href='deleteUser?id=".$value->user_id."'>Delete</a> </td>
                  </tr>";
                }
                 
                echo $html;
                ?>
              </tbody>
            </table>
          </div>
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