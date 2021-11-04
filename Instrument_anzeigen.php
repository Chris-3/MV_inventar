<?php require("templates/header.php");
//require("templates/add_new_instrument.php");

require 'classes/Output.php';
require 'classes/Database.php';
include 'classes/phpqrcode/qrlib.php';

global $_GET;
//$_GET['Instrumenten_ID'] = 3;

if (!isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
    <p> Instrument anzeigen ID not set</p>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
    <?php
} else {
    ?>
    <div id="small_margin">

        <?php
        $id = $_GET['Instrumenten_ID'];
        $out = new Output($id);
        $img_path = $out->pictures();
        echo '<h1>Instrumenten Daten:</h1>
<div id="nav li">';
        $out->instr_info();
        if ($img_path[0] == 'templates/Add-a-photo-01.jpg') {
            ?>
            <form action="Bilder_hinzufuegen.php" method="GET">
                <!--                <p id="button">-->
                <button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">
                    <img src=" <?= $img_path[0] ?> " style="width:250px;height:auto;">
                </button>
                <!--                </p>-->
            </form>
            <?php
        } else {
            echo "<img src=\"" . $img_path[0] . "\" style=\"width:250px;height:auto;\">";
        }
        ?>

    </div>
    <h1>Leihregister:</h1>
    <div id="owner - info">
    <?= $out->owner_info(); ?>

    </div><?php
    for ($i = 1; $i < count($img_path); $i++) {
        if ($img_path[$i] == 'templates/Add-a-photo-01.jpg') {
            ?>
            <form action="Bilder_hinzufuegen.php" method="GET">
                <!--                <p id="button">-->
                <button type="submit" name="Instrumenten_ID" value="<?= $_GET['Instrumenten_ID'] ?>">
                    <img src=" <?= $img_path[$i] ?> " style="width:250px;height:auto;">
                </button>
                <!--                </p>-->
            </form>
            <?php
            break;
        }
        echo "<img src=\"" . $img_path[$i] . "\" style=\"width:auto;height:200px;\">";
    }

} ?>

</div>

<!--<form action="Bilder_hinzufuegen.php" method="GET">-->
<!--    <p id="button">-->
<!--        <button type="submit" name="Instrumenten_ID" value="--><? //= $_GET['Instrumenten_ID'] ?><!--">Bilder hinzufügen-->
<!--        </button>-->
<!--    </p>-->
<!--</form>-->
<p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>


<?php require("templates/footer.php"); ?>
