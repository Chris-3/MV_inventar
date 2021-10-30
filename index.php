<?php
require("templates/header.php");
require("classes/Database.php");
?>
    <div id="content">
        <h1>Willkommen</h1>
        <p>...zum ersten Instrumenten Inventar test</p>

        <h1>Instrumentenliste</h1>
        <p>Hier ist eine Liste aller registrierten Instrumente:</p>
        haha
        <?php
        $tables = array("instrumente", "musiker", "leihregister");
        //$db_res = runSQL("SELECT * FROM " . implode(", ", $tables) . "");
        //$exclude = array("ID", "Musiker_ID", "Instrumenten_ID", "Instrumententyp", "Stimmung", "Namenszusatz","ausgegeben_am", "zurückgegeben_am");
        $exclude = array("");
        $columns = array();
        $db = new Database();

        foreach ($tables as $table) {
            $columns = array_merge($columns, $db->get_columnnames($table));
        }
        ?>
        <h1>Liste aller Instrumente</h1>
        <form action="Instrument_anzeigen.php" method="GET">

            <table class="rwd-table">
                <tr><?php
                    echo('<th> </th>');
                    foreach ($columns as list($column_name, $column_comment)) {
                        if (!in_array($column_name, $exclude)) {
                            echo('<th>' . $column_name . ' </th>');
                        }
                    }
                    ?>
                </tr>
                <?php
                $db_res = $db->get_all_data("instrumente");

                while ($row = mysqli_fetch_assoc($db_res)) {
                ?>
                <tr>
                    <td>
                        <!-- Button for viewing instrument -->
                        <button type="submit" name="Instrumenten_ID" value="<?= $row["ID"] ?>">
                            <i class="fas fa-eye"></i></button>
                        <!-- Button for changing instr info -->
                        <button formaction="Instrument_bearbeiten.php" type="submit" name="Instrumenten_ID"
                                value="<?= $row["ID"] ?>">
                            <i class="fas fa-pen"></i></button>
                        <!-- Button for adding new Pictures -->
                        <button formaction="Bilder_hinzufuegen.php" type="submit" name="Instrumenten_ID"
                                value="<?= $row["ID"] ?>">
                            <i class="fas fa-camera"></i></button>
                        <!-- Button for deleting entry -->
                        <button formaction="Instrument_loeschen.php" type="submit" name="Instrumenten_ID"
                                value="<?= $row["ID"] ?>">
                            <i class="fas fa-dumpster"></i></button>

                    </td>
                    <?php

                    foreach ($columns as list($column_name, $column_comment)) {
                        if (!in_array($column_name, $exclude)) {
                            if ($row[$column_name] != "") {
                                echo('<td data-th="' . $column_name . '">' . $row[$column_name] . '</th>');
                            } else {
                                echo('<td data-th="' . $column_name . '"> </th>');
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