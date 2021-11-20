<?php
require("templates/header.php");
//require("classes/Database.php");

require "classes/Output.php";
?>
<div id="content">
    <h1>Willkommen</h1>
    <p>...zum ersten Instrumenten Inventar</p>

    <!--    <h1>Instrumentenliste</h1>-->
    <!--    <p>Hier ist eine Liste aller registrierten Instrumente:</p>-->

    <h1>Liste aller Instrumente</h1>
    <article>
        <form action="Instrument_anzeigen.php" method="GET">
            <?php
            $out = new Output(-1);

            while ($out->next() != -1) {
                ?>
                <section class="listAll">
                    <button class="listAll" type="submit" name="Instrumenten_ID" value="<?= $out->get_id() ?>">

                        <div class="container" style="height: 200px">
                            <img src=" <?= $out->pictures()[0] ?> "
                                 style="max-width:95%;max-height: 95%;">
                        </div>
                        <div style="height: 200px">
                            <h2><?= $out->instr_name() ?></h2>
                            <?php $out->instr_info(['ID', 'Hersteller', 'Anmerkung', 'Zubehör', 'Bezeichnung']); ?>

                        </div>

                    </button>
                </section>

            <?php } ?>
        </form>
    </article>

</div>
<?php require("templates/footer.php"); ?>
