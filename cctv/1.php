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
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="static">
            <div class="well col-sm-6 col-lg-6 col-md-6">
              <img src="http://192.168.2.9:8080/?action=snapshot" id="snapshotimg" alt="">
            </div>
            <div class="col-sm-6 col-lg-6 col-md-6">
              <button onclick="reloadStaticImg()" type="button" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Refresh gambar</button>
              <br> <br>
              <p>
                Klik tombol untuk memuat ulang gambar. <br>
                Untuk streaming, klik pada tab <i>Streaming</i> di atas.
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
                  <h4>Streaming dengan VLC</h4>
                  <p>Anda bisa membuka streaming dengan VLC Media Player. Gunakan menu 'Open Network Stream' dan masukkan alamat berikut:</p>
                  <p><span class="label label-warning vlc"><b>http://<?=$lokal?>/stream/<?=$_GET['cctv']?></b></span></p>
                </div>
              </div>
              
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