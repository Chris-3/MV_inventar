<?php
require("templates/header.php");
require("templates/connectDB.php");
//require("templates/register_instr_type.php");
//require("templates/picture_upload.php");
require 'classes/ResizeImage.php';
require 'classes/Input.php';

//
//$instrument_ID = "";
//if (isset($_GET['Instrumenten_ID'])) {
//    $instrument_ID = $_GET['Instrumenten_ID'];
//}
//if (isset($_POST['Instrumenten_ID'])) {
//    $instrument_ID = $_POST['Instrumenten_ID'];
//}
//
//echo ' _POST:';
//print_r($_POST);
//echo '<br><br> _GET:';
//print_r($_GET);
//echo '<br><br> _FILES:';
//print_r($_FILES);
//echo '<br><br> _FILES:';

if (isset($_GET['Instrumenten_ID']) || isset($_FILES['datei'])) {
    if (!isset($_FILES['datei'])) {
        $instr_id = $_GET['Instrumenten_ID'];
        ?>
        <!--        <form action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!--" method="POST"-->
        <!--              enctype="multipart/form-data">-->
        <form action="Bilder_hinzufuegen.php?Instrumenten_ID=<?= $_GET['Instrumenten_ID'] ?>" method="POST"
              enctype="multipart/form-data">
            <input type="file" name="datei"><br>
            <p id="button">
                <button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">Bilder Hochladen
                </button>
            </p>

            <!-- <input type="submit" value="Hochladen"> -->
        </form>
        <?php
    } else {
//        print_r($_FILES);

        echo '<br>';
        $in = new Input($_GET['Instrumenten_ID']);
        $in->save_picture($_FILES);
        ?>
        <form action="Bilder_hinzufuegen.php" method="GET">
        <p id="button">
            <button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">weitere Bilder zu
                diesem
                Instrument hinzufügen
            </button>
        </p>
        </form><?php
    }
} else {
    ?>
    <h4>Bild upload! Kein Instrument gewaehlt.</h4>
    <br>

    <?php
}
?> <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
<?php
require("templates/footer.php"); ?>