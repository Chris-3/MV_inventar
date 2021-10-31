<?php
require 'Database.php';

class Input
{
    private string $id;
    private Database $db;

    public function __construct($_id)
    {
        $this->id = $_id;
        $this->db = new Database();
    }

    public function instr_info()
    {
        $this->db->get_data_from_table_with_ID("instrumente");
    }

    public function owner_info()
    {

    }

    public function pictures()
    {

    }

    public function new_instr_type($category, $new_type): string
    {
//        global $db_link;
//        $new_type = mysqli_real_escape_string($db_link, $new_type);
        //Instrumententyp schon vorhanden
//        $db_res = runSQL("SELECT COUNT(*) FROM instrumententypen WHERE Instrumententyp = '" . $new_type . "'");
//        $row = mysqli_fetch_array($db_res);

//        if ($row['COUNT(*)' > 0]) {
        if ($this->db->instr_type_exists($new_type)) {
            return 'Es gibt schon einen Instrumententypen mit dem Namen ' . $new_type;
        }
        runSQL("INSERT INTO instrumententypen ( Instrumententyp, Register) VALUES ('" . $new_type . "','" . $category . "')");

        return 'Der Instrumententyp wurde erfolgreich angelegt';
    }
}