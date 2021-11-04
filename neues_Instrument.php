<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
require 'classes/Input.php';

//$_POST = [
//    'submit' => 'Speichern & weiter',
//    'Seriennummer' => '5555',
//    'register' => '1',
//    'Instrumententyp' => '1',
//    'Stimmung' => 'test',
//    'Hersteller' => 'test2',
//    'Namenszusatz' => ''
//];


$in = Input::new_instr();

if (isset($_POST['submit'])) {
    if (0 && empty($_POST["Seriennummer"]) || empty($_POST["Hersteller"])) {
        print_r($_POST);
        ?>
        <div id="small_margin">
            <p> Es müssen zumindest Hersteller und Seriennummer eingetragen sein!</p>
            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung"/>
        </div>
        <?php
//    } else if ($_POST["Ausgegeben"] && empty($_POST["Vorname"]) && empty($_POST["Nachname"])) {
//        ?>
        <!--        <div id="small_margin">-->
        <!--            <p>Instrument ist ausgegeben Bitte Namen eintragen!</p>-->
        <!--            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung"/>-->
        <!--        </div>-->
        <!--        --><?php
    } else {
        echo '<div id="small_margin">';
//        $erg = register($tables, $_POST);
        $erg = $in->register("instrumente");
        ?>
        <h4><?= $erg ?></h4>
        <form action="Bilder_hinzufuegen.php" method="GET">
            <p id="button">
                <button type="submit" name="Instrumenten_ID" value="<?= $erg ?>">weiter zum Bilder
                    hochladen
                </button>
            </p>

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
        <p> In diesem Schritt werden die Daten des Instruments und des Musikers bzw. der Musikerin aufgenommen. Im
            nächsten Schritt können Bilder des Geräts hochgeladen werden.</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php
        $in->instr_info();
        ?>
        <p id="button"><input type="submit" name="submit" value="Speichern & weiter"/></p>
    </form>
<?php }
require("templates/footer.php");
