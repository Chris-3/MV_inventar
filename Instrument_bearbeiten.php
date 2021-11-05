<?php require("templates/header.php");
require 'classes/Input.php';
//
//$_POST = [
//    'submit' => 'Speichern & weiter',
////    'Seriennummer' => '5555',
////    'register' => '1',
////    'Instrumententyp' => '1',
//    'Stimmung' => 'test',
////    'Hersteller' => 'test2',
////    'Namenszusatz' => ''
//    'Zubehör' => 'ein bissl Zeug',
//    'Instrumenten_ID' => 12
//];
//

//print_r($_GET);
//echo '<br><br>';
//print_r($_POST);
//echo '<br><br>';
if (isset($_POST['submit'])) {
    $in = Input::edit_instr($_POST['Instrumenten_ID']);
    unset($_POST['Instrumenten_ID']);
    print_r($_POST);
    $new_id = $in->register_new_instr();
    ?>
    <!--    <input id="clickMe" type="button" value="clickme" onclick="myFunction();" />-->
    <script>
        var id = <?php echo json_encode($new_id);?>;
        redirectToShowInstr();

        function redirectToShowInstr() {
            // var tmp = window.location.hostname + "/Instrument_anzeigen.php?Instrumenten_ID=" + id;
            var tmp = "/Instrument_anzeigen.php?Instrumenten_ID=" + id;
            location.replace(tmp);
            // document.write(tmp);

        }
    </script>
    <?php
//    }
} else {
    $id = htmlspecialchars($_GET['Instrumenten_ID']);
    $in = Input::edit_instr($id);
    ?>
    <div id="small_margin">
        <p> Hier können die Instrumentendaten bearbeitet werden.</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php
        $in->instr_info();
        ?>
        <input type="hidden" name="Instrumenten_ID" value="<?= $id ?>">
        <p id="button">
            <input type="submit" name="submit" value="Speichern & weiter"/>
        </p>
    </form>

<?php }
require("templates/footer.php");
