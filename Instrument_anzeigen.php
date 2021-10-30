<?php require("templates/header.php");
require("classes/Database.php");
require("templates/add_new_instrument.php");
include("classes/phpqrcode/qrlib.php");
require 'classes/Output.php';

$tables = array("instrumente", "musiker", "leihregister", "dateiregister");

//    get_columnnames("instrumente"),
//    get_columnnames("musiker"),
//    get_columnnames("leihregister"),
//    get_columnnames("dateiregister")
//);


global $_GET;
$_GET['Instrumenten_ID'] = 1;

if (!isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
    <p> Instrument anzeigen ID not set</p>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
    <?php
} else {
    ?>
    <div id="small_margin">
        <!--    <p> Instrument anzeigen ID is set</p>-->
        <?php
        $id = $_GET['Instrumenten_ID'];
        $out = new Output($id);
        $img_path = $out->pictures();
        echo '<h1>Instrumenten Daten:</h1>
<div id="small_margin">';
        $out->instr_info();
        ?> '<img src=" <?= $img_path[0] ?> " style="width:250px;height:auto;">
    </div>
    <h1>Leihregister:</h1>
    <div id="owner - info">';
    <?= $out->owner_info(); ?>

    </div><?php
    for ($i = 1; $i < count($img_path); $i++) {
        echo "<img src=\"" . $img_path[$i] . "\" style=\"width:250px;height:auto;\">";
    }

    //        $data[0] = $db->get_data_from_table_with_ID("instrumente",$id);
    //        $data[1] = $db->get_data_from_table_with_ID("dateiregister",$id);
    //        $data[2] = $db->get_data_from_table_with_ID("leihregister",$id);
    //        $data[3] = $db->get_data_from_table_with_ID("musiker",$id);
    //        QRcode::png("http://mvhofki.ddns.net/Instrument_anzeigen.php?Instrumenten_ID=$id", 'Bilder/tmp.png');
    //        echo '<img src="Bilder/tmp.png" style="width:250px;height:auto;">';


    //        while ($picture = mysqli_fetch_assoc($data[1])) {
    //            //echo 'pic: ' . $picture['filepath'] . '</br>';
//    ?>
    <!--    <img src="--><? // $picture['filepath'] ?><!--" style="width:250px;height:auto;">-->
    <!---->
    <!--    --><?php
    //        }
    //        echo '</br></br>';
    //        foreach ($data as $db_res) {
    //            while ($row = mysqli_fetch_assoc($db_res)) {
    //                print_r($row);
    //
    //                /*    if (in_array('filepath',$row))
    //                   {
    //                       echo 'Bild hier'; */
    //                //}
    //                /*    foreach ($columns as list($column_name, $column_comment)) {
    //                       if (!in_array($column_name, $exclude)) {
    //                           if ($row[$column_name] != "") {
    //                               echo('<td data-th="' . $column_name . '">' . $row[$column_name] . '</th>');
    //                           } else {
    //                               echo('<td data-th="' . $column_name . '"> </th>');
    //                           }
    //                       }
    //                       if ($column_name == 'Ausgegeben') {
    //                           break;
    //                       }
    //
    //                       // if ($column_name == 'Ausgegeben' && $row[$column_name] == 0) break;
    //                    //$db_res = runSQL("SELECT * FROM musiker WHERE ID = " . $row[$column_name] . "");
    //                   } */
    //                echo '</br></br>';
    //            }
} ?>

</div>

<form action="Bilder_hinzufuegen.php" method="GET">
    <p id="button">
        <button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">Bilder hinzufügen
        </button>
    </p>
</form>
<img src="">
<p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>


<?php require("templates/footer.php"); ?>
