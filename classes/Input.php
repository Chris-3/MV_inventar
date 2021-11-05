<?php
require 'Database.php';

//This class generates input fields and prepares the data for Database input
class Input
{
    private int $id;
    private Database $db;

    public
    function __construct($_id)
    {
        $this->id = $_id;
        $this->db = new Database();
    }

    public static
    function edit_instr(int $_id)
    {
        return new Input($_id);
    }

    public static
    function new_instr()
    {
        return new Input(-1);
    }

    public
    function register_new_instr()
    {
        $old_data = $data = array();

        print_r($_POST);
        //Hier werden die Eingaben des Formulars auf verstecken Code aka einen Hackangriff untersucht
        foreach ($_POST as $key => $value) {
            if ($key == 'submit' || $key == 'register') continue;
            $value = $this->test_input($value);
            $data += [$key => $value];
        }
        if ($this->id > -1) {
            $this->replace_old_data($data);
        }

        $data += $this->generate_new_description($data);
        if ($this->id == -1) {
            return $this->db->insert_data("instrumente", $data);
        } else {
            return $this->db->update_data("instrumente", ['ID' => $this->id], $data);
        }

    }

    public
    function instr_info()
    {
        $data = array();
        $columns = $this->db->get_columnnames("instrumente");
        if ($this->id > -1) $data = $this->get_old_data();
        if ($this->id == -1) $this->get_instr_type_ID();

        foreach ($columns as list($column_name, $column_comment)) {
            if ($this->id > -1) $column_comment = array_key_exists($column_name, $data) ? $data[$column_name] : "";
            switch ($column_name) {
                case "ID":
                case "Bezeichnung":
                case "Instrumententyp":
                case "Ausgegeben":
                    break;
                case "Baujahr":
                    $this->generate_years_dropdown($column_name, 1950);
                    break;
                case "Zubehör":
                case "Anmerkung":
                    $this->generate_textfield_input($column_name, $column_comment);
                    break;
                default:
                    $this->default_input($column_name, $column_comment);
                    break;
            }
        }
    }

    public
    function owner_info()
    {

    }

    public
    function is_issued()
    {
        $this->generate_yes_no_input("Ausgegeben", "Ist das Instrument an einen Musiker ausgegeben?");
    }

    public
    function new_instr_type($category, $new_type): string
    {
//        if ($row['COUNT(*)' > 0]) {
        if ($this->db->instr_type_exists($new_type)) {
            return 'Es gibt schon einen Instrumententypen mit dem Namen ' . $new_type;
        }
        $data = array('Instrumententyp' => $new_type, 'Register' => $category);
        $this->db->insert_data('instrumententypen', $data);
//        runSQL("INSERT INTO instrumententypen ( Instrumententyp, Register) VALUES ('" . $new_type . "','" . $category . "')");

        return 'Der Instrumententyp wurde erfolgreich angelegt';
    }

    public
    function save_picture(&$file)
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

    private
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private
    function show_instr_category($var)
    {
        ?>
        <select name="<?= $var ?>" id="<?= $var ?>">
            <option value="1">Holz</option>
            <option value="2">Blech</option>
            <option value="3">Schlagwerk</option>
        </select>
        <?php
    }

