<?php
require("templates/header.php");
require 'classes/Input.php';

?><h1>Work in Progress</h1>
<?php
//$_POST = [
//    'submit' => 'Speichern & weiter',
//    'Seriennummer' => '5555',
//    'register' => '1',
//    'Instrumententyp' => '1',
//    'Stimmung' => 'test',
//    'Hersteller' => 'test2',
//    'Namenszusatz' => ''
//];

//
//$in = Input::edit_instr($_GET['Instrumenten_ID']);
//
//if (isset($_POST['submit'])) {
//    if (0 && empty($_POST["Seriennummer"]) || empty($_POST["Hersteller"])) {
////        print_r($_POST);
//        echo 'Hallo';
//        ?>
    <!--        <div id="small_margin">\-->
    <!--            <p> Es müssen zumindest Hersteller und Seriennummer eingetragen sein!</p>-->
    <!--            <input type="button" onClick="history.go(-1);return true;" value="zurück zur Instrumentenregistrierung"/>-->
    <!--        </div>-->
    <!--        --><?php
//    } else {
////        echo '<div id="small_margin">';
////        $erg = register($tables, $_POST);
//        $new_id = $in->register("instrumente");
//        ?>
    <!---->
    <!--        <script>-->
    <!--            var id = --><?php //echo json_encode($new_id);?>//;
    //            myFunction();
    //
    //            function myFunction() {
    //                // var tmp = window.location.hostname + "/Instrument_anzeigen.php?Instrumenten_ID=" + id;
    //                var tmp = "/Instrument_anzeigen.php?Instrumenten_ID=" + id;
    //                location.replace(tmp);
    //            }
    //        </script>
    //        <?php
//    }
//} else {
//    ?>
    <!--    <div id="small_margin">-->
    <!--        <p> In diesem Schritt werden die Daten des Instruments und des Musikers bzw. der Musikerin aufgenommen. Im-->
    <!--            nächsten Schritt können Bilder des Geräts hochgeladen werden.</p>-->
    <!--    </div>-->
    <!--    <form action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!--" method="POST">-->
    <!--        --><?php
//        $in->instr_info();
//        ?>
    <!--        <p id="button"><input type="submit" name="submit" value="Speichern & weiter"/></p>-->
    <!--    </form>-->
<?php //}
require("templates/footer.php");
