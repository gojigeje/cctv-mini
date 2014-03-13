<script>
  var streamURL = "http://192.168.2.9:8080/?action=stream";

  function reloadStaticImg() {
    var staticImg = document.getElementById('snapshotimg');
    staticImg.src = 'http://192.168.2.9:8080/?action=snapshot&goji='+Math.random();
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
              <img src="http://192.168.2.9:8080/?action=snapshot" id="snapshotimg" alt="">
            </div>
            <div class="col-sm-6 col-lg-6 col-md-6">
              <p>
                Gunakan tombol berikut untuk merubah posisi gambar.
              </p>
              <button onclick="javascript:void(0)" id="rotateSnapshotLeft" class="btn btn-primary"><i class="fa fa-rotate-left"></i></button>
              <button onclick="javascript:void(0)" id="rotateSnapshotRight" class="btn btn-primary"><i class="fa fa-rotate-right"></i></button>
              <p><br>
                Klik tombol berikut untuk memuat ulang gambar.
              </p>
              <button onclick="reloadStaticImg()" type="button" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Refresh gambar</button>
              <p><br>
                <i class="fa fa-youtube-play"></i> Untuk streaming, klik pada tab <i>Streaming</i> di atas.
              </p>
            </div>
          </div>
          <div class="tab-pane fade" id="stream">
            <div id="stream">
              <!-- <noscript><img src="http://192.168.2.9:8080/?action=stream" class="cctv" /></noscript> -->

              <div class="well col-sm-6 col-lg-6 col-md-6">
                <img src="http://192.168.2.9:8080/?action=stream" id="streamingimg" />
              </div>
              <div class="col-sm-6 col-lg-6 col-md-6">
                <button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Muat ulang gambar</button>
                <br> <br>
                <p>
                  Klik tombol untuk memuat ulang gambar. <br>
                  Untuk streaming, klik pada tab <i>Streaming</i> di atas.
                </p>
                <br>
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
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