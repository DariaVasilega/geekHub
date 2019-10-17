<?php

include 'model/productModel.php';

class Create
{
    protected $model;
    function __construct()
    {
        $this->model = new productModel();
    }

    public function index()
    {
        $data = $this->model->all_records();

    }

    public function add_new_record($data)
    {
        $this->model->save_new_record($data);

        $data = $this->model->all_records();

    }
}