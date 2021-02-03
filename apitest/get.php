<?php
$url="http://127.0.0.1:8000/api/task";
		$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            //curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($ch);
            //echo "<br/>".$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch); 
			
			$obj = json_decode($data);
			foreach($obj as $row){
				echo $row->id."-".$row->title."<br/>";
			}