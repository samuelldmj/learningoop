<?php 

declare(strict_types = 1);

namespace   App\Services\Interface;

interface EmailValidationInterface {
    public function verify(string $email): array;
}