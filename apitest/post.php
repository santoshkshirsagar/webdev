<?php
		$data['title']="title from core php";
        $body=json_encode($data);

        $timeout=30;
        $verify_ssl   = false;
        $headers = array(
                        'Content-Type: application/json',
                        'Cache-Control: no-cache',
                        'Content-Length: '.strlen($body)
                        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/api/task');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verify_ssl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        //echo $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        //$obj=json_decode($result);
        echo $result;