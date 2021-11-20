<?php
require 'Database.php';

class Output
{
    private $id;
    private $db;
    private $exclude;


    public
    function __construct($_id)
    {
        $this->exclude = array('Stimmung', 'Namenszusatz', 'Instrumententyp', 'Musiker_ID', 'Instrumenten_ID', 'Ausgegeben');
        $this->id = $_id;
        $this->db = new Database();
    }

    public
    function instr_info(array $excl = [''])
    {
        $data = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));
        echo '<table class="greyGridTable"><tbody>';
        foreach ($data as $key => $value) {
            if (in_array($key, $this->exclude) || in_array($key, $excl)) continue;
            echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
        }
        echo '</tbody></table>';
    }

    public
    function owner_info()
    {
        $sql = $this->db->get_data_from_table_with_ID("leihregister", $this->id);
        ?>
        <table class="greyGridTable">
        <thead>
        <tr>
            <th>Name</th>
            <th>ausgegeben am</th>
            <th>zurückgegeben am</th>
        </tr>
        </thead><tbody>
        <tr>
        <?php

        while ($registry = mysqli_fetch_assoc($sql)) {
            $user = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("musiker", $registry['Musiker_ID']));
            $temp = $registry['zurückgegeben_am'] == '0000-00-00' ? '-' : $registry['zurückgegeben_am'];
            echo '<td>' . $user['Vorname'] . ' ' . $user['Nachname'] . '</td>
                    <td>' . $registry['ausgegeben_am'] . '</td><td>' . $temp . '</td></tr>';
        }
        echo '</tbody></table>';
    }

    public
    function pictures()
    {
        $path_arr = array();
        $db_res = $this->db->get_data_from_table_with_ID("dateiregister", $this->id);
        while ($picture = mysqli_fetch_assoc($db_res)) {
            array_push($path_arr, $picture['filepath']);
        }
        array_push($path_arr, 'templates/add-a-photo.png');
        return $path_arr;
    }

    public
    function delete_pic($filepath)
    {
        unlink($filepath);
    }

    public
    function show_pic(string $path)
    {
        if ($path == 'templates/add-a-photo.png') {
            ?>
            <form action="Bilder_hinzufuegen.php" method="GET">
            <button type="submit" name="Instrumenten_ID" value="<?= $this->id ?>">
                <img src=" <?= $path ?> " style="width:250px;height:auto;">
            </button>
            </form><?php
        } else {
            echo "<img src=\"" . $path . " \" style=\"width:auto;height:200px;\">";
        }
    }

    public
    function next()
    {
        $this->id = $this->db->next_id($this->id);
        return $this->id;
    }

    public
    function previous()
    {
        $this->id = $this->db->previous_id($this->id);
        return $this->id;
    }

    public
    function get_id()
    {
        return $this->id;
    }

    public
    function instr_name()
    {
        $data = mysqli_fetch_assoc($this->db->get_data_from_table_with_ID("instrumente", $this->id));
        return $data['Bezeichnung'];
    }
}