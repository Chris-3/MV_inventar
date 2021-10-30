<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
include("templates/phpqrcode/qrlib.php");
// $tables = array(
//     get_columnnames("instrumente"),
//     get_columnnames("musiker"),
//     get_columnnames("leihregister"),
//     get_columnnames("dateiregister")
// );

global $_GET;
if (!isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
    <h1> Instrument anzeigen ID not set</h1>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
<?php
} else {
?>
    <div id="small_margin">

        <?= $ID = $_GET['Instrumenten_ID']; ?>
        <h1>Instrument mit ID: <?= $ID ?> wirklich löschen?</h1>
        <form action="erfolgreich_geloescht.php" method="GET">
            <p id="button"><button type="submit" name="Instrumenten_ID" value="<?= $ID ?>">löschen</button></p>
        </form>

        <!-- <p id="button"><input type="button" value="löschen" onClick="erfolgreich_geloescht.php"></p> -->
        <!-- <button formaction="erfolgreich_geloescht.php" type="submit" name="Instrumenten_ID" value="<?= $ID ?>">ja löschen</button> -->
    </div>

    <?php
    $data[0] = runSQL("SELECT * FROM instrumente WHERE ID='$ID'");
    $data[1] = runSQL("SELECT * FROM dateiregister WHERE Instrumenten_ID='$ID'");
    $data[2] = runSQL("SELECT * FROM leihregister WHERE Instrumenten_ID='$ID'");
    $data[3] = runSQL("SELECT * FROM musiker WHERE ID=(SELECT Musiker_ID FROM leihregister WHERE Instrumenten_ID='$ID')");
    QRcode::png("http://mvhofki.ddns.net/Instrument_anzeigen.php?Instrumenten_ID=$ID", 'Bilder/tmp.png');
    echo '<img src="Bilder/tmp.png" style="width:250px;height:auto;">';
    while ($picture = mysqli_fetch_assoc($data[1])) {
        //echo 'pic: ' . $picture['filepath'] . '</br>'; 
    ?>
        <img src="<?= $picture['filepath'] ?>" style="width:250px;height:auto;">
        <?= $picture['filepath'] ?>

    <?php

    }
    echo '</br></br>';
    foreach ($data as $db_res) {
        while ($row = mysqli_fetch_assoc($db_res)) {
            print_r($row);
            echo '</br></br>';
        }
    } ?>

    </div>

    <form action="Bilder_hinzufuegen.php" method="GET">
        <p id="button"><button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">Bilder hinzufuegen</button></p>
    </form>
    <img src="">
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>

<?php
}
require("templates/footer.php");
