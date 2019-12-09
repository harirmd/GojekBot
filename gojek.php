<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[94m         PRO HUNTER CORPS           \n";
echo "\e[91m FORMAT NOMOR HP : INDONESIA '62***' , US='1***'\n";
echo "\e[93m SELAMAT DATANG DI GOJEK SHORTCUT\n";
echo "\e[93m SUPPORTED by PRO HUNTER MEDAN\n";
echo "\e[93m KALAU BISA GRATIS KENAPA HARUS BAYAR \n";
echo "\n";
echo "\e[96m[X] Masukkan Nomor Handphone (62/1) : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[X] Nomor tersebut telah digunakan\n";
    }
  else
    {
    otp:
    echo "\e[96m[X] Masukkan (OTP) yang anda terima : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[X] OTP yang anda masukkan salah\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[X] Mencoba Redeem : VOUCHER FOOD 30K\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(3);
            echo "\e[93m[X] Mencoba Redeem : VOUCHER FOOD 25K\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[92m[X] ".$claim."\n";
                sleep(3);
                echo "\e[93m[X] Mencoba Redeem : VOUCHER FOOD 20K\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[X] Coba Dulu Redeem : GOFOODSANTAI20K !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[92m[X] ".$claim."\n";
                sleep(3);
                echo "\e[93m[X] Coba Dulu Redeem : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[X] Coba Dulu Redeem : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[92m[X] ".$claim . "\n";
            sleep(3);
            echo "\e[93m[X] Coba Dulu Redeem : COBAINGOJEK !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[X] Coba Dulu Redeem : AYOCOBAGOJEK !\n";
                sleep(3);

            }
            else
            {
                echo "\e[92m[X] ".$claim."\n";
                sleep(3);
                echo "\e[93m[X] Coba Dulu Redeem : AYOCOBAGOJEK !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033VOUCHER INVALID/GAGAL REDEEM\n";
            }
            else{
                echo "\e[92m[X] ".$claim."\n";
                
        }
    }
    }


?>
