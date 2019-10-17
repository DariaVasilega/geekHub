<?php

include 'database/db.php';

class productModel
{
    protected $db;

    function __construct()
    {
        $this->db = new DB();
    }

    public function all_records()
    {
        $data = $this->db->query("SELECT * FROM product");

        return $data;
    }

    public function save_new_record($data)
    {
        $name = $data['name'];
        $category = $data['category'];
        $number = $data['number'];
        $price = $data['price'];

        $check = $this->db->query("SELECT * FROM product WHERE name = '$name' AND category = '$category'");

        if(count($check) == 0)
        {
            $this->db->query("INSERT INTO product (name, category, number, price) VALUES ('$name', '$category', $number, '$price')");
        }

    }

}