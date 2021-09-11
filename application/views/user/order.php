<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed&family=Oswald:wght@300&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="<?= base_url('assets/'); ?>css/stylee.css" rel="stylesheet">
  <title>Oder Antrian</title>
</head>

<body>
  <nav class="navbar navbar-light  " style="background-color:#e2edff ;">
    <div class="container-fluid">
      <a class="judul  navbar-brand" href="#">
        <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        E-Antrian
      </a>
    </div>
  </nav>

  <section class="jumbotron text-center ">
    <h1 class="">Hello , Selamat Datang</h1>
    <p class="roboto lead ">silahkan ambil nomor antrian anda </p>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,128L48,149.3C96,171,192,213,288,202.7C384,192,480,128,576,122.7C672,117,768,171,864,202.7C960,235,1056,245,1152,234.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>

  <section id=pesan>
    <div class="container">
      <div class="row-md mb-4">
        <div class="col-md text-center">
          <h2>
            Antrian
          </h2>
        </div>
      </div>

      <div class="row text-center rounded-3 ms-1 me-1 mb-5 align-items-center p-1 shadow  bg-body " style="height: 150px;">

        <div class="col-4  mt-4">
          <h4 style="color:#DA9022;">003</h4>
          <h6 style="color:#C4C4C4;">Berjalan</h6>
        </div>
        <div class="col-4  mb-4">
          <h1 style="color:#378D36;">101</h1>
          <h5 style="color:#C4C4C4;">Pesan</h5>
        </div>
        <div class="col-4 mt-4">
          <h4 style="color:#F40707;">004</h4>
          <h6 style="color:#C4C4C4;">Selanjutnya </h6>

        </div>
      </div>
    </div>
    <br>
    <div class="text-center ">
      <a class="tombol btn btn-primary btn-lg rounded-pill   ">Pesan Antrian</a>
    </div>

  </section>

  <footer class="text-center">
    <p class="created mt-3">Created by <a class="created fw-bold" style="text-decoration: none; color:black" href="https://www.instagram.com/nur_sabry/">Sabri Abdilah</a></p>
  </footer>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>

</html>