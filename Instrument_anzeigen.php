<?php require("templates/header.php");
//require("templates/add_new_instrument.php");

require 'classes/Output.php';
//require 'classes/Database.php';
//include 'classes/phpqrcode/qrlib.php';

global $_GET;
//$_GET['Instrumenten_ID'] = 3;

if (!isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
    <p> Instrument anzeigen ID not set</p>
    <p id="buttonCustom">
        <input type="button" value="Zurück" onClick="history.go(-1);return true;">
    </p>
    </div>
    <?php
} else {

$id = $_GET['Instrumenten_ID'];
$out = new Output($id);
$img_path = $out->pictures(); ?>

    <div id="small_margin">
    <h1>Instrumenten Daten</h1>
    <article>
        <section class="single">
            <?= $out->instr_info(); ?>
            <form method="get">
                <button class="button" formaction="Instrument_bearbeiten.php" type="submit" name="Instrumenten_ID"
                        value="<?= $_GET['Instrumenten_ID'] ?>">
                    <i class="fas fa-pen"></i> Daten bearbeiten
                </button>
            </form>
        </section>
        <section class="single">
            <?php $out->show_pic($img_path[0]); ?>
        </section>
    </article>

    <h1>Leihregister</h1>

    <div id="owner - info">
        <?= $out->owner_info(); ?>
        <form method="get">
            <button class="button" formaction="neuer_Leihregister_Eintrag.php" type="submit" name="Instrumenten_ID"
                    value="<?= $_GET['Instrumenten_ID'] ?>">
                <i class="fas fa-pen"></i> Neuer Eintrag
            </button>
        </form>
    </div>
    <h1>Rechnungen</h1>
    <form method="get">
        <button class="button" formaction="neue_Rechnung.php" type="submit" name="Instrumenten_ID"
                value="<?= $_GET['Instrumenten_ID'] ?>">
            <i class="fas fa-pen"></i> Neuer Eintrag
        </button>
    </form>
    </div>


<div id="content">
    <h1>Bildergalerie</h1>
    <?php
    for ($i = 1; $i < count($img_path); $i++) {
        $out->show_pic($img_path[$i]);
    }
    } ?>
</div>


<form class="center" method="GET">
    <div class="container">
        <button class="button" formaction="Bilder_hinzufuegen.php" type="submit" name="Instrumenten_ID"
                value="<?= $_GET['Instrumenten_ID'] ?>">
            Bild hinzufügen
        </button>
    </div>
    <div class="container">
        <button class="button" formaction="Instrument_loeschen.php" type="submit" name="Instrumenten_ID"
                value="<?= $_GET['Instrumenten_ID'] ?>">
            <i class="fas fa-dumpster"></i> Instrument Löschen
        </button>
    </div>
    <div class="container">
        <button class="button" formaction="qrcode/QR_code.html" type="submit" name="Instrumenten_ID"
                value="<?= $_GET['Instrumenten_ID'] ?>>">
            QR Code generieren
        </button>
    </div>
    <div class="container">
        <input class="button" type="button" value="Zurück" onClick="history.go(-1);return true;">
    </div>
</form>


<?php require("templates/footer.php"); ?>
