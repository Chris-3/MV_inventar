<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
$tables = array(
    get_columnnames("instrumente"),
    get_columnnames("musiker"),
    get_columnnames("leihregister"),
);
global $_GET;
if (isset($_GET['Instrumenten_ID'])) {
    print_r($_GET);
?>
    <p> Instrument anzeigen</p>

    <form action="Bilder_hinzufuegen.php" method="GET">
        <p id="button"><button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">Bilder hinzufuegen</button></p>
    </form>

    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
<?php
} else {
?>
    <div id="small_margin">
        <p> Instrument anzeigen</p>
    </div>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>

<?php }
require("templates/footer.php");
