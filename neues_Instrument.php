<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
$tables = array(
    get_columnnames("instrumente"),
    get_columnnames("musiker"),
    get_columnnames("leihregister"),
);

if (isset($_POST['submit'])) {
    if (0 && empty($_POST["Seriennummer"]) || empty($_POST["Hersteller"])) {
?> <div id="small_margin">
            <p> Es müssen zumindest Hersteller und Seriennummer eingetragen sein!</p>
            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung" />
        </div>
    <?php
    } else if ($_POST["Ausgegeben"] && empty($_POST["Vorname"]) && empty($_POST["Nachname"])) {
    ?> <div id="small_margin">
            <p>Instrument ist ausgegeben Bitte Namen eintragen!</p>
            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung" />
        </div>
    <?php
    } else {
        echo '<div id="small_margin">';
        $erg = register($tables, $_POST);
    ?>
        <h4><?= $erg ?></h4>
        <form action="Bilder_hinzufuegen.php" method="GET">
            <p id="button"><button type="submit" name="Instrumenten_ID" value="<?= $erg ?>">weiter zum Bilder hochladen</button></p>
        </form>
        <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>

        <!-- <input type="button" onclick="window.location.href = 'Bilder_hinzufuegen.php';" value="weiter zum Bildupload" /></p> -->

        </div>
    <?php
        print_r($_POST);
    }
} else {
    ?>
    <div id="small_margin">
        <p> In diesem Schritt werden die Daten des Instruments und des Musikers bzw. der Musikerin aufgenommen. Im nächsten Schritt können Bilder des Geräts hochgeladen werden.</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php
        foreach ($tables as $columns) {
            foreach ($columns as list($column_name, $column_comment)) {

                switch ($column_name) {
                    case "ID":
                    case "Instrumenten_ID":
                    case "Musiker_ID":
                    case "zurückgegeben_am":
                    case "Bezeichnung":
                        break;
                    case "Instrumententyp":
                        get_instr_type_ID($column_name);
                        break;
                    case "Baujahr":
                        generate_years_dropdown($column_name, 1950);
                        break;
                        // case "Behälter/Schutz":
                        //     //in Arbeit
                        //     break;
                    case "ausgegeben_am":
                        generate_date_input($column_name);
                        break;
                    case "Ausgegeben":
                        generate_yes_no_input($column_name, "Ist das Instrument an einen Musiker ausgegeben?");
                        break;
                    case "Zubehör":
                    case "Anmerkung":
                        generate_textfield_input($column_name, $column_comment);
                        break;
                    case "Vorname":
                        echo '<h4>Daten des Musikers:</h4>';
                    default:
                        default_input($column_name, $column_comment);
                        break;
                }
            }
        }
        ?>
        <p id="button"><input type="submit" name="submit" value="Speichern & weiter" /></p>
    </form>
<?php }
require("templates/footer.php");
