<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class UserModel extends Model
{

    public function create(string $email, string $name, bool $is_active = true): int
    {

        $Stmt = $this->db->prepare('INSERT INTO oop_users (email, full_name, is_active, created_at) VALUES (?, ?, ?, NOW()) ');
        $Stmt->execute([$email, $name, $is_active]);
        return  (int) $this->db->lastInsertId();
    }
}
