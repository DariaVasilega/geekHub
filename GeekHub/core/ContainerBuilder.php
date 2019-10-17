<?php

declare(strict_types=1);

namespace Core;

use ReflectionException;

class ContainerBuilder
{
    /**
     * @var array
     */
    private $container;

    /**
     * @param $className
     * @param array $params
     * @return object
     * @throws ReflectionException
     */
    public function get($className, array $params = []): object
    {
        if(!file_exists($className)){
//            throw new \RuntimeException("$className does not exist");
        }

        $reflection = new \ReflectionClass($className);

        if($constructorParams = $reflection->getConstructor()){
            foreach ($constructorParams->getParameters() as $parameter){
                if($parameter->getClass()){
                    $params[]=$this->get($parameter->getClass()->getName());
                }else {
                    throw new \RuntimeException('parameter is not object');
                }
            }
        }
        $this->container[$className]= count($params) ? new $className(...$params) : new $className();

        return $this->container[$className];
    }

}