<?php

declare(strict_types=1);


namespace Src;


class Validator
{
    /**
     * @param array $params
     * @return bool
     */
    public function isValid(array $params): bool
    {
        foreach ($params as $key => $param){
            if(empty($param)){
                throw new \RuntimeException("$key is empty!");
            }
        }
        return true;
    }

}