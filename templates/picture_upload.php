<?php

function save_picture($ID)
{
    $upload_folder = 'Bilder/'; //Das Upload-Verzeichnis
    // $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
    $filename = $ID;

    $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


    //Überprüfung der Dateiendung
    $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array($extension, $allowed_extensions)) {
        die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }

    //Überprüfung der Dateigröße
    /*  $max_size = 2000 * 1200; //500 KB
     if ($_FILES['datei']['size'] > $max_size) {
         die("Bitte keine Dateien größer 2000x1200 Pixel hochladen");
     }
 */
    //Überprüfung dass das Bild keine Fehler enthält
    if (function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
        $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
        if (!in_array($detected_type, $allowed_types)) {
            die("Nur der Upload von Bilddateien ist gestattet");
        }
    }

    //Pfad zum Upload
    $new_path = $upload_folder . $filename . '.' . $extension;

    //Neuer Dateiname falls die Datei bereits existiert
    if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
            $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
            $id++;
        } while (file_exists($new_path));
    }

    //Alles okay, verschiebe Datei an neuen Pfad
    //move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
    move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
    // Resize Auto Size From Given Width And Height
    $resize = new ResizeImage($new_path);
    $resize->resizeTo(1000, 1000);
    $resize->saveImage($new_path);
    register_file_sql($ID, $new_path, $extension, $_FILES['datei']['size']);
    echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
}

    
function register_file_sql($ID, $new_path, $extension, $size)
{
    global $DEBUG;
  
    //Hier wird ueberprueft ob es die Seriennummer bereits gibt
    $result = mysqli_fetch_array(
        runSQL("SELECT COUNT(*) FROM dateiregister WHERE filepath = '$new_path' "),
        MYSQLI_NUM
    );
    if ($result[0] > 0) {
        return 'Es ist bereits eine Datei mit dem Namen ' . $new_path . ' registriert';
    }

  
    $hinzugefuegt_am = date("Y-m-d");
    runSQL("INSERT INTO dateiregister ( filepath, Instrumenten_ID, hinzugefuegt_am, Dateityp, Dateigroesse) 
    VALUES ('" . $new_path . "','" . $ID . "','" . $hinzugefuegt_am . "','" . $extension . "','" . $size . "')");
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function delete_pic($filepath){
    unlink($filepath);
}
