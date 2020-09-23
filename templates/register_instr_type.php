<?php
function register_instr_type($category, $new_type)
{
    global $db_link;
    $new_type = mysqli_real_escape_string($db_link, $new_type);
    //Instrumententyp schon vorhanden
    $db_res = runSQL("SELECT COUNT(*) FROM instrumententypen WHERE Instrumententyp = '" . $new_type . "'");
    $row = mysqli_fetch_array($db_res);

    if ($row['COUNT(*)' > 0]) {
        return 'Es gibt schon einen Instrumententypen mit dem Namen ' . $new_type;
    }
    runSQL("INSERT INTO instrumententypen ( Instrumententyp, Register) VALUES ('" . $new_type . "','" . $category . "')");

return 'Der Instrumententyp wurde erfolgreich angelegt';
}
