<?php require("templates/header.php");
require("templates/connectDB.php");
require("templates/add_new_instrument.php");
$tables = array(
    get_columnnames("instrumente"),
    get_columnnames("musiker"),
    get_columnnames("leihregister"),
    get_columnnames("dateiregister")
);
global $_GET;
if (isset($_GET['Instrumenten_ID'])) {
    print_r($_GET); ?>
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
        <?php
        $db_res = runSQL("SELECT * FROM instrumente");

        while ($row = mysqli_fetch_assoc($db_res)) {
            ?>
    
            <!-- <button type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-eye"></i></button>
            <button formaction="Instrument_bearbeiten.php" type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-pen"></i></button>
            <button formaction="Bilder_hinzufuegen.php" type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-camera"></i></button>
 -->
    <?php
    foreach ($columns as list($column_name, $column_comment)) {
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
    }
            echo '</tr>';
        } ?>

    </div>
    <p id="button"><input type="button" value="Zurück" onClick="history.go(-1);return true;"></p>

<?php
    }
require("templates/footer.php");
