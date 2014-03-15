<?php 
  // GET CLIENT IP 
  function getRealIpAddr()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  // DETERMINE LOCAL / NOT?
  $imgsrc = ":)";
  function isLocal($a) {
     if ($a=="127.0.0.1") {
        $return = "localhost";
     } elseif (substr($a, 0, 10) === '192.168.2.') {
        $return = "192.168.2.10";
     } else {
        $return = "mini.sejak.tk";
     }
     return $return;
  }
  $lokal = isLocal(getRealIpAddr());
  
  // placeholder
  if ($lokal=="mini.sejak.tk") {
    $imgsrc = "http://placehold.it/320x240&text=Coming+Soon+:)";
  } else {
    $imgsrc = "img/comingsoon.gif";
  }
  
  // cek online
  $wc1 = @fsockopen("192.168.2.9", "8080");
  if (is_resource($wc1)) {
     $nyala_wc1 = true;
     $thumbnail_1 = "http://192.168.2.9:8080/?action=snapshot";
     fclose($wc1);
  } else {
     $nyala_wc1 = false;
     $thumbnail_1 = "img/offline.gif";
  }

  // MINIFY HTML
  function sanitize_output($buffer)
  {
      $search = array(
          '/ {2,}/',
          '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
      );
      $replace = array(
          ' ',
          ''
      );
    $buffer = preg_replace($search, $replace, $buffer);
      return $buffer;
  }
  ob_start("sanitize_output");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A mini CCTV viewer">
    <meta name="author" content="Ghozy Arif Fajri">
    <title>cctv@gojimini</title>
    
    <?php 
      if ($lokal=="mini.sejak.tk") {
        ?>
          <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css">
          <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <?php
      } else {
        ?>
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/font-awesome.min.css" rel="stylesheet">
        <?php
      }
      
    ?>
    <link href="css/simple-sidebar.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href=".">cctv@gojimini</a></li>
                <li><a href=".?list">Lihat CCTV</a></li>
            </ul>
            <ul class="sidebar-nav-bawah">
                <li><a href="http://keren.sejak.tk" target="_blank"><i class="fa fa-heart"></i>&nbsp; @gojibuntu</a></li>
                <li><a href="http://mini.sejak.tk" target="_blank"><i class="fa fa-heart"></i>&nbsp; @gojimini</a></li>
                <!-- <li><a href="http://twitter.com/gojigeje" target="_blank"><i class="fa fa-twitter-square"></i>&nbsp; @gojigeje</a></li>
                <li><a href="http://facebook.com/gojigeje" target="_blank"><i class="fa fa-facebook-square"></i>&nbsp; /gojigeje</a></li>
                <li><a href="http://gplus.to/gojigeje" target="_blank"><i class="fa fa-google-plus-square"></i>&nbsp; +GhozyArifFajri</a></li> -->
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default"><i class="fa fa-bars"></i></a>
                    cctv@gojimini
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">

                    <?php 
                      if (isset($_GET['list'])) {
                        ?>

                        <div class="col-md-12">
                            <p class="lead">Daftar CCTV yang tersedia</p>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <a href=".?cctv=1"><img src="<?=$thumbnail_1?>" alt=""></a>
                                <div class="caption">
                                    <h4>
                                      <a href=".?cctv=1">CCTV 1</a> 
                                      <?php 
                                        if ($nyala_wc1) {
                                          ?>
                                          <span class="label label-success pull-right">Online</span>
                                          <?php
                                        } else {
                                          ?>
                                          <span class="label label-danger pull-right">Offline</span>
                                          <?php
                                        }
                                        
                                      ?>
                                    </h4>
                                    <p>
                                        Lokasi: Depan Kosan
                                    </p>
                                </div>
                                <div class="ratings">
                                    <div class="btn-group btn-group-justified">
                                      <?php 
                                        if ($nyala_wc1) {
                                          ?>
                                            <a href=".?cctv=1" class="btn btn-primary"><i class="fa fa-video-camera"></i>&nbsp; Lihat CCTV</a>
                                          <?php
                                        } else {
                                          ?>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-video-camera"></i>&nbsp; CCTV Offline</a>
                                          <?php
                                        }
                                        
                                      ?>
                                      <a href=".?arsip=1" class="btn btn-default"><i class="fa fa-archive"></i>&nbsp; Arsip</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="<?=$imgsrc?>" alt="">
                                <div class="caption">
                                    <h4><a href="#">CCTV 2</a>
                                    </h4>
                                    <p>
                                        Lokasi: -
                                    </p>
                                </div>
                                <div class="ratings">
                                    <!-- <div class="btn-group btn-group-justified">
                                      <a href="#" class="btn btn-primary"><i class="fa fa-video-camera"></i>&nbsp; Lihat CCTV</a>
                                      <a href="#" class="btn btn-default"><i class="fa fa-archive"></i>&nbsp; Arsip</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="<?=$imgsrc?>" alt="">
                                <div class="caption">
                                    <h4><a href="#">CCTV 3</a>
                                    </h4>
                                    <p>
                                        Lokasi: -
                                    </p>
                                </div>
                                <div class="ratings">
                                    <!-- <div class="btn-group btn-group-justified">
                                      <a href="#" class="btn btn-primary"><i class="fa fa-video-camera"></i>&nbsp; Lihat CCTV</a>
                                      <a href="#" class="btn btn-default"><i class="fa fa-archive"></i>&nbsp; Arsip</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <?php
                      }
                      elseif (isset($_GET['cctv'])) {
                        if (file_exists("cctv/".$_GET['cctv'].".php")) {
                          include "cctv/".$_GET['cctv'].".php";
                        } else {
                          ?>
                          <div class="col-md-12">
                            <div class="alert alert-warning">
                              <h4>Kesalahan!</h4>
                              <p>Index CCTV tidak ditemukan! <br>Pastikan Anda memasukkan alamat yang benar, atau jika Anda merasa halaman ini seharusnya ada, beritahukan admin agar segera diperbaiki :)</p>
                            </div>
                          </div>
                          <?php
                        }
                        
                      } else {
                        ?>
                      
                          <div class="col-md-12">
                              <p class="lead">Solusi CCTV sederhana dan murah untuk rumah Anda. Dibangun menggunakan sebuah router + OpenWRT + webcam + flashdisk sebagai media penyimpanan.</p>
                          </div>
                          <div class="col-md-12">
                            <a href=".?list" class="btn btn-primary btn-lg btn-block"><i class="fa fa-video-camera"></i>&nbsp; Lihat CCTV</a> <br><br>
                          </div>

                          <div class="col-md-12">                          
                          <p>
                            Dengan sedikit ngoprek, kita bisa membuat sendiri CCTV pribadi sederhana seperti ini dengan biaya yang jauh lebih murah ketimbang CCTV profesional pada umumnya. Walaupun biayanya lebih murah, tetapi kemampuannya tidak kalah dengan CCTV profesional, baca selengkapnya :
                          </p>

                          <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Merekam gambar (statis)
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Menampilkan gambar statis .JPG yang diambil dari cctv.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Membuat video dari rekaman gambar
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Dibuat dengan mengkombinasikan beberapa gambar yang diambil dari cctv menjadi sebuah file video.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Streaming secara real-time
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Bisa diakses lewat PC, Laptop atau smartphone dengan tampilan web atau dengan aplikasi streaming.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    Menyimpan / mengarsipkan hasil rekaman
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Membuat arsip gambar harian dan bulanan, disimpan di media penyimpanan lokal (flashdisk).
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    Penjadwalan pengambilan gambar
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Mengatur jadwal pengambilan gambar di waktu-waktu tertentu, menggunakan cronjob.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                    Akses secara wireless
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                  CCTV bisa diakses secara wireless dengan dipasang pada router wireless.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                    Akses publik dari internet
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                  Apabila mempunyai IP Public, CCTV bisa diakses dari internet, tinggal mengubah konfigurasi jaringan saja.
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <p class="text-muted well">Made with <i class="fa fa-heart"></i> by <a href="http://twitter.com/gojigeje" target="_blank">@gojigeje</a> | source code available on <a href="http://github.com/gojigeje/cctv-mini" target="_blank">github</a>.<br> &copy; 2014 <a href="http://mini.sejak.tk" target="_blank">@gojimini</a> , a lovely mini server :)</p>
                        </div>
                        <?php
                      }
                      
                    ?>

                </div>
            </div>
        </div>

    </div>
    
    <?php 
      if ($lokal=="mini.sejak.tk") {
        ?>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
          <script src="//jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <?php
      } else {
        ?>
          <script src="js/jquery-1.10.2.js"></script>
          <script src="js/jQueryRotate.js"></script>
          <script src="js/bootstrap.min.js"></script>
        <?php
      }
    ?>
         <script src="js/image.min.js"></script>
    <!-- <script src="js/stream.min.js"></script> -->
    <?php 
      // if (isset($_GET['cctv'])) {
      //   echo "<script>createImageLayer();</script>";
      // }
    ?>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
    
</body>

</html>
