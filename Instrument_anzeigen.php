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
        $img_path = $out->pictures(); ?>

        <h1>Instrumenten Daten</h1>
        <table>
            <tr>
                <th>
                    <?= $out->instr_info(); ?>
                    <form method="get">
                        <button formaction="Instrument_bearbeiten.php" type="submit" name="Instrumenten_ID"
                                value="<?= $_GET['Instrumenten_ID'] ?>">
                            <i class="fas fa-pen"></i> Daten bearbeiten
                        </button>
                    </form>
    </div></th>
    <th>
        <?php if ($img_path[0] == 'templates/Add-a-photo-01.jpg') {
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
    </th></tr></table>

    <h1>Leihregister</h1>
    <div id="owner - info">
        <?= $out->owner_info(); ?>
        <form method="get">
            <button formaction="neuer_Leihregister_Eintrag.php" type="submit" name="Instrumenten_ID"
                    value="<?= $_GET['Instrumenten_ID'] ?>">
                <i class="fas fa-pen"></i> Neuer Eintrag
            </button>
        </form>
    </div>
    <h1>Rechnungen</h1>
    <form method="get">
        <button formaction="neue_Rechnung.php" type="submit" name="Instrumenten_ID"
                value="<?= $_GET['Instrumenten_ID'] ?>">
            <i class="fas fa-pen"></i> Neuer Eintrag
        </button>
    </form>
    <h1>Bildergalerie</h1>
    <?php
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

<form method="GET">
    <p id="button">
        <button formaction="Bilder_hinzufuegen.php" type="submit" name="Instrumenten_ID"
                value="<? $_GET['Instrumenten_ID'] ?>">
            Bild hinzufügen
        </button>
    </p>
    <p id="button">
        <button formaction="Instrument_loeschen.php" type="submit" name="Instrumenten_ID"
                value="<? $_GET['Instrumenten_ID'] ?>">
            <i class="fas fa-dumpster"></i> Instrument Löschen
        </button>
    </p>
    <p id="button">
        <button formaction="QR_code.php" type="submit" name="Instrumenten_ID"
                value="<? $_GET['Instrumenten_ID'] ?>">
            QR Code generieren
        </button>
    </p>
</form>

<!--<form action="Instrument_loeschen.php" method="GET">-->
<!--    <p id="button">-->
<!--        <button type="submit" name="Instrumenten_ID" value="--><? // $_GET['Instrumenten_ID'] ?><!--">-->
<!--            <i class="fas fa-dumpster"></i> Instrument Löschen-->
<!--        </button>-->
<!--    </p>-->
<!--</form>-->


<p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>


<?php require("templates/footer.php"); ?>
