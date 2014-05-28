<script>
  var streamURL = "/stream/1";

  function reloadStaticImg() {
    var staticImg = document.getElementById('snapshotimg');
    staticImg.src = '/snapshot/1?goji='+Math.random();
  }
</script>

<div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          Menampilkan CCTV 1 (Depan Kosan)
        </h3>
      </div>
      <div class="panel-body">
        Lokasi: Depan Kosan <br>
        Camera: M-Tech 1,3 MP <br>
        Server: TP-LINK MR3040
      </div>
    </div>
    
    <?php 
      if ($nyala_wc1) {
        ?>
        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
          <li class="active"><a href="#static" data-toggle="tab">Gambar Statis</a></li>
          <li class=""><a href="#stream" data-toggle="tab">Streaming</a></li>
          <li class=""><a href="#info" data-toggle="tab"><i class="fa fa-info-circle"></i></a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="static">
            <div id="divsnapshot" class="well col-sm-6 col-lg-6 col-md-6">
              <img src="/snapshot/1" id="snapshotimg" alt="">
            </div>
            <div class="col-sm-6 col-lg-6 col-md-6">
              <p>
                Gunakan tombol berikut untuk memutar posisi gambar.
              </p>
              <button onclick="javascript:void(0)" id="rotateSnapshotLeft" class="btn btn-primary"><i class="fa fa-rotate-left"></i></button>
              &nbsp;
              <button onclick="javascript:void(0)" id="rotateSnapshotRight" class="btn btn-primary"><i class="fa fa-rotate-right"></i></button>
              <!-- &nbsp;
              <button onclick="javascript:void(0)" id="flipSnapshotV" class="btn btn-primary">&nbsp;<i class="fa fa-arrows-v"></i>&nbsp;</button>
              &nbsp;
              <button onclick="javascript:void(0)" id="flipSnapshotH" class="btn btn-primary"><i class="fa fa-arrows-h"></i></button> -->
              <p><br>
                Klik tombol berikut untuk memuat ulang gambar.
              </p>
              <button onclick="reloadStaticImg()" type="button" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Refresh gambar</button>
              <p><br>
                <i class="fa fa-youtube-play"></i> Untuk streaming, klik pada tab 'Streaming' di atas.
              </p>
            </div>
          </div>
          <div class="tab-pane fade" id="stream">
            <div id="stream">
              <!-- <noscript><img src="/stream/1" class="cctv" /></noscript> -->

              <div class="well col-sm-6 col-lg-6 col-md-6">
                <img src="/stream/1" id="streamingimg" />
              </div>
              <div class="col-sm-6 col-lg-6 col-md-6">
                <p>
                  Gunakan tombol berikut untuk memutar posisi gambar.
                </p>
                <button onclick="javascript:void(0)" id="rotateStreamingLeft" class="btn btn-primary"><i class="fa fa-rotate-left"></i></button>
                &nbsp;
                <button onclick="javascript:void(0)" id="rotateStreamingRight" class="btn btn-primary"><i class="fa fa-rotate-right"></i></button>
                <!-- &nbsp;
                <button onclick="javascript:void(0)" id="flipStreamingV" class="btn btn-primary">&nbsp;<i class="fa fa-arrows-v"></i>&nbsp;</button>
                &nbsp;
                <button onclick="javascript:void(0)" id="flipStreamingH" class="btn btn-primary"><i class="fa fa-arrows-h"></i></button> -->
                <hr>
                <div class="alert alert-success">
                  <h4><i class="fa fa-youtube-play"></i>&nbsp; Streaming dengan VLC</h4>
                  <p>Anda bisa membuka streaming dengan VLC Media Player. Gunakan menu 'Open Network Stream' dan masukkan alamat berikut:</p>
                  <p><span class="label label-warning vlc"><b>http://<?=$lokal?>/stream/<?=$_GET['cctv']?></b></span></p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="tab-pane fade" id="info">
            <p>
              <b>Tentang CCTV ini.</b>
            </p>
            <p>
              CCTV <s>abal-abal</s> (karena sebenarnya cuma webcam murah, 45rb-an) ini merupakan proyek cctv pertama yang dibuat untuk tujuan POC dan development awal webapp ini. Ceritanya berawal dari menemukan posting ssebuah blog tentang oprekan keren (OpenWRT), akhirnya mupeng dan kemudian dilanjutkan dengan mencari router bekas di <s>tokobagus</s> untuk dioprek.
            </p>
            <p>
              Setelah puas menjadikan router sebagai webserver, ftv server, samba server, proxy server, local dns server, media & streaming player dan mirror repository lokal untuk OpenWRT, akhirnya kesampaian juga membuat proyek cctv ini. Memanfaatkan webcam <s>yang sudah lama nganggur</s>, mulailah membuat setup pengkabelan listrik dan peletakan webcam.
            </p>
            <p>
              Hasil akhir yang didapat sungguh keren <s>baca: memalukan</s>, router dicantolkan dan di rekatkan menggunakan lakban di kusen jendela dan webcam disematkan di angin-angin kamar dengan target pengamatan tempat motor biasa diparkir di depan kamar. Alhamdulillah, meskipun sedikit mekso, tapi hasilnya bisa dinikmati bersama (bisa diakses teman-teman kos lewat wifi lokal dan diakses oleh publik lewat internet)..
            </p>
            <div class="col-md-4">
              <img src="img/cctv1_2.jpg" alt="" class="fotocctv img-responsive img-circle">
            </div>
            <div class="col-md-4">
              <img src="img/cctv1_3.jpg" alt="" class="fotocctv img-responsive img-circle">
            </div>
            <div class="col-md-4">
              <img src="img/cctv1_1.jpg" alt="" class="fotocctv img-responsive img-circle">
            </div>
          </div>
        </div>
        <?php
      } else {
        ?>
          <div class="alert alert-warning">
            <h4>Kesalahan!</h4>
            <p>CCTV sedang Offline. Coba lagi di lain waktu.</p>
          </div>
        <?php
      }
      
     ?>
</div>
