<style>
.webcam{
-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;width:275px;height:145px;margin:2px;}
</style>
<!-- HOMEWEATHER STATION TEMPLATE SIMPLE WEBCAM -add your url as shown below do NOT delete the class='webcam' !!! -->
<?php
# Also remember to change webcam.php with your selected webcam URL
#
#$myCamUrl = "http://icons.wunderground.com/webcamramdisk/k/c/KCASARATOGA/1/current.jpg";
#$myCamUrl = 'http://travelingrvwx.com/webcam/jpgwebcam.jpg';
$myCamUrl = "https://meteo.skytel.it/webcam/image.jpg";
?>
<img src="<?php echo $myCamUrl.'?'.time(); ?>" alt="weathercam" class="webcam">
</span>
