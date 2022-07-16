<?php 
$result = null;
// Проверяем, что данные были отправлены и проверяем на наличие файлов
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Проверка на отправку пустой формы
    if(!empty($_FILES) && !empty($_FILES['csvfile']['name'])){
        $filename = $_FILES['csvfile']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // Проверяем на сервере расширение файла
        if($ext == 'csv'){
            $filePath = $_FILES['csvfile']['tmp_name'];
            $csv = array_column(array_map(function($item){
                    $enc = mb_detect_encoding($item);
                    $item = str_getcsv(mb_convert_encoding($item, "UTF-8", $enc));
                    return $item;
                }, file($filePath)), 1, 0);
            // Проверяем, создана ли папка для файлов и создаём её    
            if(!file_exists('./upload') && !is_dir('./upload'))
            {
                mkdir('upload');
            }
            
            // Проверяем, есть ли записи в csv файле
            if(count($csv) > 0)
            {
                foreach($csv as $filename => $data)
                {
                    $fp = fopen("./upload/".htmlspecialchars($filename), 'w');
                    fputs($fp, htmlspecialchars($data));
                    fclose($fp);
                }
                $result["success"] = count($csv)." file(s) uploaded";
            } else {
                $result["danger"] = "No files were uploaded";
            }
        } else {
            $result["danger"] = "File extension is incorrect";
        }   
    } else {
        $result["danger"] = "No files were uploaded";
    }
} 