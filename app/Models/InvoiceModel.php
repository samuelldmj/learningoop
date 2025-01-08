<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class InvoiceModel extends Model
{


    public function create(float $amount, int $userId): int
    {
        $InvoiceStmt = $this->db->prepare('INSERT INTO invoices (amount, oop_users_id) VALUES (?, ?)');
        $InvoiceStmt->execute([$amount, $userId]);
        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $fetchStmt = $this->db->prepare('SELECT invoices.id, amount, oop_users_id, full_name
         FROM invoices LEFT JOIN oop_users ON oop_users.id = oop_users_id WHERE invoices.id = ?');

        $fetchStmt->execute([$invoiceId]);
        $invoice = $fetchStmt->fetch();

        return $invoice ? $invoice : [];
    }
}
