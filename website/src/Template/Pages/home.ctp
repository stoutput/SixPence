<!DOCTYPE HTML>
<html>
<body>
  <div class="background"></div>
  <div class="container text-center"><img src="img/clear-white.png" class="hero-image">
    <h2>SPARE CHANGE MAKING CHANGE</h2>
    <h4>At SixPence, we believe that fundraising should be as simple as handing a friend your spare change.</h4>
    <div class="row">
      <div class="col-sm-6"><a href="/alpha" class="button">WHO WE ARE</a></div>
      <?php
        if(stripos($_SERVER['HTTP_USER_AGENT'],'sixpence-android') === false) { // && stripos($ua,'mobile') !== false) {
        	echo '<div class="col-sm-6"><a href="/files/sixpence.apk" class="button download-button" download="SixPence.apk">DOWNLOAD APP</a></div>';
        }
      ?>
    </div>
  </div>
</body>
</html>
