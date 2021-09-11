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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="<?= base_url('assets/'); ?>css/stylee.css" rel="stylesheet">


  <!-- zzzzzz -->




  <title>E-Antrian| Capil</title>
</head>

<body class="body1">
  <header>
    <div class="container1">
      <div class="row align-items-center mt-3 mb-3">
        <div class="col-1 me-3 ">
          <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="100" class="d-inline-block align-text-top">
        </div>
        <div class="col-8">
          <div class="row">
            <div class="col-12">
              <h4 class="mt-3 " style="color:#FFF732 ;">DINAS KEPENDUDUKAN DAN CATATAN SIPIL KOTA BAUBAU</h4>
            </div>
            <div class="col-12">
              <p class="alamat">Wale, Murhum, Kota Bau-Bau, Sulawesi Tenggara 93717</p>
            </div>
            <div class="col-1">
              <div class="row">
                <div class="col-1">
                  <i class="bi bi-telephone-fill text-info"></i>
                </div>
                <div class="col-6">
                  <p>0402</p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-1">
                  <i class="bi bi-envelope-fill text-info"></i>
                </div>
                <div class="col-6">
                  <p>discapil@baubaukota.go.id</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2 p-2 text-center shadow3">
          <h2 style="color:#FFF732 ;" id="time">
          </h2>
          <h5 id="date"> </h5>

        </div>
      </div>
      <hr class="one">
    </div>

  </header>


  <section class="mt-3  text-center ">

    <div class="container1">

      <div class="row  align-items-center">
        <div class="col-8 ">
          <div class="row justify-content-lg-start ">
            <div class="col-md-4 col-lg-5 me-5">
              <div class="shadow">
                <div class="py-3 shadow2 ">
                  <h3 style="color:#FFF732 ;">Loket 1</h3>
                </div>
                <div class="p-4">
                  <h1 style="font-size: 70px;">001</h1>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-5">
              <div class="shadow">
                <div class="py-3 shadow2 ">
                  <h3 style="color:#FFF732 ;">Loket 2</h3>
                </div>
                <div class="p-4">
                  <h1 style="font-size: 70px;">002</h1>
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-lg-start mt-5">
            <div class="col-md-4 col-lg-5 me-5">
              <div class="shadow">
                <div class="py-3 shadow2 ">
                  <h3 style="color:#FFF732 ;">Loket 3</h3>
                </div>
                <div class="p-4">
                  <h1 style="font-size: 70px;">003</h1>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-5">
              <div class="shadow">
                <div class="py-3 shadow2 ">
                  <h3 style="color:#FFF732 ;">Loket 4</h3>
                </div>
                <div class="p-4">
                  <h1 style="font-size: 70px;">-</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 text-center ">
          <img src="<?= base_url('assets/'); ?>img/qrcode01.png" class="img-fluid animated" alt="">
          <h5 data-aos="fade-up" class="ml-3 img-fluid animated mt-2 " style="color:#FFF732 ;">Scan Untuk Mendapatkan Antrian</h5>
        </div>
      </div>
    </div>

  </section>

  <!-- <section class="jumbotron">

  
  </section> -->








  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();

      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }

      if (curr_hour == 0) {
        curr_hour = 12;
      }
      if (curr_hour == 12) {
        curr_hour = curr_hour - 12;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);

      document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>

  <script>
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var hari = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
    var date = new Date();
    var day = date.getDay();
    var tanggal = date.getDate();
    var month = date.getMonth();
    var year = <?php echo date('Y') ?>

    document.getElementById("date").innerHTML = " " + hari[day] + "  " + tanggal + " " + months[month] + " " + year;
  </script>

</body>

</html>