    private
    function get_instr_type_ID()
    {
        $instrument_type_ID = "Instrumententyp";
        $ID = 0;
//        $db_instr_types = runSQL("SELECT * FROM instrumententypen");
        $db_instr_types = $this->db->get_all_data('instrumententypen');
        $instr_types_array = array(mysqli_fetch_array($db_instr_types, MYSQLI_NUM));

        if ($this->id > -1) $data = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));

        while ($instr_types_array[] = mysqli_fetch_array($db_instr_types, MYSQLI_NUM)) {
        }
        echo '<h4>Instrumententyp wählen</h4><div id="small_margin">';
        $this->show_instr_category("register");
        ?>

        <select name="<?= $instrument_type_ID ?>" id="<?= $instrument_type_ID ?>">
            <script type="text/javascript">
                new_options();
                document.getElementById("register").addEventListener("change", new_options);

                function new_options() {
                    var instr_types = <?php echo json_encode($instr_types_array) ?>;
                    var instrument_type_ID = <?php echo json_encode($instrument_type_ID) ?>;
                    var select = document.getElementById(instrument_type_ID);
                    var e = document.getElementById("register");
                    var register = e.options[e.selectedIndex].value;
                    document.getElementById(instrument_type_ID).options.length = 0;

                    // console.log("array length " + instr_types.length);
                    for (i = 0; instr_types[i] != null; i += 1) {
                        if (instr_types[i][2] == register) {
                            option = document.createElement("option");
                            option.value = instr_types[i][0];
                            option.text = instr_types[i][1];
                            select.add(option);
                        }
                        // console.log("array ID " + i + " " + instr_types[i][1]);
                    }
                }
            </script>
        </select>
        <input type="button" onclick="window.location.href = 'neuen_Instrumententyp_erstellen.php';"
               value="neuen Instrumententyp erstellen"/>
        </div>
        <?php
    }

    private
    function generate_years_dropdown($column_name, $min_year)
    {
        ?>
        <div id="data_input">
            <label for="<?= $column_name ?>"><?= $column_name ?>: </label>
            <div style="margin-right:100px;">
                <select name="<?= $column_name ?>">
                    <option value="<?= NULL ?>">?</option>
                    <?php for ($year = date("Y"); $year >= $min_year; $year--) {
                        echo '<option value ="' . $year . '">' . $year . '</option>';
                    } ?>
                </select>
            </div>
        </div>
        <?php
    }

    private
    function default_input($column_name, $column_comment)
    {
        ?>
        <div id="data_input">
            <label for="<?= $column_name ?>"><?= $column_name ?>: </label>
            <input type="text" name="<?= $column_name ?>" placeholder="<?= $column_comment ?>"/>
        </div>
        <?php
    }

    private
    function generate_date_input($column_name)
    {
        ?>
        <div id="data_input">
            <label for="<?= $column_name ?>">Wann wurde das Instrument ausgegeben? </label>
            <input id="years_dropdown" type="date" name="<?= $column_name ?>">
        </div>
        <?php
    }

    private
    function generate_textfield_input($column_name, $column_comment)
    {
        ?>
        <div id="data_input">
            <label for="<?= $column_name ?>"><?= $column_name ?>: </label>
            <textarea maxlength="250" name="<?= $column_name ?>" placeholder="<?= $column_comment ?>"></textarea>
        </div>
        <?php
    }

    private
    function generate_yes_no_input($column_name, $question)
    {
        ?>
        <div id="small_margin">
            <label for="<?= $column_name ?>"><?= $question ?> </label>
            <input id="radio_button" type="radio" name="<?= $column_name ?>" value="1" checked/> Ja
            <input id="radio_button" type="radio" name="<?= $column_name ?>" value="0"/> Nein
        </div>
        <?php
    }

    private
    function get_old_data(): array
    {
        $arr = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));
        unset($arr['ID']);
        return $arr;
    }

    private
    function generate_new_description(array $data)
    {
        $tmp = $this->db->get_instr_type($data['Instrumententyp']);
        $v =
            ($data['Namenszusatz'] ? ($data['Namenszusatz'] . "-") : "")
            . $tmp . " " . ($data['Stimmung'] ? (" in " . $data['Stimmung']) : "");
        return ['Bezeichnung' => $v];

    }

    private
    function replace_old_data(&$data)
    {
        $old_data = $this->get_old_data();
        foreach ($data as $key => $value) {
            if ($value == '') unset($data[$key]);
        }
        foreach ($old_data as $key => $value) {
            if (!array_key_exists($key, $data)) $data += [$key => $value];
        }
        unset($data['Bezeichnung']);
    }
}