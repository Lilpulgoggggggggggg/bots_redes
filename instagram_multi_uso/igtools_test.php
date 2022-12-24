<?php
error_reporting(0);
require "function.php";

echo "\e[0;32m[\e[0m1\e[0;32m]\e[0m Instagram Creator (With SMS-Activate)\n";
echo "\e[0;32m[\e[0m2\e[0;32m]\e[0m Instagram Creator (With SMS-HUB)\n";
echo "\e[0;32m[\e[0m3\e[0;32m]\e[0m Instagram Creator (Manual Phone Number)\n";
echo "\e[0;32m[\e[0m4\e[0;32m]\e[0m instagram Auto Follow\n";
echo "\e[0;32m[\e[0m5\e[0;32m]\e[0m instagram Auto Comment\n";
echo "\e[0;32m[\e[0m6\e[0;32m]\e[0m instagram Auto Like\n";
echo "\e[0;32m[\e[0m7\e[0;32m]\e[0m IG Auto Report Tools\n";



enterListtools:
echo "Pilihan Tools : ";
$pilihan = trim(fgets(STDIN));
echo "\n";
if ($pilihan == 1) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With sms-activate.ru\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";

    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';
    
    echo "[+] Apikey For sms sms-activate.ru              : ";
    $apikey = trim(fgets(STDIN));
    
    echo "[+] Total Account In 1 Phone Number             : ";
    $total = trim(fgets(STDIN));
    echo "\n";
    
    while(true) {
    gagalSms:
    $info = curlget('https://sms-activate.ru/stubs/handler_api.php?api_key='.$apikey.'&action=getBalance', null, null);
    preg_match('#ACCESS_BALANCE:(.*)#', $info[1], $balance);
    $balance = substr($balance[1], 0, -3);
    echo "[+] Balance Now in RUB : $balance\n";
    $ratio = curlget('https://exchangerate.guru/rub/idr/'.$balance.'/', null, null);
    $idr = get_between($ratio[1], 'type="text" class="form-control" value="', '"');
    echo "[+] Balance Now in IDR : $idr\n\n";
    
    $headers = [
        'Host: sms-activate.ru',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'Referer: https://sms-activate.ru/en/getNumber',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://sms-activate.ru',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $prov = ['indosat', 'telkomsel'];
    $rand = angkarand(1);
    $data = 'action=getNumber&api_key='.$apikey.'&service=ig&forward=0&owner=site&operator='.$prov[$rand].'';
    $getPhone = curl('https://sms-activate.ru/stubs/handler_api.php', $data, $headers);
    $info = get_between_array($getPhone[1], ':', '(.*)');
    $idStatus = $info[0];
    $phone = $info[1];
    if($phone) {
    echo "[+] Phone Number : $phone\n";
    echo "[+] ID Status    : $idStatus\n\n";
    } else {
    goto gagalSms;
    }
    for ($i=0; $i < $total; $i++) { 
    awal:
    $headers = [
        'Host: ig.apriamsyah.id',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    ];
    
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);
    $cookie = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', null, null);
    $csrf = ($cookie[2]['csrftoken']);
    $mid = ($cookie[2]['mid']);
    $igdid = ($cookie[2]['ig_did']);
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password=Alfarz123!&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password='.$password.'&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    if (strpos($regis[1], 'username')) {
        echo "[$no] Username Yang Akan Didaftarkan : $username\n";
    } else {
        echo "[$no] Username Tidak Ada\n";
        break;
    }
    
    
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data= 'client_id='.$mid.'&phone_number='.$phone.'&phone_id=&big_blue_token=';
    $sendCode = curl('https://www.instagram.com/accounts/send_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        print_r($sendCode);
        goto gagalSms;
    }
    
    $headers = [
        'User-Agent : Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
        'Accept : */*',
        'Accept-Language : en-US,en;q=0.5',
        'Accept-Encoding : gzip, deflate',
        'Referer : https://sms-activate.ru/en/getNumber',
        'Content-Type : application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With : XMLHttpRequest',
        'Content-Length : 79',
        'Origin : https://sms-activate.ru',
        'Sec-Fetch-Dest : empty',
        'Sec-Fetch-Mode : cors',
        'Sec-Fetch-Site : same-origin',
        'Te : trailers',
    ];
    
    $data = 'action=setStatus&api_key='.$apikey.'&id='.$idStatus.'&status=1';
    $active = curl('https://sms-activate.ru/stubs/handler_api.php', $data, $headers);
        codeAtas:
        $infoCode = curlget('https://sms-activate.ru/stubs/handler_api.php?api_key='.$apikey.'&action=getStatus&id='.$idStatus.'', null, null);
        preg_match('#STATUS_OK:(.*)#', $infoCode[1], $code);
        $code = $code[1];
    
        if ($code) {
            echo "[+] Code Found   : $code\n";
        } else {
            echo "[+] Waiting For Code\n";
            sleep(5);
            goto codeAtas;
        }
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'client_id='.$mid.'&phone_number='.$phone.'&sms_code='.$code.'';
    $confirmCode = curl('https://www.instagram.com/accounts/validate_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'Referer: https://sms-activate.ru/en/getNumber',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://sms-activate.ru',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'action=setStatus&api_key='.$apikey.'&id='.$idStatus.'&status=3';
    $getLagi = curl('https://sms-activate.ru/stubs/handler_api.php', $data, $headers);
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'enc_password='.$password.'&phone_number='.$phone.'&username='.$username.'&first_name='.$namre.'+'.$larst.'&month=8&day=13&year=1980&sms_code='.$code.'&client_id='.$mid.'&seamless_login_enabled=1&tos_version=eu';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/', $data, $headers);
    
    
    if (strpos($regis[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
    }
} elseif ($pilihan == 2) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With sms-activate.ru\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";
    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';
    
    echo "[+] Apikey For sms sms-activate.ru              : ";
    $apikey = trim(fgets(STDIN));
    
    echo "[+] Total Account In 1 Phone Number             : ";
    $total = trim(fgets(STDIN));
    echo "\n";
    
    while(true) {
    gagalSms1:
    $info = curlget('https://smshub.org/stubs/handler_api.php?api_key='.$apikey.'&action=getBalance', null, null);
    preg_match('#ACCESS_BALANCE:(.*)#', $info[1], $balance);
    $balance = substr($balance[1], 0, -3);
    echo "[+] Balance Now in RUB : $balance\n";
    $ratio = curlget('https://exchangerate.guru/rub/idr/'.$balance.'/', null, null);
    $idr = get_between($ratio[1], 'type="text" class="form-control" value="', '"');
    echo "[+] Balance Now in IDR : $idr\n\n";
    
    $headers = [
        'Host: smshub.org',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'Referer: https://smshub.org/en/getNumber',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://smshub.org',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $prov = ['indosat', 'telkomsel'];
    $rand = angkarand(1);
    $data = 'action=getNumber&api_key='.$apikey.'&service=ig&forward=0&owner=site&operator='.$prov[$rand].'';
    $getPhone = curl('https://smshub.org/stubs/handler_api.php', $data, $headers);
    $info = get_between_array($getPhone[1], ':', '(.*)');
    $idStatus = $info[0];
    $phone = $info[1];
    if($phone) {
    echo "[+] Phone Number : $phone\n";
    echo "[+] ID Status    : $idStatus\n\n";
    } else {
    goto gagalSms1;
    }
    for ($i=0; $i < $total; $i++) { 
    awal1:
    $headers = [
        'Host: ig.apriamsyah.id',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    ];
    
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);
    $cookie = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', null, null);
    $csrf = ($cookie[2]['csrftoken']);
    $mid = ($cookie[2]['mid']);
    $igdid = ($cookie[2]['ig_did']);
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password=Alfarz123!&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password='.$password.'&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    if (strpos($regis[1], 'username')) {
        echo "[$no] Username Yang Akan Didaftarkan : $username\n";
    } else {
        echo "[$no] Username Tidak Ada\n";
        break;
    }
    
    
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data= 'client_id='.$mid.'&phone_number='.$phone.'&phone_id=&big_blue_token=';
    $sendCode = curl('https://www.instagram.com/accounts/send_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        goto gagalSms1;
    }
    
    $headers = [
        'User-Agent : Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
        'Accept : */*',
        'Accept-Language : en-US,en;q=0.5',
        'Accept-Encoding : gzip, deflate',
        'Referer : https://smshub.org/en/getNumber',
        'Content-Type : application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With : XMLHttpRequest',
        'Content-Length : 79',
        'Origin : https://smshub.org',
        'Sec-Fetch-Dest : empty',
        'Sec-Fetch-Mode : cors',
        'Sec-Fetch-Site : same-origin',
        'Te : trailers',
    ];
    
    $data = 'action=setStatus&api_key='.$apikey.'&id='.$idStatus.'&status=1';
    $active = curl('https://smshub.org/stubs/handler_api.php', $data, $headers);
        codeAtas1:
        $infoCode = curlget('https://smshub.org/stubs/handler_api.php?api_key='.$apikey.'&action=getStatus&id='.$idStatus.'', null, null);
        preg_match('#STATUS_OK:(.*)#', $infoCode[1], $code);
        $code = $code[1];
    
        if ($code) {
            echo "[+] Code Found   : $code\n";
        } else {
            echo "[+] Waiting For Code\n";
            sleep(5);
            goto codeAtas1;
        }
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'client_id='.$mid.'&phone_number='.$phone.'&sms_code='.$code.'';
    $confirmCode = curl('https://www.instagram.com/accounts/validate_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'Referer: https://smshub.org/en/getNumber',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://smshub.org',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'action=setStatus&api_key='.$apikey.'&id='.$idStatus.'&status=3';
    $getLagi = curl('https://smshub.org/stubs/handler_api.php', $data, $headers);
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'enc_password='.$password.'&phone_number='.$phone.'&username='.$username.'&first_name='.$namre.'+'.$larst.'&month=8&day=13&year=1980&sms_code='.$code.'&client_id='.$mid.'&seamless_login_enabled=1&tos_version=eu';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/', $data, $headers);
    
    
    if (strpos($regis[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
    }
} elseif ($pilihan == 3) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With Manual Phone Number\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";
    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';

    while(true) {
    gagalSms2:
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=es');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$namre = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$larst = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"username\":\"(.*)\")siU", $get, $matches1);
$usr = $matches1[1][0];


    $cookie = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', null, null);
    $csrf = ($cookie[2]['csrftoken']);
    $mid = ($cookie[2]['mid']);
    $igdid = ($cookie[2]['ig_did']);
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password=Alfarz123!&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    
    $headers = [
        'Host: www.instagram.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Connection: close',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email='.$email.'&enc_password='.$password.'&username='.$namre.'+'.$larst.'&first_name='.$namre.'+'.$larst.'&month=2&day=8&year=1991&client_id='.$mid.'&seamless_login_enabled=1';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    if (strpos($regis[1], 'username')) {
        echo "[$no] Username Yang Akan Didaftarkan : $username\n";
    } else {
        echo "[$no] Username Tidak Ada\n";
        break;
    }
    
    
    echo "[!] Input Phone Number : ";
    $phone = trim(fgets(STDIN));
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data= 'client_id='.$mid.'&phone_number='.$phone.'&phone_id=&big_blue_token=';
    $sendCode = curl('https://www.instagram.com/accounts/send_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        goto gagalSms2;
    }
    
    echo "[!] Input Code OTP : ";
    $code = trim(fgets(STDIN));
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'client_id='.$mid.'&phone_number='.$phone.'&sms_code='.$code.'';
    $confirmCode = curl('https://www.instagram.com/accounts/validate_signup_sms_code_ajax/', $data, $headers);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    
    $headers = [
        'Host: www.instagram.com',
        'Cookie: ig_did='.$igdid.'; ig_nrcb=1; csrftoken='.$csrf.'; mid='.$mid.';',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0',
        'Accept: */*',
        'Accept-Language: en-US,en;q=0.5',
        'X-Csrftoken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.instagram.com',
        'Referer: https://www.instagram.com/accounts/emailsignup/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Te: trailers',
    ];
    
    $data = 'enc_password='.$password.'&phone_number='.$phone.'&username='.$username.'&first_name='.$namre.'+'.$larst.'&month=8&day=13&year=1980&sms_code='.$code.'&client_id='.$mid.'&seamless_login_enabled=1&tos_version=eu';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/', $data, $headers);
    
    
    if (strpos($regis[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    
        $headers = [
            'Host: www.instagram.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-CSRFToken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Connection: close',
            'Referer: https://www.instagram.com/accounts/emailsignup/',
            'Cookie: Cookie: ig_did='.$igdid.'; mid='.$mid.'; csrftoken='.$csrf.'',
        ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://www.instagram.com/accounts/login/ajax/', $data, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
} elseif ($pilihan == 4) {
    enterList:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));
    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListtools;
    }

    echo "Username Yang Mau Difollow : ";
    $username = trim(fgets(STDIN));

    echo "\n";
    $no = 1;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://www.instagram.com/accounts/web_create_ajax/attempt/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language: id,en-US;q=0.7,en;q=0.3",
            // 'Accept-Encoding: gzip, deflate',
            "Connection: close",
            "Cookie: ig_did=" .
            $igdid .
            "; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=FRC; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            '; urlgen="{\"125.166.41.46\": 7713}:1kKMPt:68Piy2PtMvleaRjEsHGCMaVyKhQ"',
            "Upgrade-Insecure-Requests: 1",
        ];

        $profile = curlget(
            "https://www.instagram.com/" . $username . "/",
            null,
            $headers
        );
        $pageid = get_between($profile[1], "profilePage_", '"');

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
            "Accept: */*",
            "Accept-Language: id,en-US;q=0.7,en;q=0.3",
            "X-CSRFToken: " . $csrf . "",
            "Content-Type: application/x-www-form-urlencoded",
            "X-Requested-With: XMLHttpRequest",
            "Origin: https://www.instagram.com",
            "Connection: close",
            "Referer: https://www.instagram.com/" . $username . "/",
            "Cookie: ig_did=" .
            $igdid .
            "; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=FRC; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            ';',
        ];

        $headers = [
            'Cookie: ig_did='.$igdid.'; ig_nrcb=1; mid='.$mid.'; csrftoken='.$csrf.'; ds_user_id='.$ds_user_id.'; sessionid='.$sessionid.'',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
            'Accept: */*',
            'Accept-Language: id,en-US;q=0.7,en;q=0.3',
            'X-Csrftoken: '.$csrf.'',
            'Content-Type: application/x-www-form-urlencoded',
            'X-Requested-With: XMLHttpRequest',
            'Origin: https://www.instagram.com',
            'Referer: https://www.instagram.com/itsapriamsyah15/',
            'Sec-Fetch-Dest: empty',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Site: same-origin',
            'Te: trailers',
        ];

        $follow = curl(
            "https://www.instagram.com/web/friendships/" . $pageid . "/follow/",
            null,
            $headers
        );
        $getData = curlget('https://www.instagram.com/accounts/onetap/?next=%2F', null, $headers);
        $unameMu = get_between($getData[1], '"username":"', '","badge_count":"');
        if ($unameMu) {
            if (strpos($follow[0], "302")) {
                echo "[+] ".date('Y-m-d H:i:s')." SUKSES | USERNAME: $unameMu Berhasil Follow $username\n";
                $no++;
            } else {
                echo "[+] Gagal Follow USERNAME: $unameMu\n";
                $no++;
            }
        } else {
            echo "[+] Failure Login\n";
        }
        sleep(10);
    }
} elseif ($pilihan == 5) {
    enterListz:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));

    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListz;
    }

    echo "Url Page : ";
    $url = trim(fgets(STDIN));

    enterlistKomen:
    echo "List Comment : ";
    $comment = trim(fgets(STDIN));
    if (empty($comment) || !file_exists($comment)) {
        echo "File not found !\n";
        goto enterlistKomen;
    }
    echo "\n";

    $no = 1;

    function getKOmen($list)
    {
        $getList = fopen($list, "r");
        $data = [];
        if ($getList) {
            while (($line = fgets($getList)) != false) {
                array_push($data, trim($line));
            }
            fclose($getList);
        }
        return $data;
    }

    $komentar = getKOmen($comment);
    $i = 0;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://www.instagram.com/accounts/web_create_ajax/attempt/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        // foreach (explode("\n", str_replace("\r", "", file_get_contents($comment))) as $key => $akun) {
        //     $pecah = explode("|", trim($akun));
        // $textComment = trim($pecah[0]);
        $textComment = $komentar[$i];

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language: en-US,en;q=0.5",
            "Connection: close",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
            "Upgrade-Insecure-Requests: 1",
            "Cache-Control: max-age=0",
        ];

        $getCookie = curlget($url, null, $headers);
        $mediaid = get_between($getCookie[1], "media?id=", '"');
        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: */*",
            "Accept-Language: en-US,en;q=0.5",
            "X-CSRFToken: " . $csrf . "",
            "Content-Type: application/x-www-form-urlencoded",
            "X-Requested-With: XMLHttpRequest",
            "Origin: https://www.instagram.com",
            "Connection: close",
            "Referer: " . $url . "",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
        ];

        $data = "comment_text=" . $textComment . "&replied_to_comment_id=";
        $commentPost = curl(
            "https://www.instagram.com/web/comments/$mediaid/add/",
            $data,
            $headers
        );
    

        $datajson = json_decode($commentPost[1], true);

        if (strpos($commentPost[1], 'id":"')) {
            echo "[$i] ".date('Y-m-d H:i:s')." SUKSES | USERNAME: ".$datajson['from']['username']." BERHASIL KOMENTAR -> $textComment\n";
            fwrite(fopen("reportkomen.txt", "a"), "".$url."c/".$datajson['id']."\n");
        } else {
            print_r($commentPost[1]);
        }
        unset($komentar[$i]);
        $i++;
        //sleep(30);
        // }
    }
} elseif ($pilihan == 6) {
    enterListman:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));
    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListman;
    }
    echo "Url Foto : ";
    $url = trim(fgets(STDIN));

    echo "\n";

    $no = 1;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://www.instagram.com/accounts/web_create_ajax/attempt/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language: en-US,en;q=0.5",
            "Connection: close",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
            "Upgrade-Insecure-Requests: 1",
            "Cache-Control: max-age=0",
        ];

        $getCookie = curlget($url, null, $headers);
        $mediaid = get_between($getCookie[1], "media?id=", '"');

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0",
            "Accept: */*",
            "Accept-Language: id,en-US;q=0.7,en;q=0.3",
            "X-CSRFToken: " . $csrf . "",
            "Content-Type: application/x-www-form-urlencoded",
            "X-Requested-With: XMLHttpRequest",
            "Origin: https://www.instagram.com",
            "Connection: close",
            "Referer: " . $url . "",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            '; rur=VLL; urlgen="{\"36.70.59.241\": 7713}:1kQVAl:WUMo75HZ8TwyvMFJdhXGqOZcRUA"',
        ];

        $like = curl(
            "https://www.instagram.com/web/likes/" . $mediaid . "/like/",
            null,
            $headers
        );

        $getData = curlget('https://www.instagram.com/accounts/onetap/?next=%2F', null, $headers);
        $unameMu = get_between($getData[1], '"username":"', '","badge_count":"');
        if ($unameMu) {
            if (strpos($like[1], '"ok"}')) {
                echo "".date('Y-m-d H:i:s')." | SUCCESS | USERNAME: $unameMu Like Postingan $url\n";
            } else {
                echo "[+] Gagal Like $url\n";
            }
        } ELSE {
            echo "[+] Failure Login\n";
        }
    }
} elseif ($pilihan == 7) {
    echo "\e[0;32m[+] Reporting Instagram Tools\n\n\n\e[0m";

    echo "\e[0;32m[1] Reporting Post Tools\n\e[0m";
    echo "\e[0;32m[2] Reporting Account Tools\n\e[0m";
    echo "\e[0;32m[3] Get Cookie [ Login First ] \e[0m";

    echo "\n\n[+] Input Tools : ";
    $pilihan = trim(fgets(STDIN));
    echo "\n";
    if ($pilihan == "1") {
        error_reporting(0);
        enterListcc:
        echo "List Cookie : ";
        $xyz = trim(fgets(STDIN));
        echo "Target      : ";
        $target = trim(fgets(STDIN));

        if (empty($xyz) || !file_exists($xyz)) {
            echo "File not found !" . PHP_EOL;
            goto enterListcc;
        }

        $cookie = curl(
            "https://www.instagram.com/accounts/web_create_ajax/attempt/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        foreach (
            explode("\n", str_replace("\r", "", file_get_contents($xyz)))
            as $key => $akun
        ) {
            $pecah = explode("|", trim($akun));
            $ds_user_id = trim($pecah[0]);
            $sessionid = trim($pecah[1]);

            $headers = [
                "Host: www.instagram.com",
                "Cookie: ig_did=" .
                $igdid .
                "; ig_nrcb=1; csrftoken=" .
                $csrf .
                "; mid=" .
                $mid .
                "; ds_user_id=" .
                $ds_user_id .
                "; sessionid=" .
                $sessionid .
                '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660048292:01f7df331045380750fad55dc4fefb485c7388b4f8d6f241527e6e71374dbbf05aedbec4"',
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                "Accept: */*",
                "Accept-Language: en-US,en;q=0.5",
                "X-Csrftoken: " . $csrf . "",
                "Content-Type: application/x-www-form-urlencoded",
                "X-Requested-With: XMLHttpRequest",
                "Origin: https://www.instagram.com",
                "Referer: " . $target . "",
                "Sec-Fetch-Dest: empty",
                "Sec-Fetch-Mode: cors",
                "Sec-Fetch-Site: same-origin",
                "Te: trailers",
            ];

            $data =
                "entry_point=1&location=6&object_type=1&object_id=2636300504829032245&container_module=postPage&frx_prompt_request_type=1";
            $getCookie = curl(
                "https://www.instagram.com/reports/web/get_frx_prompt/",
                $data,
                $headers
            );
            $type = get_between_array($getCookie[1], '"tag_type":"', '",');
            echo "\n[+] Type Report Found\n\n";
            for ($i = 0; $i < count($type); $i++) {
                echo "[$i] $type[$i]\n";
            }
            echo "\n[+} Use Tools      : ";
            $repo = trim(fgets(STDIN));

            foreach (
                explode("\n", str_replace("\r", "", file_get_contents($xyz)))
                as $key => $akun
            ) {
                $pecah = explode("|", trim($akun));
                $ds_user_id = trim($pecah[0]);
                $sessionid = trim($pecah[1]);

            if ($ds_user_id) {
                echo "\n[+] Progress...\n";

                $headers = [
                    "Host: www.instagram.com",
                    'Cookie: ig_did=0DD83E53-DBE8-4353-887A-65CC1BC1548B; ig_nrcb=1; csrftoken=1306e8cLlCtMTxPwUhO6tvp48Yv7L2Hi; mid=YSdRAgALAAHzBQhOtXzwSx_bNglg; rur="PRN\05449463386128\0541661860662:01f79e7bc05a93af66c5eef4045290d356dbfa15f2d92ceacadff926cfffd645d7524e9f"; ds_user_id=' .
                    $ds_user_id .
                    "; sessionid=" .
                    $sessionid .
                    "",
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0",
                    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
                    "Accept-Language: en-US,en;q=0.5",
                    "Upgrade-Insecure-Requests: 1",
                    "Sec-Fetch-Dest: document",
                    "Sec-Fetch-Mode: navigate",
                    "Sec-Fetch-Site: none",
                    "Sec-Fetch-User: ?1",
                    "Te: trailers",
                ];

                $getPost = curlget("" . $target . "", null, $headers);
                $media = get_between($getPost[1], "/media?id=", '" />');

                $headers = [
                    "Host: www.instagram.com",
                    "Cookie: ig_did=" .
                    $igdid .
                    "; ig_nrcb=1; csrftoken=" .
                    $csrf .
                    "; mid=" .
                    $mid .
                    "; ds_user_id=" .
                    $ds_user_id .
                    "; sessionid=" .
                    $sessionid .
                    '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660048292:01f7df331045380750fad55dc4fefb485c7388b4f8d6f241527e6e71374dbbf05aedbec4"',
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                    "Accept: */*",
                    "Accept-Language: en-US,en;q=0.5",
                    "X-Csrftoken: " . $csrf . "",
                    "Content-Type: application/x-www-form-urlencoded",
                    "X-Requested-With: XMLHttpRequest",
                    "Origin: https://www.instagram.com",
                    "Referer: " . $target . "",
                    "Sec-Fetch-Dest: empty",
                    "Sec-Fetch-Mode: cors",
                    "Sec-Fetch-Site: same-origin",
                    "Te: trailers",
                ];

                $data =
                    "entry_point=1&location=6&object_type=1&object_id=2636300504829032245&container_module=postPage&frx_prompt_request_type=1";
                $getCookie = curl(
                    "https://www.instagram.com/reports/web/get_frx_prompt/",
                    $data,
                    $headers
                );
                $type = get_between_array($getCookie[1], '"tag_type":"', '",');
                $getCookie = json_decode($getCookie[1]);
                $context = $getCookie->response->context;

                if ($media) {
                    echo "\n[+] Media Found : $media\n";
                } else {
                    echo "\n[+] Cookie Death\n";
                    break;
                }
                    
                $headers = [
                    "Host: www.instagram.com",
                    "Cookie: ig_did=" .
                    $igdid .
                    "; ig_nrcb=1; csrftoken=" .
                    $csrf .
                    "; mid=" .
                    $mid .
                    "; ds_user_id=" .
                    $ds_user_id .
                    "; sessionid=" .
                    $sessionid .
                    '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660048305:01f7721e73e8f4606376250c56b6eddc1546ed6bb9c6a48f5243ac0da5ffdcb42cb34669"',
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                    "Accept: */*",
                    "Accept-Language: en-US,en;q=0.5",
                    "X-Csrftoken: " . $csrf . "",
                    "Content-Type: application/x-www-form-urlencoded",
                    "X-Requested-With: XMLHttpRequest",
                    "Origin: https://www.instagram.com",
                    "Referer: " . $target . "",
                    "Sec-Fetch-Dest: empty",
                    "Sec-Fetch-Mode: cors",
                    "Sec-Fetch-Site: same-origin",
                    "Te: trailers",
                ];

                $data =
                    "entry_point=1&location=6&object_type=1&object_id=" .
                    $media .
                    "&container_module=postPage&context=" .
                    $context .
                    "&selected_tag_types=%5B%22" .
                    $type[$repo] .
                    "%22%5D&frx_prompt_request_type=2";
                $reports = curl(
                    "https://www.instagram.com/reports/web/get_frx_prompt/",
                    $data,
                    $headers
                );
                $info = get_between($reports[1], 'title":{"text":"', '"},"');
                echo "[+] From $ds_user_id Report Page : $target Information : $info\n";
            } else {
                echo "\n[+] Done...\n";
                die;
            }
        }
        }
    }  elseif ($pilihan == "2") {
        error_reporting(0);
        echo "List Cookie : ";
        $xyz = trim(fgets(STDIN));
        echo "Target      : ";
        $target = trim(fgets(STDIN));

        if (empty($xyz) || !file_exists($xyz)) {
            echo "File not found !" . PHP_EOL;
            goto enterList;
        }

        foreach (
            explode("\n", str_replace("\r", "", file_get_contents($xyz)))
            as $key => $akun
        ) {
            $pecah = explode("|", trim($akun));
            $ds_user_id = trim($pecah[0]);
            $sessionid = trim($pecah[1]);

            $headers = [
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0",
                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
                "Accept-Language: en-US,en;q=0.5",
                "Upgrade-Insecure-Requests: 1",
                "Sec-Fetch-Dest: document",
                "Sec-Fetch-Mode: navigate",
                "Sec-Fetch-Site: none",
                "Sec-Fetch-User: ?1",
                "Te: trailers",
                'Cookie: ig_did=0DD83E53-DBE8-4353-887A-65CC1BC1548B; ig_nrcb=1; csrftoken=1306e8cLlCtMTxPwUhO6tvp48Yv7L2Hi; mid=YSdRAgALAAHzBQhOtXzwSx_bNglg; rur="PRN\05449463386128\0541661859565:01f7e7d93d61fba53221fb8adbd12dc0aecaf915f7e770484fd4a6088fc980e5bca64be4"; ds_user_id=' .
                $ds_user_id .
                "; sessionid=" .
                $sessionid .
                "",
            ];

            $getCookie = curlget("" . $target . "", null, $headers);
            $userid = get_between(
                $getCookie[1],
                '"owner":{"id":"',
                '","username"'
            );
            $username = get_between(
                $getCookie[1],
                '"' . $userid . '","username":"',
                '"},"is_video":'
            );

            if ($userid) {
                echo "\n[+] $userid Has Found\n";
                echo "[+] $username Waiting For Reporting\n";
            } else {
                echo "\n[+] Error\n";
            }

            $cookie = curl(
                "https://www.instagram.com/accounts/web_create_ajax/attempt/",
                null,
                null
            );
            $csrf = $cookie[2]["csrftoken"];
            $mid = $cookie[2]["mid"];
            $igdid = $cookie[2]["ig_did"];

            $headers = [
                "Host: www.instagram.com",
                "Cookie: ig_did=75FCA0D5-DE33-42A2-BB7A-F5FA1F118F83; ig_nrcb=1; csrftoken=lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b; mid=YREMwwALAAGeT4xkc05d31epoVjr; ds_user_id=" .
                $ds_user_id .
                "; sessionid=" .
                $sessionid .
                '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660051471:01f777fa0a495c36d83bf568a7e16fa5c47d4042f48a5a76307b4076b0b0dfe0c6a6ff44"',
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                "Accept: */*",
                "Accept-Language: en-US,en;q=0.5",
                "X-Csrftoken: lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b",
                "Content-Type: application/x-www-form-urlencoded",
                "X-Requested-With: XMLHttpRequest",
                "Origin: https://www.instagram.com",
                "Referer: https://www.instagram.com/" . $username . "/",
                "Sec-Fetch-Dest: empty",
                "Sec-Fetch-Mode: cors",
                "Sec-Fetch-Site: same-origin",
                "Te: trailers",
            ];

            $data =
                "entry_point=1&location=2&object_type=5&object_id=" .
                $userid .
                "&container_module=profilePage&frx_prompt_request_type=1";
            $getCookie = curl(
                "https://www.instagram.com/reports/web/get_frx_prompt/",
                $data,
                $headers
            );
            $type = get_between_array($getCookie[1], '"tag_type":"', '",');
            $getCookie = json_decode($getCookie[1]);
            $context = $getCookie->response->context;
            echo "\n";
            echo "\e[0;32m[+] List Report First Tools\e[0m\n\n";
            for ($i = 0; $i < count($type); $i++) {
                if ($type[$i]) {
                    echo "[$i] $type[$i]\n";
                } else {
                    echo "\n[+] Type Report Not Found\n\n";
                }
            }
            enterLi:
            echo "\n[+] Type Report : ";
            $repo = trim(fgets(STDIN));
            if ($repo < count($type)) {
            } else {
                echo "[+] Please Input Again\n";
                goto enterLi;
            }
            $headers = [
                "Host: www.instagram.com",
                "Cookie: ig_did=75FCA0D5-DE33-42A2-BB7A-F5FA1F118F83; ig_nrcb=1; csrftoken=lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b; mid=YREMwwALAAGeT4xkc05d31epoVjr; ds_user_id=" .
                $ds_user_id .
                "; sessionid=" .
                $sessionid .
                '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660051472:01f7c49bc9eee68b96408f8edf1bb6271ce8a15af4aeb81e94c27cf8be174c713cf10535"',
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                "Accept: */*",
                "Accept-Language: en-US,en;q=0.5",
                "X-Csrftoken: lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b",
                "Content-Type: application/x-www-form-urlencoded",
                "X-Requested-With: XMLHttpRequest",
                "Origin: https://www.instagram.com",
                "Referer: https://www.instagram.com/" . $username . "/",
                "Sec-Fetch-Dest: empty",
                "Sec-Fetch-Mode: cors",
                "Sec-Fetch-Site: same-origin",
                "Te: trailers",
            ];

            $data =
                "entry_point=1&location=2&object_type=5&object_id=" .
                $userid .
                "&container_module=profilePage&context=" .
                $context .
                "&selected_tag_types=%5B%22" .
                $type[$repo] .
                "%22%5D&frx_prompt_request_type=2";
            $nextReport = curl(
                "https://www.instagram.com/reports/web/get_frx_prompt/",
                $data,
                $headers
            );
            $type = get_between_array($nextReport[1], '"tag_type":"', '",');
            $getCookie = json_decode($nextReport[1]);
            $context = $getCookie->response->context;
            echo "\n";
            for ($i = 0; $i < count($type); $i++) {
                if ($type[$i]) {
                    echo "[$i] $type[$i]\n";
                } else {
                    echo "\n[+] Type Report Not Found\n\n";
                }
            }

            enterListzz:
            echo "\n[+] Type Report : ";
            $repo = trim(fgets(STDIN));
            if ($repo < count($type)) {
            } else {
                echo "[+] Please Input Again\n";
                goto enterListzz;
            }

            $headers = [
                "Host: www.instagram.com",
                "Cookie: ig_did=75FCA0D5-DE33-42A2-BB7A-F5FA1F118F83; ig_nrcb=1; csrftoken=lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b; mid=YREMwwALAAGeT4xkc05d31epoVjr; ds_user_id=" .
                $ds_user_id .
                "; sessionid=" .
                $sessionid .
                '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660051472:01f7c49bc9eee68b96408f8edf1bb6271ce8a15af4aeb81e94c27cf8be174c713cf10535"',
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                "Accept: */*",
                "Accept-Language: en-US,en;q=0.5",
                "X-Csrftoken: lN2GJJqzWzhMzTRJiBifmx04G9ZiT68b",
                "Content-Type: application/x-www-form-urlencoded",
                "X-Requested-With: XMLHttpRequest",
                "Origin: https://www.instagram.com",
                "Referer: https://www.instagram.com/" . $username . "/",
                "Sec-Fetch-Dest: empty",
                "Sec-Fetch-Mode: cors",
                "Sec-Fetch-Site: same-origin",
                "Te: trailers",
            ];

            $data =
                "entry_point=1&location=2&object_type=5&object_id=" .
                $userid .
                "&container_module=profilePage&context=" .
                $context .
                "&selected_tag_types=%5B%22" .
                $type[$repo] .
                "%22%5D&frx_prompt_request_type=2";
            $nextReport = curl(
                "https://www.instagram.com/reports/web/get_frx_prompt/",
                $data,
                $headers
            );
            $type = get_between_array($nextReport[1], '"tag_type":"', '",');
            $getCookie = json_decode($nextReport[1]);
            $context = $getCookie->response->context;
            echo "\n[+] Type Report Found\n\n";
            for ($i = 0; $i < count($type); $i++) {
                echo "[$i] $type[$i]\n";
            }

            enterListzcc:
            echo "\n[+] Type Report : ";
            $repo = trim(fgets(STDIN));
            if ($repo < count($type)) {
            } else {
                echo "[+] Please Input Again\n";
                goto enterListzcc;
            }

            echo "\n";

            while (true) {
                foreach (
                    explode(
                        "\n",
                        str_replace("\r", "", file_get_contents($xyz))
                    )
                    as $key => $akun
                ) {
                    $pecah = explode("|", trim($akun));
                    $ds_user_id = trim($pecah[0]);
                    $sessionid = trim($pecah[1]);
                    if ($ds_user_id) {
                        echo "\n[+] Progress...\n";

                        $headers = [
                            "Host: www.instagram.com",
                            "Cookie: ig_did=" .
                            $igdid .
                            "; ig_nrcb=1; csrftoken=" .
                            $csrf .
                            "; mid=" .
                            $mid .
                            "; ds_user_id=" .
                            $ds_user_id .
                            "; sessionid=" .
                            $sessionid .
                            '; shbid="12158\0548187754200\0541660043361:01f7ea7beb02554383ce915a7292e92b3359f4d1a379c6d85b5101524bdc9193f1994a24"; shbts="1628507361\0548187754200\0541660043361:01f784a9049ec643c91a40f2660bbd4d7d7ad85f55eea47a15a77cb9ba5e913577694600"; rur="ATN\0548187754200\0541660051472:01f7c49bc9eee68b96408f8edf1bb6271ce8a15af4aeb81e94c27cf8be174c713cf10535"',
                            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
                            "Accept: */*",
                            "Accept-Language: en-US,en;q=0.5",
                            "X-Csrftoken: " . $csrf . "",
                            "Content-Type: application/x-www-form-urlencoded",
                            "X-Requested-With: XMLHttpRequest",
                            "Origin: https://www.instagram.com",
                            "Referer: https://www.instagram.com/" .
                            $username .
                            "/",
                            "Sec-Fetch-Dest: empty",
                            "Sec-Fetch-Mode: cors",
                            "Sec-Fetch-Site: same-origin",
                            "Te: trailers",
                        ];

                        $data =
                            "entry_point=1&location=2&object_type=5&object_id=" .
                            $userid .
                            "&container_module=profilePage&context=" .
                            $context .
                            "&selected_tag_types=%5B%22" .
                            $type[$repo] .
                            "%22%5D&frx_prompt_request_type=2";
                        $lastReport = curl(
                            "https://www.instagram.com/reports/web/get_frx_prompt/",
                            $data,
                            $headers
                        );
                        $info = get_between(
                            $lastReport[1],
                            'title":{"text":"',
                            '"},"'
                        );
                        echo "[+] From $ds_user_id Report Page : $target User ID : $userid Information : $info\n";
                    } else {
                        echo "\n[+] Done...\n";
                        die();
                    }
                }
            }
        }
    }  elseif ($pilihan == "3") {
        error_reporting(0);

        $no = 1;

        enterListxx:
        echo "List Akun Yang Sudah Terdaftar : ";
        $xyz = trim(fgets(STDIN));

        if (empty($xyz) || !file_exists($xyz)) {
            echo "File not found !" . PHP_EOL;
            goto enterListxx;
        }

        foreach (
            explode("\n", str_replace("\r", "", file_get_contents($xyz)))
            as $key => $akun
        ) {
            $pecah = explode("|", trim($akun));
            $email = trim($pecah[0]);
            $passwod = trim($pecah[1]);

            $unixTimestamp = time();
            $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
            $unixTimestamp = strtotime($mysqlTimestamp);
            $password =
                "#PWD_INSTAGRAM_BROWSER:0:" .
                $unixTimestamp .
                ":" .
                $passwod .
                "";

            $cookie = curl(
                "https://www.instagram.com/accounts/web_create_ajax/attempt/",
                null,
                null
            );
            $csrf = $cookie[2]["csrftoken"];
            $mid = $cookie[2]["mid"];
            $igdid = $cookie[2]["ig_did"];

            $cookie = curl(
                "https://www.instagram.com/accounts/web_create_ajax/attempt/",
                null,
                null
            );
            $csrf = $cookie[2]["csrftoken"];
            $mid = $cookie[2]["mid"];
            $igdid = $cookie[2]["ig_did"];

            $headers = [
                "Host: www.instagram.com",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
                "Accept: */*",
                "Accept-Language: id,en-US;q=0.7,en;q=0.3",
                "X-CSRFToken: " . $csrf . "",
                "Content-Type: application/x-www-form-urlencoded",
                "X-Requested-With: XMLHttpRequest",
                "Origin: https://www.instagram.com",
                "Connection: close",
                "Referer: https://www.instagram.com/accounts/emailsignup/",
                "Cookie: Cookie: ig_did=" .
                $igdid .
                "; mid=" .
                $mid .
                "; csrftoken=" .
                $csrf .
                "",
            ];

            $data =
                "username=" .
                $email .
                "&enc_password=" .
                $password .
                "&queryParams=%7B%7D&optIntoOneTap=false";
            $login = curl(
                "https://www.instagram.com/accounts/login/ajax/",
                $data,
                $headers
            );
            $ds_user_id = $login[2]["ds_user_id"];
            $sessionid = $login[2]["sessionid"];
            if (strpos($login[1], "userId")) {
                echo "[$no] ".date('Y-m-d H:i:s')." | SUKSES LOGIN ! | username : $email\n";
                fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
                $no++;
            } elseif (
                strpos(
                    $login[1],
                    "Harap tunggu beberapa menit sebelum mencoba lagi."
                )
            ) {
                echo "[$no] Harap tunggu beberapa menit sebelum mencoba lagi.\n";
                die();
                $no++;
            } else {
                echo "[$no] $email|$password Information : $login[1]\n";
                $no++;
            }
        }
    }
}
elseif ($pilihan == 10) {
    enterList2:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));
    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListtools;
    }

    echo "Username Yang Mau Difollow : ";
    $username = trim(fgets(STDIN));

    echo "\n";
    $no = 1;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://accounts.google.com/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        


        $profile = curlget(
            "" . $username . "",
            null,
            null
        );
        $pageid = get_between($profile[1], "profilePage_", '"');

        sleep(60);
        $unameMu = get_between($getData[1], '"username":"', '","badge_count":"');
        if ($unameMu) {
            if (strpos($follow[0], "302")) {
                echo "[+] ".date('Y-m-d H:i:s')." SUKSES | USERNAME: $unameMu Berhasil SUBSCRIBE $username\n";
                $no++;
            } else {
                echo "[+] Gagal Follow VIEW COMPLETE: $unameMu\n";
                $no++;
            }
        } else {
            echo "[+] Failure Login\n";
        }
        sleep(10);
    }
}elseif ($pilihan == 11) {
    enterListzxtz:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));

    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListzxtz;
    }

    echo "Url Page : ";
    $url = trim(fgets(STDIN));

    enterlistKomen555:
    echo "List Comment : ";
    $comment = trim(fgets(STDIN));
    if (empty($comment) || !file_exists($comment)) {
        echo "File not found !\n";
        goto enterlistKomen555;
    }
    echo "\n";

    $no = 1;

    function getKOmen($list)
    {
        $getList = fopen($list, "r");
        $data = [];
        if ($getList) {
            while (($line = fgets($getList)) != false) {
                array_push($data, trim($line));
            }
            fclose($getList);
        }
        return $data;
    }

    $komentar = getKOmen($comment);
    $i = 0;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);


        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        // foreach (explode("\n", str_replace("\r", "", file_get_contents($comment))) as $key => $akun) {
        //     $pecah = explode("|", trim($akun));
        // $textComment = trim($pecah[0]);
        $textComment = $komentar[$i];

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language: en-US,en;q=0.5",
            "Connection: close",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
            "Upgrade-Insecure-Requests: 1",
            "Cache-Control: max-age=0",
        ];

        $getCookie = curlget($url, null, $headers);
        $mediaid = get_between($getCookie[1], "media?id=", '"');
        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: */*",
            "Accept-Language: en-US,en;q=0.5",
            "X-CSRFToken: " . $csrf . "",
            "Content-Type: application/x-www-form-urlencoded",
            "X-Requested-With: XMLHttpRequest",
            "Origin: https://www.instagram.com",
            "Connection: close",
            "Referer: " . $url . "",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
        ];

        $data = "comment_text=" . $textComment . "&replied_to_comment_id=";
        $commentPost = curl(
            "https://instagram.com/" . $url . "",
            $data,
            $headers
        );
    sleep(1);

        $datajson = json_decode($commentPost[1], true);

        if (strpos($commentPost[1], 'id":"')) {
            echo "[$i] ".date('Y-m-d H:i:s')." SUKSES | USERNAME: ".$datajson['from']['username']." VIEW COMPLETE \n";
            fwrite(fopen("reportkomen.txt", "a"), "".$url."c/".$datajson['id']."\n");
        } else {
            print_r($commentPost[1]);
        }
        unset($komentar[$i]);
        $i++;
        //sleep(30);
        // }
    }
}
elseif ($pilihan == 9) {
    error_reporting(0);
    enterList1:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));
    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListtools;
    }

    echo "Username Yang Mau Difollow : ";
    $username = trim(fgets(STDIN));

    echo "\n";
    $no = 1;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://accounts.google.com/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        


        $profile = curlget(
            "https://youtube.com/" . $username . "/",
            null,
            null
        );
        $pageid = get_between($profile[1], "profilePage_", '"');

        

        $folow = curl(
            "https://www.youtube.com/youtubei/v1/subscription/subscribe",
        );
        $getData = curlget('https://www.youtube.com/youtubei/v1/subscription/subscribe', $data, $headers);

       $folow = curl(
            "https://www.youtube.com/youtubei/v1/subscription/subscribe?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8&prettyPrint=false",
        );
        $getData = curlget('https://www.youtube.com/youtubei/v1/subscription/subscribe?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8&prettyPrint=false', null, null);
        $unameMu = get_between($getData[1], '"username":"', '","badge_count":"');
        if ($unameMu) {
            if (strpos($follow[0], "302")) {
                echo "[+] ".date('Y-m-d H:i:s')." SUKSES | USERNAME: $unameMu Berhasil SUBSCRIBE $username\n";
                $no++;
            } else {
                echo "[+] Gagal Follow USERNAME: $unameMu\n";
                $no++;
            }
        } else {
            echo "[+] Failure Login\n";
        }
        sleep(10);
    }
}
elseif ($pilihan == 8) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With Manual Phone Number\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";
    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';

    while(true) {
    gagalSms3:
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=es');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$namre = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$larst = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"username\":\"(.*)\")siU", $get, $matches1);
$usr = $matches1[1][0];


    
    $csrf = ($cookie[2]['csrftoken']);
    $mid = ($cookie[2]['mid']);
    $igdid = ($cookie[2]['ig_did']);
    

    
    $data = 'username='.$usr.'&firstName='.$namre.'&lastName='.$larst.'&Passwd='.$password.'&ConfirmPasswd='.$password.'';
    $regis = curl('https://accounts.google.com/signup/v2/webcreateaccount?flowName=GlifWebSignIn&flowEntry=SignUp&hl=en', $data);
    $username = get_between($regis[1], 'suggestions": ["', '", "');
    
    if (strpos($regis[1], 'username')) {
        echo "[$no] Username Yang Akan Didaftarkan : $username\n";
    } else {
        echo "[$no] Username Tidak Ada\n";
        break;
    }
    
    
    echo "[!] Input Phone Number : ";
    $phone = trim(fgets(STDIN));

    
    $data= 'phoneNumberId='.$phone.'';
    $sendCode = curl('https://accounts.google.com/signup/v2/webgradsidvphone', $data);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        goto gagalSms3;
    }
    
    echo "[!] Input Code OTP : ";
    $code = trim(fgets(STDIN));

    
    $data = 'code='.$code.'';
    $confirmCode = curl('https://accounts.google.com/signup/v2/webgradsidvverify', $data, $headers);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    

    $data = 'email=jiignar121jii@gmail.com&year=2001&day=12&month=12&gender=male&';
    $regis = curl('https://accounts.google.com/signup/v2/webpersonaldetails', $data);
    
	
    $regis = curl('https://accounts.google.com/signup/v2/webtermsofservice');
    
	$regis1 = curl('https://accounts.google.com/signup/v2/webtermsofservice?flowName=GlifWebSignIn&flowEntry=SignUp&hl=en');
	
	
    if (strpos($regis1[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    

    
        $login = curl('https://accounts.google.com/');
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    

        $login = curl('https://accounts.google.com/');;
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
}
elseif ($pilihan == 12) {
    enterListmnan:
    echo "List Cookie : ";
    $xyz = trim(fgets(STDIN));
    if (empty($xyz) || !file_exists($xyz)) {
        echo "File not found !" . PHP_EOL;
        goto enterListmnan;
    }
    echo "Url reel : ";
    $url = trim(fgets(STDIN));

    echo "\n";

    $no = 1;
    foreach (
        explode("\n", str_replace("\r", "", file_get_contents($xyz)))
        as $key => $akun
    ) {
        $pecah = explode("|", trim($akun));
        $ds_user_id = trim($pecah[0]);
        $sessionid = trim($pecah[1]);

        $cookie = curl(
            "https://www.instagram.com/accounts/web_create_ajax/attempt/",
            null,
            null
        );
        $csrf = $cookie[2]["csrftoken"];
        $mid = $cookie[2]["mid"];
        $igdid = $cookie[2]["ig_did"];

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language: en-US,en;q=0.5",
            "Connection: close",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; rur=PRN; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            "",
            "Upgrade-Insecure-Requests: 1",
            "Cache-Control: max-age=0",
        ];

        $getCookie = curlget($url, null, $headers);
        $mediaid = get_between($getCookie[1], "media?id=", '"');
        $igshid = get_between($getCookie[1], "igshid?id=", '"');

        $headers = [
            "Host: www.instagram.com",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0",
            "Accept: */*",
            "Accept-Language: id,en-US;q=0.7,en;q=0.3",
            "X-CSRFToken: " . $csrf . "",
            "Content-Type: application/x-www-form-urlencoded",
            "X-Requested-With: XMLHttpRequest",
            "Origin: https://www.instagram.com",
            "Connection: close",
            "Referer: " . $url . "",
            "Cookie: ig_did=" .
            $igdid .
            "; ig_nrcb=1; csrftoken=" .
            $csrf .
            "; mid=" .
            $mid .
            "; ds_user_id=" .
            $ds_user_id .
            "; sessionid=" .
            $sessionid .
            '; rur=VLL; urlgen="{\"36.70.59.241\": 7713}:1kQVAl:WUMo75HZ8TwyvMFJdhXGqOZcRUA"',
        ];

        $like = curl(
            "https://www.instagram.com/reel/" . $mediaid . "/",
            null,
            $headers
        );

        $getData = curlget('https://www.instagram.com/accounts/onetap/?next=%2F', null, $headers);
        $unameMu = get_between($getData[1], '"username":"', '","badge_count":"');
        if ($unameMu) {
            if (strpos($like[1], '"ok"}')) {
                echo "".date('Y-m-d H:i:s')." | SUCCESS | USERNAME: $unameMu View Postingan $url\n";
            } else {
                echo "[+] Gagal View $url\n";
            }
        } ELSE {
            echo "[+] Failure Login\n";
        }
    }
} 
elseif ($pilihan == 13) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With Manual Phone Number\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";
    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';

    while(true) {
    gagalSms4:
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=es');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$namre = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$larst = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"username\":\"(.*)\")siU", $get, $matches1);
$usr = $matches1[1][0];


    $cookie = curl('https://accounts.google.com/signup/v2/webcreateaccount?flowName=GlifWebSignIn&flowEntry=SignUp&hl=en', null, null);
    $csrf = ($cookie[2]['csrftoken']);
    $mid = ($cookie[2]['mid']);
    $igdid = ($cookie[2]['ig_did']);
    
    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'username='.$usr.'&firstName='.$namre.'&lastName='.$larst.'&Passwd='.$password.'&ConfirmPasswd='.$password.'';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, $headers);
    
    
    echo "[!] Input Phone Number : ";
    $phone = trim(fgets(STDIN));
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'phoneNumberId='.$phone.'';
    $regis = curl('https://accounts.google.com/signup/v2/webgradsidvphone', $data, $headers);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        goto gagalSms4;
    }
    
    echo "[!] Input Code OTP : ";
    $code = trim(fgets(STDIN));
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'code='.$code.'';
    $confirmCode = curl('https://accounts.google.com/signup/v2/webgradsidvverify', $data, $headers);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email=jiignar121jii@gmail.com&year=2001&day=12&month=12&gender=male&';
    $regis = curl('https://accounts.google.com/signup/v2/webpersonaldetails', $data, $headers);

    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = '';
    $regis = curl('https://accounts.google.com/signup/v2/webtermsofservice', null, $headers);

    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = '';
    $regis = curl('https://accounts.google.com/signup/v2/webtermsofservice?flowName=GlifWebSignIn&flowEntry=SignUp&hl=en', null, $headers);

    
    if (strpos($regis[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://accounts.google.com/', null, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://accounts.google.com/', null, $headers);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
} 
elseif ($pilihan == 14) {
    error_reporting(0);
    $no = 1;
    echo "[+] \e[0;32mInstagram Creator With Manual Phone Number\e[0m\n";
    echo "[+] \e[0;32mAYANG\e[0m\n";
    
    echo "[+] Password for the account you want to create : ";
    $passwod = trim(fgets(STDIN));
    $unixTimestamp = time();
    $mysqlTimestamp = date("Y-m-d H:i:s", $unixTimestamp);
    $unixTimestamp = strtotime($mysqlTimestamp);
    $password = '#PWD_INSTAGRAM_BROWSER:0:'.$unixTimestamp.':'.$passwod.'';

    while(true) {
    gagalSms22:
    $nama = explode(" ", nama());
    $nama1 = $nama[0];
    $nama2 = $nama[1];
    $hasil_1= acak(2);
    $hasil_5= acak(5);


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=es');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$namre = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$larst = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"username\":\"(.*)\")siU", $get, $matches1);
$usr = $matches1[1][0];


    
    
    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'username='.$usr.'&firstName='.$namre.'&lastName='.$larst.'&Passwd='.$password.'&ConfirmPasswd='.$password.'';
    $regis = curl('https://www.instagram.com/accounts/web_create_ajax/attempt/', $data, null);
    
    
    echo "[!] Input Phone Number : ";
    $phone = trim(fgets(STDIN));
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'phoneNumberId='.$phone.'';
    $regis = curl('https://accounts.google.com/signup/v2/webgradsidvphone', $data, null);
    if (strpos($sendCode[1], '"sms_sent":true')) {
        echo "[+] Send Code Successfully\n";
    } else if(strpos($sendCode[1], 'status":"ok"')) {
        echo "[+] Send Code Successfully\n";
    } else {
        echo "[+] Failure Send SMS\n";
        goto gagalSms22;
    }
    
    echo "[!] Input Code OTP : ";
    $code = trim(fgets(STDIN));
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'code='.$code.'';
    $confirmCode = curl('https://accounts.google.com/signup/v2/webgradsidvverify', $data, null);
    if (strpos($sendCode[1], 'verified":true,')) {
        echo "[+] Code Successfully\n";
    } else if(strpos($sendCode[1], '"status":"ok"')) {
        echo "[+] Code Successfully\n";
    } else {
        echo "[+] Failure Code\n";
    }
    
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = 'email=jiignar121jii@gmail.com&year=2001&day=12&month=12&gender=male&';
    $regis = curl('https://accounts.google.com/signup/v2/webpersonaldetails', $data, null);

    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = '';
    $regis = curl('https://accounts.google.com/signup/v2/webtermsofservice', null, null);

    $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
    $data = '';
    $regis = curl('https://accounts.google.com/signup/v2/webtermsofservice?flowName=GlifWebSignIn&flowEntry=SignUp&hl=en', null, null);

    
    if (strpos($regis[1], 'account_created":true')) {
        echo "[+] $username|$passwod Successfully Created Saved to akuninstagram.txt\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod\n");
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://accounts.google.com/', null, null);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    
    } else if (strpos($regis[1], '"status":"ok"')) {
        echo "[+] $username|$passwod Successfully Created\n";
        fwrite(fopen("akuninstagram.txt", "a"), "$username|$passwod|$phone\n");
    
        $headers = [
        'Host: www.google.com',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36',
        'Accept: */*',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'X-CSRFToken: '.$csrf.'',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://www.google.com',
        'Connection: close',
        'Referer: https://www.google.com/',
        #'Cookie: ig_did='.$igdid.'; csrftoken='.$csrf.'; mid='.$mid.'',
    ];
    
        $data = 'username='.$username.'&enc_password='.$password.'&queryParams=%7B%7D&optIntoOneTap=false';
        $login = curl('https://accounts.google.com/', null, null);
        $ds_user_id = ($login[2]['ds_user_id']);
        $sessionid = ($login[2]['sessionid']);
    
        if (strpos($login[1], 'userId')) {
            echo "[+] Database Cookie Telah Tersimpan Di dbcookie.txt\n\n";
            fwrite(fopen("dbcookie.txt", "a"), "$ds_user_id|$sessionid\n");
        } elseif (strpos($login[1], 'Harap tunggu beberapa menit sebelum mencoba lagi.')) {
            echo "[+] Harap tunggu beberapa menit sebelum mencoba lagi.\n"; die;
        } else {
            echo "[+] $email|$password Information : $login[1]\n";
        }
    } else {
        echo "[+] $username|$passwod Failure Created\n\n";
        print_r($login);
    }
    $no++;
    }
} 
