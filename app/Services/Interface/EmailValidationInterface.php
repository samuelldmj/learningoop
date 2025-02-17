<?php 

declare(strict_types = 1);

namespace   App\Services\Interface;

use App\Dto\EmailValidationResult;

interface EmailValidationInterface {
    public function verify(string $email): EmailValidationResult;
}