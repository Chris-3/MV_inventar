<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
include("templates/phpqrcode/qrlib.php");
$tables = array(
    get_columnnames("instrumente"),
    get_columnnames("musiker"),
    get_columnnames("leihregister"),
    get_columnnames("dateiregister")
);
global $_GET;
if (!isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
    <p> Instrument anzeigen ID not set</p>



    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
<?php
} else {
?>
    <div id="small_margin">
        <p> Instrument anzeigen ID is set</p>
        <?php

        $ID = $_GET['Instrumenten_ID'];
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

        <?php
        }
        echo '</br></br>';
        foreach ($data as $db_res) {
            while ($row = mysqli_fetch_assoc($db_res)) {
                print_r($row);

                /*    if (in_array('filepath',$row))
                   {
                       echo 'Bild hier'; */
                //}
                /*    foreach ($columns as list($column_name, $column_comment)) {
                       if (!in_array($column_name, $exclude)) {
                           if ($row[$column_name] != "") {
                               echo('<td data-th="' . $column_name . '">' . $row[$column_name] . '</th>');
                           } else {
                               echo('<td data-th="' . $column_name . '"> </th>');
                           }
                       }
                       if ($column_name == 'Ausgegeben') {
                           break;
                       }

                       // if ($column_name == 'Ausgegeben' && $row[$column_name] == 0) break;
                    //$db_res = runSQL("SELECT * FROM musiker WHERE ID = " . $row[$column_name] . "");
                   } */
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
