<?php
date_default_timezone_set("Asia/Jakarta");
@system("clear");

$t      = "\n";
$r      = "\n\n";
$biru   = "\x1b[1;34m";
$turkis = "\x1b[1;36m";
$ijo    = "\x1b[92m";
$putih  = "\x1b[1;37m";
$pink   = "\x1b[1;35m";
$red    = "\x1b[1;31m";
$kuning = "\x1b[1;33m";

require "data.php";

$header = "user-agent: Dart/2.1 (dart:io)
user-gaid: $user_gaid
x-user-token: $user_token
x-user-id: $user_id
authorization: Bearer $Bearer
x-app-version: 1160
x-invite-code: $invite_code
x-app-package-id: com.cari.promo.diskon";
$id = [2, 4, 10005, 20001, 20004, 10001, 10002, 10006, ];

function absen($header)
{
    $head   = array();
    $head[] = $header;
    $curl   = curl_init();

    curl_setopt_array($curl,
        array(CURLOPT_RETURNTRANSFER=>true,
              CURLOPT_URL=>"http://flashgo.baca.co.id/api/v1/action/reward/20001?newsId=0",
              CURLOPT_TIMEOUT=>30,
              CURLOPT_POST=>true,
              CURLOPT_POSTFIELDS=>"",
              CURLOPT_HTTPHEADER=>$head,
              CURLOPT_SSL_VERIFYPEER=>true,));

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function deal_view($header)
{
    $head   = array();
    $head[] = $header;
    $curl   = curl_init();

    curl_setopt_array($curl,
        array(CURLOPT_RETURNTRANSFER=>true,
              CURLOPT_URL=>"http://flashgo.baca.co.id/api/v1/action/reward/20004?newsid=".rand(10000000, 99999999),
              CURLOPT_TIMEOUT=>30,
              CURLOPT_POST=>true,
              CURLOPT_POSTFIELDS=>"",
              CURLOPT_HTTPHEADER=>$head,
              CURLOPT_SSL_VERIFYPEER=>true,));

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function login($header)
{
    $head   = array();
    $head[] = $header;
    $curl   = curl_init();

    curl_setopt_array($curl,
        array(CURLOPT_RETURNTRANSFER=>true,
              CURLOPT_URL=>"http://flashgo.baca.co.id/api/v1/action/user/status",
              CURLOPT_TIMEOUT=>30,
              CURLOPT_HTTPHEADER=>$head,
              CURLOPT_SSL_VERIFYPEER=>true,));

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function deal_share($header)
{
    $head   = array();
    $head[] = $header;
    $curl   = curl_init();

    curl_setopt_array($curl,
        array(CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_URL=>"http://flashgo.baca.co.id/api/v1/action/reward/20003/?newsId=0",
            CURLOPT_TIMEOUT=>30,
            CURLOPT_POST=>true,
            CURLOPT_POSTFIELDS=>"",
            CURLOPT_HTTPHEADER=>$head,
            CURLOPT_SSL_VERIFYPEER=>true,));

    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function loading()
{
    for ($i = 0; $i < 5; $i++) {
        echo ".";
        sleep(1);
    }
}

function invite($header)
{
    $head   = array();
    $head[] = $header;
    $curl   = curl_init();

    curl_setopt_array($curl,
        array(CURLOPT_RETURNTRANSFER=>true,
              CURLOPT_URL=>"http://flashgo.baca.co.id/api/v1/action/code/F2IX5NzDFE",
              CURLOPT_TIMEOUT=>30,
              CURLOPT_POST=>true,
              CURLOPT_POSTFIELDS=>"",
              CURLOPT_HTTPHEADER=>$head,
              CURLOPT_SSL_VERIFYPEER=>true,));

    $result = curl_exec($curl);
    curl_close($curl);
    $js     = json_decode($result, true);

    if ($js["Effect"]["Error"] == 0) {
        echo ".";
    } else {
        echo ",";
    }
}
?>
