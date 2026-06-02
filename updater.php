<!-- begin updater.php  30-Mar-2019 -->
<?php
include_once('settings1.php');
include_once('common.php');
date_default_timezone_set($TZ);
?>
<script src="js/jquery.js"></script>
<script>
    //update the charts,eq,forecast data and current conditions//
    var refreshId; $(document).ready(function () { stationcron() }); function stationcron() {
        $.ajax({
            cache: false,
            success: function (a) {
                $("#blank")
                    .html(a); <?php if ($wuupdate > 0) {
                        echo 'setTimeout(stationcron,' . 221000 * $wuupdate . ')';
                    } ?>},
            contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
            type: "GET", url: "jsondata/wuupdate.php"
        })
    };

    //update the modules

    //update the modules position 1
    var refreshId; $(document).ready(function () { position1() }); function position1() {
        $.ajax({
            cache: false, success: function (a) {
                $("#position1").html(a); <?php if ($notifyRefresh > 0) {
                    echo 'setTimeout(position1,' . 221000 * $indoorRefresh . ')';
                } ?>},
            contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
            type: "GET", url: "<?php echo $position1; ?>"
        })
    };

    //update the modules position 2
    var refreshId; $(document).ready(function () { indoor() }); function indoor() {
        $.ajax({
            cache: false, success: function (a) {
                $("#position2").html(a); <?php if ($indoorRefresh > 0) {
                    echo 'setTimeout(indoor,' . 60000 * $indoorRefresh . ')';
                } ?>},
            contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
            type: "GET", url: "<?php echo $position2; ?>"
        })
    };

    // position 3
    var refreshId; $(document).ready(function () { earthquake() }); function earthquake() {
        $.ajax({
            cache: false, success: function (a) {
                $("#position3").html(a); <?php if ($eqRefresh > 0) {
                    echo 'setTimeout(earthquake,' . 1000 * $eqRefresh . ')';
                } ?>}, type: "GET", url: "<?php echo $position3 ?>"
        })
    };


    // position 4
    var refreshId; $(document).ready(function () { notification() }); function notification() {
        $.ajax({
            cache: false, success: function (a) {
                $("#position4").html(a); <?php if ($notifyRefresh > 0) {
                    echo 'setTimeout(notification,' . 1000 * $notifyRefresh . ')';
                } ?>}, type: "GET", url: "<?php echo $position4; ?>"
        })
    };

    // outdoor temp
    var refreshId; $(document).ready(function () { temperature() }); function temperature() {
        $.ajax({
            cache: false, success: function (a) {
                $("#temperature").html(a); <?php if ($tempRefresh > 0) {
                    echo 'setTimeout(temperature,' . 1000 * $tempRefresh . ')';
                } ?>}, type: "GET", url: "<?php echo $temperaturemodule ?>"
        })
    };

    //current conditions icon
    var refreshId; $(document).ready(function () { currentsky() }); function currentsky() {
        $.ajax({
            cache: false, success: function (a) {
                $("#currentsky").html(a); <?php if ($skyRefresh > 0) {
                    echo 'setTimeout(currentsky,' . 1000 * $skyRefresh . ')';
                } ?>}, type: "GET", url: "<?php echo $currentconditions; ?>"
        })
    };

    // wind speed / direction 
    var refreshId; $(document).ready(function () { windspeed() }); function windspeed() {
        $.ajax({
            cache: false, success: function (a) {
                $("#windspeed").html(a); <?php if ($windSpeedRefresh > 0) {
                    echo 'setTimeout(windspeed,' . 1000 * $windSpeedRefresh . ')';
                } ?>}, type: "GET", url: "windspeeddirection.php"
        })
    };

    //barometer
    var refreshId; $(document).ready(function () { barometer() }); function barometer() {
        $.ajax({
            cache: false, success: function (a) {
                $("#barometer").html(a); <?php if ($baroRefresh > 0) {
                    echo 'setTimeout(barometer,' . 1000 * $baroRefresh . ')';
                } ?>}, type: "GET", url: "barometer.php"
        })
    };

    // moonphase
    var refreshId; $(document).ready(function () { moonphase() }); function moonphase() {
        $.ajax({
            cache: false, success: function (a) {
                $("#moonphase").html(a); <?php if ($moonRefresh > 0) {
                    echo 'setTimeout(moonphase,' . 1000 * $moonRefresh . ')';
                } ?>}, type: "GET", url: "<?php echo $sunoption ?>"
        })
    };

    // rainfall
    var refreshId; $(document).ready(function () { rainfall() }); function rainfall() {
        $.ajax({
            cache: false, success: function (a) {
                $("#rainfall").html(a); <?php if ($rainRefresh > 0) {
                    echo 'setTimeout(rainfall,' . 1000 * $rainRefresh . ')';
                } ?>}, type: "GET", url: "rainfall.php"
        })
    };

    // position12
    var refreshId; $(document).ready(function () { solar() }); function solar() {
        $.ajax({
            cache: false, success: function (a) {
                $("#solar").html(a); <?php if ($solarRefresh > 0) {
                    echo 'setTimeout(solar,' . 1000 * $solarRefresh . ')';
                } ?>}, type: "GET", url: '<?php echo $position12 ?>'
        })
    };

    //last module
    var refreshId; $(document).ready(function () { dldata() }); function dldata() {
        $.ajax({
            cache: false, success: function (a) {
                $("#dldata").html(a); <?php if ($daylightRefresh > 0) {
                    echo 'setTimeout(dldata,' . 1000 * $daylightRefresh . ')';
                } ?> }, type: "GET", url: "<?php echo $positionlastmodule ?>"
        })
    };

    //current 3dy forecast
    var refreshId; $(document).ready(function () { currentfore() }); function currentfore() { $.ajax({ cache: false, success: function (a) { $("#currentfore").html(a); setTimeout(currentfore, 360000) }, type: "GET", url: "<?php echo $position6 ?>" }) };

