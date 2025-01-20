<?php
namespace App;

use App\Exceptions\ContainerException;
use App\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

class Container implements ContainerInterface {

    private $entries = [];

    public function get(string $id)
    {

        if($this->has($id)){
            $entry = $this->entries[$id];
            if(is_callable($entry)){
                return $entry($this);
            }
           $id = $entry;
        }
        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    private function resolve(string $id){

        $reflectionClass = new ReflectionClass($id);

        if(!$reflectionClass->isInstantiable()){
            throw new ContainerException("Class" . $id. "is not instantiable");
        }

        $constructor = $reflectionClass->getConstructor();
        if(!$constructor){
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if(!$parameters){
            return new $id;
        }

        $dependencies = array_map(function(ReflectionParameter $param) use ($id){
            $name = $param->getName();
            $type = $param->getType();

            if(!$type){
                throw new ContainerException('Failed to resolve class' . $id . 'because param' . $name . 'missing a type hinting');
            }

            if($type instanceof ReflectionUnionType){
                throw new ContainerException('Failed to resolve class' . $id . 'because of union type name' . $name . 'missing a type hinting');
            }

            if($type instanceof ReflectionNamedType && !$type->isBuiltin()){
                return $this->get($type->getName());
            }

            throw new ContainerException('Failed to resolve class' . $id . 'because of union type name' . $name . 'missing a type hinting');
        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);

    }
}
