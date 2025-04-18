<?php
  require 'function.php'; 
  $data_web = query("SELECT * FROM datawebsite WHERE status = 1 ORDER BY id desc");
  
  if ($data_web === false) {
        // Handle the database query error here.
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Database query failed']);
    } else {
        $data = [];
        $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        $host = $_SERVER['HTTP_HOST'];
        $protocol = $isHttps ? 'https://' : 'http://';
        
        foreach($data_web as $key=>$value){
            $d1 = array(
                'project' => $value['app'],
                'team' => explode(", ",$value['author']),
                'link' => $value['link'],
                'img' => $protocol.$host.'/img/'.$value['gambar'],
                'tools' => explode(", ",$value['tools']),
                'type' => $value['jenis'],
                'date' => $value['tanggal'],
            );
            array_push($data, $d1);
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
?>