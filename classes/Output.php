<?php

class Output
{
    private string $id;
    private Database $db;

    private array $exclude;


    public
    function __construct($_id)
    {
        $this->exclude = array('ID', 'Stimmung', 'Namenszusatz', 'Instrumententyp', 'Musiker_ID', 'Instrumenten_ID', 'Ausgegeben');
        $this->id = $_id;
        $this->db = new Database();
    }

    public
    function instr_info()
    {
        $data = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));
//        print_r($data);
        echo '<table><tr>';
        foreach ($data as $key => $value) {
            if (in_array($key, $this->exclude)) continue;
            echo '<th>' . $key . '</th><th>' . $value . '</th></tr>';
        }
        echo '</table>';
    }

    public
    function owner_info()
    {
        $sql = $this->db->get_data_from_table_with_ID("leihregister", $this->id);
        echo '<table><tr>';
        echo '<th>Name</th><th>ausgegeben am</th><th>zurückgegeben am</th></tr>';
//        $registry = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("leihregister", $this->id));
        while ($registry = mysqli_fetch_assoc($sql)) {
            $user = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("musiker", $registry['Musiker_ID']));
            $temp = $registry['zurückgegeben_am'] == '0000-00-00' ? '-' : $registry['zurückgegeben_am'];
            echo '<th>' . $user['Vorname'] . ' ' . $user['Nachname'] . '</th>
                    <th>' . $registry['ausgegeben_am'] . '</th><th>' . $temp . '</th></tr>';
        }
        echo '</table>';
    }

    public
    function pictures()
    {
        $path_arr = array();
        $db_res = $this->db->get_data_from_table_with_ID("dateiregister", $this->id);
        while ($picture = mysqli_fetch_assoc($db_res)) {
            array_push($path_arr, $picture['filepath']);
        }
        array_push($path_arr, 'templates/Add-a-photo-01.jpg');
        return $path_arr;

    }
}