<?php require("templates/header.php"); ?>
<div id="content">
    <h1>Willkommen</h1>
    <p>...zum ersten Instrumenten Inventar test</p>

    <h1>Instrumentenliste</h1>
    <p>Hier ist eine Liste aller registrierten Instrumente:</p>
    <?php require("templates/connectDB.php");
    $tables = array("instrumente", "musiker", "leihregister");
    $db_res = runSQL("SELECT * FROM " . implode(", ", $tables) . "");
    $exclude = array("ID", "Musiker_ID", "Instrumenten_ID", "Instrumententyp", "Stimmung", "Namenszusatz", "ausgegeben_am", "zurückgegeben_am");
    $columns = array();

    foreach ($tables as $table) {

        $columns = array_merge($columns, get_columnnames($table));
    }

    //print_r($columns);


    ?>
    <h1>RWD List to Table</h1>
    <form action="Instrument_anzeigen.php" method="GET">

        <table class="rwd-table">
            <tr><?php
                echo ('<th> </th>');
                foreach ($columns as list($column_name, $column_comment)) {
                    if (!in_array($column_name, $exclude)) {
                        echo ('<th>' . $column_name . ' </th>');
                    }
                }
                ?>
            </tr>
            <?php
            $db_res = runSQL("SELECT * FROM instrumente");

            while ($row = mysqli_fetch_assoc($db_res)) {
            ?>
                <tr>

                    <td>
                        <button type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-eye"></i></button>
                        <button formaction="Instrument_bearbeiten.php" type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-pen"></i></button>
                        <button formaction="Bilder_hinzufuegen.php" type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>"><i class="fas fa-camera"></i></button>

                    </td>
                <?php
                foreach ($columns as list($column_name, $column_comment)) {
                    if (!in_array($column_name, $exclude)) {
                        if ($row[$column_name] != "") {
                            echo ('<td data-th="' . $column_name . '">' . $row[$column_name] . '</th>');
                        } else {
                            echo ('<td data-th="' . $column_name . '"> </th>');
                        }
                    }
                    if ($column_name == 'Ausgegeben') break;

                    // if ($column_name == 'Ausgegeben' && $row[$column_name] == 0) break;
                    //$db_res = runSQL("SELECT * FROM musiker WHERE ID = " . $row[$column_name] . "");
                }
                echo '</tr>';
            } ?>

        </table>
    </form>


    <p>&larr; Drag window (in editor or full page view) to see the effect. &rarr;</p>
    <p><?= print_r($_GET); ?></p>



</div>
<?php require("templates/footer.php"); ?>