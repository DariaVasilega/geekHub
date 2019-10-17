<?php

include 'controllers/Create.php';

$func = filter_input(INPUT_GET, 'func');
$post = filter_input(INPUT_POST, 'func');

$human = new Create();

if(!$func)
{
    if (!$post)
    {
        $human->index();
    }
}
else
{
    switch ($func)
    {
        case 'add_new_record':
            {
                $get_data['name'] = $_GET['name'];
                $get_data['category'] = $_GET['category'];
                $get_data['number'] = $_GET['number'];
                $get_data['price'] = $_GET['price'];

                $human->add_new_record($get_data);
                break;
            }
    }
}
