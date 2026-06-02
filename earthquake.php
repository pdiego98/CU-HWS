<?php include('livedata.php');include('common.php');date_default_timezone_set($TZ);$json_string=@file_get_contents('jsondata/eqnotification.txt');$parsed_json=json_decode($json_string,true);

if (empty($parsed_json) || !is_array($parsed_json) || count($parsed_json) < 4) {
    echo '<div class="eqcirclehomeregional">
<div class="eqtexthomeregional">
<div class="eqcircle1home"><spanyellowmag>Offline
<svgearthquake>
<svg id="i-activity" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg></svgearthquake>
</spanyellowmag></div>
<div class ="spane"> EQ Data <regionalmoderate>Offline</regionalmoderate></div>
<div class="eqtexthome"> N/A <br> Time: N/A <br> Distance<colordist>N/A</colordist> </div>
</div></div>';
    exit;
}
// fixed deprecated curly brace array address issue  5-May-2020
$software    = 'Cumulus <span>Software</span>';
$designedfor    = '<br>For Cumulus';
$magnitude=isset($parsed_json[0]['magnitude']) ? number_format((float)$parsed_json[0]['magnitude'],1) : 0;
$eqtitle=$parsed_json[0]['location'] ?? 'Unknown';
$time=$parsed_json[0]['date_time'] ?? date('Y-m-d H:i:s');
$lati=$parsed_json[0]['latitude'] ?? 0;
$longi=$parsed_json[0]['longitude'] ?? 0;
$eventime=date($timeFormatShort,strtotime("$time"));

$magnitude1=isset($parsed_json[1]['magnitude']) ? number_format((float)$parsed_json[1]['magnitude'],1) : 0;
$eqtitle1=$parsed_json[1]['location'] ?? 'Unknown';
$lati1=$parsed_json[1]['latitude'] ?? 0;
$longi1=$parsed_json[1]['longitude'] ?? 0;
$time1=$parsed_json[1]['date_time'] ?? date('Y-m-d H:i:s');
$eventime1=date($timeFormatShort,strtotime("$time1"));

$magnitude2=isset($parsed_json[2]['magnitude']) ? number_format((float)$parsed_json[2]['magnitude'],1) : 0;
$eqtitle2=$parsed_json[2]['location'] ?? 'Unknown';
$lati2=$parsed_json[2]['latitude'] ?? 0;
$longi2=$parsed_json[2]['longitude'] ?? 0;
$time2=$parsed_json[2]['date_time'] ?? date('Y-m-d H:i:s');
$eventime2=date($timeFormatShort,strtotime("$time2"));

$magnitude3=isset($parsed_json[3]['magnitude']) ? number_format((float)$parsed_json[3]['magnitude'],1) : 0;
$eqtitle3=$parsed_json[3]['location'] ?? 'Unknown';
$lati3=$parsed_json[3]['latitude'] ?? 0;
$longi3=$parsed_json[3]['longitude'] ?? 0;
$time3=$parsed_json[3]['date_time'] ?? date('Y-m-d H:i:s');
$eventime3=date($timeFormatShort,strtotime("$time3"));?>


 <?php
// CALCULATE THE DISTANCE OF LATEST EARTHQUAKE //
// FROM LOCATION OF HOMEWEATHER STATION //
// Brian Underdown July 28th 2016 updated May 25th 2017//
$eqdist;
if ($weather["wind_units"] == 'mph') {
	$eqdist = round(distance($lat, $lon, $lati, $longi) * 0.621371) . " mi";} else {$eqdist = round(distance($lat, $lon, $lati, $longi)) . " km";}
	
$eqdist1;
if ($weather["wind_units"] == 'mph') {
	$eqdist1 = round(distance($lat, $lon, $lati1, $longi1) * 0.621371) . " mi";} else {$eqdist1 = round(distance($lat, $lon, $lati1, $longi1)) . " km";}	
	
$eqdist2;
if ($weather["wind_units"] == 'mph') {
	$eqdist2 = round(distance($lat, $lon, $lati2, $longi2) * 0.621371) . " mi";} else {$eqdist2 = round(distance($lat, $lon, $lati2, $longi2)) . " km";}
	
$eqdist3;
if ($weather["wind_units"] == 'mph') {
	$eqdist3 = round(distance($lat, $lon, $lati3, $longi3) * 0.621371) . " mi";} else {$eqdist3 = round(distance($lat, $lon, $lati3, $longi3)) . " km";}		
				
	
  ?>
<div class="eqcirclehomeregional">
<div class="eqtexthomeregional">
<?php ;
//compiled on May 25th 2017 weather earthquake the last 4 regional earthquakes will take priority //


//regional >
//+5.5
 if ($eqdist<$notifyDistEQ && $magnitude>5){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
 <svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>
 
 
 </spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1>5){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>


</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['Regional']."  <regionalstrong>".$lang['Strong']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}


else if($eqdist2<$notifyDistEQ && $magnitude2>5){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}


else if ($eqdist3<$notifyDistEQ && $magnitude3>5){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionaEl']." <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}


// regional +4
 else if ($eqdist<$notifyDistEQ && $magnitude>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>`{`$1`}
 <svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>
 
 
 </spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>`{`$1`}

<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}


else if($eqdist2<$notifyDistEQ && $magnitude2>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}


else if ($eqdist3<$notifyDistEQ && $magnitude3>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>


</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}


//regional <4
else if ($eqdist<$notifyDistEQ && $magnitude<4){echo "<div class=\"eqcircle1home\"><spangreenmag>`{`$1`} 
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1<4){echo "<div class=\"eqcircle1home\"><spangreenmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}

else if($eqdist2<$notifyDistEQ && $magnitude2<4){echo "<div class=\"eqcircle1home\"><spangreenmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}

else if ($eqdist3<$notifyDistEQ && $magnitude3<4){echo "<div class=\"eqcircle1home\"><spangreenmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</minorregional></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}




//worldwide will appear if no regional earthquakes are listed or detected 
//minor
else if ($magnitude<4){echo "<div class=\"eqcircle1home\"><spangreenmag>`{`$1`} 
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> <regionalminor>".$lang['MinorE']."</regionalminor> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//moderate
else if ($magnitude<5){echo "<div class=\"eqcircle1home\"><spanyellowmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
<div class =\"spane\"> <regionalmoderate>".$lang['ModerateE']."</regionalmoderate> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//strong
else if ($magnitude<7){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag> </eqcircle1home></div>
<div class =\"spane\"> <regionalstrong>".$lang['StrongE']."</regionalstrong> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//very strong
else if ($magnitude<10){echo "<div class=\"eqcircle1home\"><spanredmag>`{`$1`}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag> </eqcircle1home></div>
<div class =\"spane\"> Very <regionalstrong>".$lang['StrongE']."</regionalstrong> !!</div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
?>

