<?php require("templates/header.php");
//require("templates/connectDB.php");
require("templates/add_new_instrument.php");
require 'classes/Database.php';

global $_GET;
if (isset($_GET['Instrumenten_ID'])) {
    print_r($_GET);
    $db = new Database();
    $db->delete_instrument_with_ID($_GET['Instrumenten_ID']);
    ?>
    <p> erfolgreich gelöscht</p>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>
    </div>
    <?php
} else {
    ?>
    <div id="small_margin">
        <p> kein Instrument gewählt</p>
    </div>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>

<?php }
require("templates/footer.php");