</script>
<?php if ($position1 == "weather34clock.php") { ?>
    <script>
        // power the clock display in position1 using JavaScript
        <?php
        $dst_offset = 0;
        if (isset($dst)) {
            if ($dst === 'auto') {
                $dst_offset = (float) date('I');
            } else {
                $dst_offset = (float) $dst;
            }
        }
        ?>
        var clockID; var yourTimeZoneFrom = <?php echo (float) $UTC + $dst_offset; ?>; var d = new Date();
        <?php
        // Added code to display clock using supported languages - ktrue - 30-Mar-2019
// Updated: replaced deprecated strftime() with IntlDateFormatter / date() for PHP 8.1+
        print "// language='$language' lang_locale='$lang_locale'\n";

        if (class_exists('IntlDateFormatter')) {
            try {
                // Use IntlDateFormatter for locale-aware abbreviated month/day names
                $locale = trim(str_replace('.UTF-8', '', explode(',', $lang_locale)[0]), '"\' ');
                $monthFmt = new IntlDateFormatter($locale, IntlDateFormatter::NONE, IntlDateFormatter::NONE, $TZ, null, 'MMM');
                $dayFmt = new IntlDateFormatter($locale, IntlDateFormatter::NONE, IntlDateFormatter::NONE, $TZ, null, 'EEE');

                if (!$monthFmt || !$dayFmt) {
                    throw new Exception("IntlDateFormatter failed to initialize");
                }

                $months = array_map(function ($m) use ($monthFmt) {
                    $fmt = $monthFmt->format(mktime(0, 0, 0, $m, 2, 1970));
                    return $fmt ? $fmt : date('M', mktime(0, 0, 0, $m, 2, 1970));
                }, range(1, 12));

                // days of the week (Sun=0 first)
                $days = array_map(function ($d) use ($dayFmt) {
                    $fmt = $dayFmt->format(mktime(0, 0, 0, 1, $d + 3, 1970));
                    return $fmt ? $fmt : date('D', mktime(0, 0, 0, 1, $d + 3, 1970));
                }, range(1, 7));
            } catch (Throwable $e) {
                $monthFmt = null;
            }
        } else {
            $monthFmt = null;
        }

        if (!$monthFmt || !isset($months) || !isset($days)) {
            // Fallback: English abbreviated names via date()
            $months = array_map(function ($m) {
                return date('M', mktime(0, 0, 0, $m, 2, 1970));
            }, range(1, 12));

            $days = array_map(function ($d) {
                return date('D', mktime(0, 0, 0, 1, $d + 3, 1970));
            }, range(1, 7));
        }

        print "var months=[";
        foreach ($months as $n => $abbr) {
            if ($n > 0) {
                print ",";
            }
            print "\"$abbr\"";
        }
        print "]; //using $language month names\n";

        print "var weekdays=[";
        foreach ($days as $n => $abbr) {
            if ($n > 0) {
                print ",";
            }
            print "\"$abbr\"";
        }
        print "]; //using $language day names\n";
        print "var useAMPM = ";
        print preg_match('|g|', $timeFormat) ? ' true' : ' false';
        print " // time format\n";
        print "var ampmLegend = '" . date('a') . "';\n";
        ?>
        var tzDifference = yourTimeZoneFrom * 60 + d.getTimezoneOffset();
        var offset = tzDifference * 60 * 1000;
        function UpdateClock() {
            var e = new Date(new Date().getTime() + offset);
            var c = e.getHours();
            var a = e.getMinutes();
            var g = e.getSeconds();
            var f = e.getFullYear();
            var h = months[e.getMonth()];
            var b = e.getDate();
            var i = weekdays[e.getDay()];
            if (a < 10) {
                a = "0" + a
            }
            if (g < 10) {
                g = "0" + g
            }
            if (!useAMPM & c < 10) {
                c = "0" + c
            }
            var c2 = c;
            if (useAMPM) {
                if (c > 12) { c2 = c - 12; ampm = 'pm' } else { ampm = 'am' } // afternoon v.s. morning
                if (c == 12) { ampm = 'pm' } // noon
                if (c < 1) { c2 = c + 12; } // midnight
            }

            if (useAMPM) { c = c2; } else { ampm = ''; }
            document.getElementById("theTime").innerHTML = "<div class='weatherclock34'> " + i + " " + b + " " + h + " " + f + "<div class='orangeclock'>" + c + ":" + a + ":" + g + ampm;

            // animate SVG analog clock if present
            var hourHand = document.getElementById("hour-hand");
            if (hourHand) {
                var secDeg = g * 6;
                var minDeg = a * 6 + (g * 0.1);
                var hrDeg = (e.getHours() % 12) * 30 + (a * 0.5);
                document.getElementById('second-hand').setAttribute('transform', 'rotate(' + secDeg + ' 50 50)');
                document.getElementById('minute-hand').setAttribute('transform', 'rotate(' + minDeg + ' 50 50)');
                hourHand.setAttribute('transform', 'rotate(' + hrDeg + ' 50 50)');
            }
        }
        function StartClock() {
            clockID = setInterval(UpdateClock, 500)
        }
        function KillClock() {
            clearTimeout(clockID)
        }
        window.onload = function () {
            StartClock()
        };
    </script>
<?php } ?>
<!-- end updater.php -->