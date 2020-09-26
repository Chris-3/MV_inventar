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
    $max_size = 2000 * 1200; //500 KB
    if ($_FILES['datei']['size'] > $max_size) {
        die("Bitte keine Dateien größer 2000x1200 Pixel hochladen");
    }

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
    move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
    register_file_sql($ID, $new_path, $extension);
    echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
}

    
function register_file_sql($tables_column_names)
{
    global $_POST;
    global $DEBUG;
    $table = array("dateien");
    $exclude = array("ID");
    $insert_data = $fields = $values = array();

    //Hier werden die Eingaben des Formulars auf 
    //verstecken Code aka einen Hackangriff untersucht
   //$Seriennummer = test_input($_POST["Seriennummer"]);
   // $Instrumententyp = test_input($_POST["Instrumententyp"]);
    //$Stimmung = test_input($_POST["Stimmung"]);
  //  $ausgegeben_am = test_input($_POST["ausgegeben_am"]);
  //  $Namenszusatz = test_input($_POST["Namenszusatz"]);
    //$ausgegeben = test_input($_POST["Ausgegeben"]);
   
    
    //Hier wird ueberprueft ob es die Seriennummer bereits gibt
    $result = mysqli_fetch_array(runSQL("SELECT COUNT(*) FROM instrumente WHERE Seriennummer = '$Seriennummer' "), MYSQLI_NUM);
    if ($result[0] > 0) return 'Es ist bereits ein Instrument mit der Seriennummer ' . $Seriennummer . ' registriert';

    //Hier wird aus den Formulareingaben die Bezeichung des Instrumentes generiert
    $result = mysqli_fetch_assoc(runSQL("SELECT Instrumententyp FROM instrumententypen WHERE ID = '$Instrumententyp' "));
    $_POST["Bezeichnung"] =
        ($Namenszusatz ? ($Namenszusatz . "-") : "")
        . $result["Instrumententyp"] . " 
        " . ($Stimmung ? (" in " . $Stimmung) : "");

    if (!$ausgegeben_am) $ausgegeben_am = date("Y-m-d");

    for ($i = 0; $i < $tables_column_names; $i++) {
        if (!$ausgegeben && $i == 1) break;
        prepare_data_for_sql($tables_column_names[$i], $exclude, $fields, $values);
        $insert_data = insert_data_sql($table[$i], $fields, $values);

        if ($insert_data["mysql_error"] == "" && $table[$i] == "instrumente") {
            $_POST["Instrumenten_ID"] = $insert_data["mysql_insert_id"];
        } else if ($insert_data["mysql_error"] == "" && $table[$i] == "musiker") {
            $_POST["Musiker_ID"] = $insert_data["mysql_insert_id"];
        } else return $insert_data["mysql_error"];
    }
    return $_POST["Instrumenten_ID"];
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

