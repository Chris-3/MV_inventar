<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/register_instr_type.php");
require("templates/add_new_instrument.php");

if (isset($_POST['submit'])) {
    echo '<div id="small_margin">';
    if (empty($_POST['new_type'])) {
        echo '</p> Bitte Felder ausfüllen.';
    } else {
        $erg = register_instr_type($_POST['category_'], $_POST['new_type']);
        echo '<p>' . $erg . '</p>';
    }
    ?>
    <p><input type="button" onclick="window.location.href = 'neuen_Instrumententyp_erstellen.php';" value="weitere Instrumententypen erstellen" /></p>
    <p><input type="button" onclick="window.location.href = 'neues_Instrument.php';" value="zurück zur Instrumentenregistrierung" /></p>
    <div>
    <?php
    } else {
        ?>
        <form action="neuen_Instrumententyp_erstellen.php" method="POST">

            <p>Hier kann ein neuer Instrumententyp angelegt werden.</p>
            <p>Bitte zuerst ein Register wählen:</p>
            <?php
                show_instr_category("category_"); ?>
            <p>Name des neuen Instrumententypen eingeben: </p>
            <p> <input type="text" name="new_type" /> </p>
            <input type="submit" name="submit" value="speichern">
            <p><input type="button" onclick="window.location.href = 'neues_Instrument.php';" value="zurück zur Instrumentenregistrierung" /></p>
        </form>

    <?php }
    require("templates/footer.php"); ?>