<?php

declare(strict_types=1);

namespace App;

use Src\Interfaces\Controller;
use Src\Validator;

class Create implements Controller
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * Create constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator=$validator;
    }

    /**
     * @param array $data
     */
    public function index(array $data = []):void
    {
        if($this->validator->isValid($data)){
            $currentData = json_decode(file_get_contents('../data.json'),true);
            $currentData[]=$data;
            if(!file_put_contents('../data.json',json_encode($currentData))){
                throw new \RuntimeException('something was wrong, operation wasn`t complete');
            }else{
                print_r($currentData);
            }
        }

    }

}