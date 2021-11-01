<?php

class Database
{
    private string $host = 'localhost';
    private string $user = 'mvhofkirchen';
    private string $pw = 'y+u<YgTXXu4H';
    private string $db_name = 'mvhofkirchen';
    private $db_link;

    public function __construct()
    {
        $this->db_link = mysqli_connect($this->host, $this->user, $this->pw, $this->db_name);
        if (!$this->db_link) {
            die("<p>Verbindung nicht hergestellt!</p>");
        }
    }


    private function runSQL($sql)
    {
        $db_res = mysqli_query($this->db_link, $sql)
        or die("SQL-Abfrage: " . $sql . " Fehler: " . mysqli_error($this->db_link));
        return $db_res;
    }

    public function get_columnnames($table_name)
    {

        $table_name = mysqli_real_escape_string($this->db_link, $table_name);

        $db_res = $this->runSQL("SELECT column_name, column_comment 
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

    public function insert_data($table, array &$data)
    {
        $fields = "";
        $values = "";

        foreach ($data as $key => $value) {
            $fields = $fields . ", " . $key;
            $values = $values . ", " . $value;
        }

        $sql = "INSERT INTO `" . $table . "` (" . $fields . ") VALUES (" . $values . ")";

        if (mysqli_query($this->db_link, $sql)) {
            return array(
                "mysql_error" => false,
                "mysql_insert_id" => mysqli_insert_id($this->db_link),
                "mysql_affected_rows" => mysqli_affected_rows($this->db_link),
                "mysql_info" => mysqli_info($this->db_link)
            );
        } else {
            return array("mysql_error" => mysqli_error($this->db_link));
        }
    }


    public function prepare_data_for_sql($columns, $exclude, &$fields, &$values)
    {

        $index = 0;
        $fields = [];
        $values = [];

        foreach ($columns as list($column_name, $column_comment)) {
            if (!in_array($column_name, $exclude) && array_key_exists($column_name, $_POST) && $_POST[$column_name] != "") {

                $fields[$index] = $column_name;
                $values[$index] = "'" . mysqli_real_escape_string($this->db_link, $_POST[$column_name]) . "'";
                $index++;
            }
        }
        $fields = implode(", ", $fields);
        $values = implode(", ", $values);
    }

    public function get_all_data($table)
    {
        $sql = "SELECT * FROM " . $table;
        return $this->runSQL($sql);
    }

    public function get_data_from_table_with_ID($table, $id)
    {
        $sql = "";
        switch ((string)$table) {
            case 'instrumente':
                $sql = "SELECT * FROM mvhofkirchen.instrumente WHERE ID='$id'";
                break;
            case 'dateiregister':
                $sql = "SELECT * FROM mvhofkirchen.dateiregister WHERE Instrumenten_ID='$id'";
                break;
            case 'leihregister':
                $sql = "SELECT * FROM mvhofkirchen.leihregister WHERE Instrumenten_ID='$id'";
                break;
            case 'musiker':
//                $sql = "SELECT * FROM mvhofkirchen.musiker WHERE ID=(SELECT Musiker_ID FROM leihregister WHERE Instrumenten_ID='$id')";
                $sql = "SELECT * FROM mvhofkirchen.musiker WHERE ID='$id'";
                break;
            default:
                echo 'invalid table';
                break;
        }
        return $this->runSQL($sql);
    }

    public function delete_instrument_with_ID($id)
    {
        runSQL("DELETE FROM mvhofkirchen.instrumente WHERE ID ='$id'");
        runSQL("DELETE FROM mvhofkirchen.dateiregister WHERE Instrumenten_ID ='$id'");
        runSQL("DELETE FROM mvhofkirchen.leihregister WHERE Instrumenten_ID ='$id'");
    }

    private function exists($table, $column, $data): bool
    {
        $data = mysqli_real_escape_string($this->db_link, $data);
        $sql = "SELECT COUNT(*) FROM mvhofkirchen." . $table . " WHERE " . $column . " = '" . $data . "'";
        $tmp = mysqli_fetch_array($this->runSQL($sql));
        return $tmp[0] > 0;
    }

    public function instr_type_exists($data): bool
    {
        return $this->exists('instrumententypen', 'Instrumententyp', $data);
    }

    public function user_exists($firstName, $lastName): bool
    {
        return ($this->exists('musiker', 'Instrumententyp', $firstName)) && ($this->exists('musiker', 'Instrumententyp', $lastName));
    }

    function register_file_sql($ID, $new_path, $extension, $size)
    {
        //Hier wird ueberprueft ob es die Seriennummer bereits gibt
        $result = mysqli_fetch_array(
            runSQL("SELECT COUNT(*) FROM dateiregister WHERE filepath = '$new_path' "),
            MYSQLI_NUM
        );
        if ($result[0] > 0) {
            return 'Es ist bereits eine Datei mit dem Namen ' . $new_path . ' registriert';
        }
        $hinzugefuegt_am = date("Y-m-d");
        runSQL("INSERT INTO dateiregister ( filepath, Instrumenten_ID, hinzugefuegt_am, Dateityp, Dateigroesse) 
    VALUES ('" . $new_path . "','" . $ID . "','" . $hinzugefuegt_am . "','" . $extension . "','" . $size . "')");
    }


}