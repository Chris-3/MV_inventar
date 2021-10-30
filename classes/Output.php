<?php

class Output
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
        $data = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));
//        print_r($data);
        echo '<table><tr>';
        foreach ($data as $key => $value) {
            echo '<th>' . $key . '</th><th>' . $value . '</th></tr>';
        }
        echo '</table>';
    }

    public function owner_info()
    {
        $user = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("musiker", $this->id));
        $date = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("leihregister", $this->id));

        print_r($user);
        print_r($date);
//        foreach ($user as $key => $value) {
//
//        }
    }

    public function pictures()
    {
        $path_arr = array();
        $db_res = $this->db->get_data_from_table_with_ID("dateiregister", $this->id);
        while ($picture = mysqli_fetch_assoc($db_res)) {
            array_push($path_arr, $picture['filepath']);
        }
        return $path_arr;
    }
}