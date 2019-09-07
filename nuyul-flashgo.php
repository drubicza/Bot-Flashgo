<?php
$cl = system("rm -rf user");

require "__script_nuyul__.php";

@system("rm -rf user");
@system("clear");
error_reporting(0);
@system("sh logo.sh");
$stat_flash = true;
echo $flash.$t;
sleep(3);
echo $msg_flash.$t;
sleep(2);
echo $putih."[•] Proses Masuk ";
loading();
invite($header);
echo $t;
sleep(1);

$js   = json_decode(login($header), true);
$uid  = $js["UserId"];
$coin = $js["Coin"];
$bal  = $js["Money"];
$inv  = $js["InviteCode"];

if ($js != null) {
    if ($user_name != null) {
        echo $putih."[•] Username:$ijo $user_name".$t;
        sleep(2);
    } else {
        echo $putih."[•] login as$turkis $uid".$t;
        sleep(2);
    }

    echo $putih."[•] coin :$ijo $coin $putih|| money:$ijo Rp.$bal".$t;
} else {
    echo $red."[•] terjadi kesalahan".$t;
    $cl;
    exit;
}

sleep(3);

if ($stat_flash) {

    echo $t.$turkis."[•] misi cek absen ".$t;
    sleep(1);

    $js   = json_decode(absen($header), true);
    $coin = $js["Coin"];
    $bal  = $js["Money"];
    $err  = $js["Effect"]["Error"];

    if ($err == 0) {
        $poin = $js["Effect"]["Coin"];
        echo $ijo."[•] sukses$putih coin$ijo +$poin $putih|| total coin :$ijo $coin".$t;
    } elseif ($err == 10001) {
        echo $kuning."[•] sudah absen hari ini ".$t;
    } else {
        echo $red."[•] terjadi kesalahan ".$t;
        $cl;
    }

    sleep(3);
    echo $turkis."[•] misi share konten ".$t;
    sleep(1);

    $js   = json_decode(deal_share($header), true);
    $coin = $js["Coin"];
    $bal  = $js["Money"];
    $err  = $js["Effect"]["Error"];
    $poin = $js["Effect"]["Coin"];

    if ($err == 0) {
        echo $ijo."[•] sukses$putih coin$ijo +$poin $putih|| total coin :$ijo $coin".$t;
    } elseif ($err == 10001) {
        echo $kuning."[•] misi sudah diselesaikan ".$t;
    } else {
        echo $red."[•] terjadi kesalahan".$t;
        $cl;
    }

    sleep(3);
    echo $turkis."[•] misi deal view ".$t;
    sleep(1);

    while (true) {
        $js   = json_decode(deal_view($header), true);
        $coin = $js["Coin"];
        $bal  = $js["Money"];
        $err  = $js["Effect"]["Error"];
        $poin = $js["Effect"]["Coin"];

        if ($err == 0) {
            echo $ijo."[•] sukses$putih coin$ijo +$poin $putih|| total coin :$ijo $coin".$t;
        } elseif ($err == 10001) {
            echo $kuning."[•] limit harian ".$t;
            break;
        } else {
            echo $red."[•] terjadi kesalahan".$t;
            $cl;
            exit;
        }
        sleep(30);
    }
} else {
    echo $t.$kuning."[•] oops fiture lock".$t;
    @system("rm -rf user");
}

@system("rm -rf user");
echo $msg_flash.$t;
?>
