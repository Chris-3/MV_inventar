<?php

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

    public function pictures(){

    }
}