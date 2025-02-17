<?php 

namespace App\Services\Shipping;

class PackageDimension {

    public function __construct(public readonly int $width, public readonly int $height, public readonly int $length){

        match(true){
        $this->width <= 0 || $this->width > 80 => throw new \InvalidArgumentException('Invalid Package Width'),
            $this->length <= 0 || $this->length > 70 => throw new \InvalidArgumentException('Invalid Package length'),
            $this->height <= 0 || $this->height > 120 => throw new \InvalidArgumentException('Invalid Package Height'),
            $this->width <= 0 || $this->width >150 => throw new \InvalidArgumentException('Invalid Package Width'),
            default => true
        };

    }

        public function increaseWidth(int $width){
            return new self($this->width + $width, $this->height, $this->length);
        }


        public function equalTo(PackageDimension $packageDimension){
            return $this->width === $packageDimension->width
            && $this->height === $packageDimension->height
            && $this->length === $packageDimension->length;
        }
    }
