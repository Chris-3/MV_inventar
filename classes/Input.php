<?php
require 'Database.php';

//This class generates input fields and prepares the data for Database input
class Input
{
    private string $id;
    private Database $db;

    public function __construct($_id)
    {
        $this->id = $_id;
        $this->db = new Database();
    }

    public function instr_info()
    {
        $this->db->get_data_from_table_with_ID("instrumente");
    }

    public function owner_info()
    {

    }

    public function pictures()
    {

    }

    public function new_instr_type($category, $new_type): string
    {
//        global $db_link;
//        $new_type = mysqli_real_escape_string($db_link, $new_type);
        //Instrumententyp schon vorhanden
//        $db_res = runSQL("SELECT COUNT(*) FROM instrumententypen WHERE Instrumententyp = '" . $new_type . "'");
//        $row = mysqli_fetch_array($db_res);

//        if ($row['COUNT(*)' > 0]) {
        if ($this->db->instr_type_exists($new_type)) {
            return 'Es gibt schon einen Instrumententypen mit dem Namen ' . $new_type;
        }
        $data = array('Instrumententyp' => $new_type, 'Register' => $category);
        $this->db->insert_data('instrumententypen', $data);
//        runSQL("INSERT INTO instrumententypen ( Instrumententyp, Register) VALUES ('" . $new_type . "','" . $category . "')");

        return 'Der Instrumententyp wurde erfolgreich angelegt';
    }


    function save_picture($file)
    {
        $upload_folder = 'Bilder/'; //Das Upload-Verzeichnis
        // $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
        $filename = $this->id;

        $extension = strtolower(pathinfo($file['datei']['name'], PATHINFO_EXTENSION));
        
        //Überprüfung der Dateiendung
        $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array($extension, $allowed_extensions)) {
            die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
        }

        //Überprüfung dass das Bild keine Fehler enthält
        if (function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
            $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detected_type = exif_imagetype($file['datei']['tmp_name']);
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
        move_uploaded_file($file['datei']['tmp_name'], $new_path);
        // Resize Auto Size From Given Width And Height
        $resize = new ResizeImage($new_path);
        $resize->resizeTo(1000, 1000);
        $resize->saveImage($new_path);
        $this->db->register_file_sql($this->id, $new_path, $extension, $file['datei']['size']);
        echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function delete_pic($filepath)
    {
        unlink($filepath);
    }

}