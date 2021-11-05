<?php require("templates/header.php");
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

        echo 'Hallo';
        ?>
        <div id="small_margin">
            <p> Es müssen zumindest Hersteller und Seriennummer eingetragen sein!</p>
            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung"/>
        </div>
        <?php
    } else {
        $new_id = $in->register_new_instr();
        ?>

        <script>
            var id = <?php echo json_encode($new_id);?>;
            redirectToShowInstr();
            function redirectToShowInstr() {
                var tmp = "/Instrument_anzeigen.php?Instrumenten_ID=" + id;
                location.replace(tmp);
            }
        </script>
        <?php
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
