<?php
$host = 'localhost';

$user = 'mvhofkirchen';
$pw = 'y+u<YgTXXu4H';

$db_name = 'mvhofkirchen';

$db_link = mysqli_connect($host, $user, $pw, $db_name);
if (!$db_link) {
    die("<p>Verbindung nicht hergestellt!</p>");
}

function runSQL($sql)
{
    global $db_link;
    $db_res = mysqli_query($db_link, $sql)
    or die("SQL-Abfrage: " . $sql . " Fehler: " . mysqli_error($db_link));
    return $db_res;
}

function get_columnnames($table_name)
{
    global $db_link;
    $table_name = mysqli_real_escape_string($db_link, $table_name);

    $db_res = runSQL("SELECT column_name, column_comment 
    FROM information_schema.columns 
    WHERE table_name = '$table_name'");

    $columnArray = array();
    $i = 0;
    while ($row = mysqli_fetch_array($db_res, MYSQLI_NUM)) {
        // printf(" %s %s\n", $row[0], $row[1]);
        $columnArray[$i][0] = $row[0];
        if ($row[1] != NULL) $columnArray[$i][1] = $row[1];
        else $columnArray[$i][1] = $row[0];
        $i++;
    }
    return $columnArray;
}

function insert_data_sql($table, &$fields, &$values)
{
    global $db_link;
    global $DEBUG;

    if ($DEBUG) echo '<p>' . "INSERT INTO $table ($fields) VALUES ($values)" . '</p>';
    if (mysqli_query($db_link, "INSERT INTO `$table` ($fields) VALUES ($values)")) {
        return array(
            "mysql_error" => false,
            "mysql_insert_id" => mysqli_insert_id($db_link),
            "mysql_affected_rows" => mysqli_affected_rows($db_link),
            "mysql_info" => mysqli_info($db_link)
        );
    } else {
        return array("mysql_error" => mysqli_error($db_link));
    }
}


function prepare_data_for_sql($columns, $exclude, &$fields, &$values)
{
    global $DEBUG;
    global $db_link;
    $index = 0;
    $fields = [];
    $values = [];

    foreach ($columns as list($column_name, $column_comment)) {
        if (!in_array($column_name, $exclude) && array_key_exists($column_name, $_POST) && $_POST[$column_name] != "") {

            $fields[$index] = $column_name;
            $values[$index] = "'" . mysqli_real_escape_string($db_link, $_POST[$column_name]) . "'";
            if ($DEBUG) {
                printf(" %s =>", $column_name);
                printf(" %s </br>", $_POST[$column_name]);
            }
            $index++;
        }
    }
    $fields = implode(", ", $fields);
    $values = implode(", ", $values);
    if ($DEBUG) {
        echo "fields = " . $fields;
        echo "values = " . $values;
    }
}

function delete_instrument_with_ID($ID)
{
    runSQL("DELETE FROM instrumente WHERE ID ='$ID'");
    runSQL("DELETE FROM dateiregister WHERE Instrumenten_ID ='$ID'");
    runSQL("DELETE FROM leihregister WHERE Instrumenten_ID ='$ID'");
}
