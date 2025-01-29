<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;
use App\Model;
use PDO;

class InvoiceModel extends Model
{


    public function create(float $amount, int $userId): int
    {
        // Prepare the insert statement using Doctrine DBAL with named parameters
        $InvoiceStmt = $this->db->createQueryBuilder();
        $InvoiceStmt->insert('invoices')  // Specify the table
            ->values([
                'amount' => ':amount',  // Use named parameters
                'oop_users_id' => ':oop_users_id'
            ])
            ->setParameters([
                'amount' => $amount,
                'oop_users_id' => $userId
            ]);  // Bind named parameters

        // Execute the statement
        $InvoiceStmt->executeStatement();

        // Return the last inserted ID
        return (int) $this->db->lastInsertId();


    }

    public function find(int $invoiceId): array
    {
        // $fetchStmt = $this->db->prepare('SELECT invoices.id, amount, oop_users_id, full_name
        //  FROM invoices LEFT JOIN oop_users ON oop_users.id = oop_users_id WHERE invoices.id = ?');

        $fetchStmt = $this->db->createQueryBuilder();

        $fetchStmt->select('invoices.id', 'invoices.amount', 'oop_users_id', 'oop_users.full_name')
            ->from('invoices')
            ->leftJoin('invoices', 'oop_users', 'oop_users.id = invoices.oop_users_id')
            ->where('invoices.id = ?');  // Use positional placeholder for binding value

        // Bind the value for the placeholder
        $fetchStmt->setParameter(0, $invoiceId);  // Bind $invoiceId as the first parameter

        // Execute the statement and fetch results
        $invoice = $fetchStmt->executeQuery()->fetchAllAssociative();  // Correct method to fetch results

        // Return the result
        return $invoice ?: [];

    }

    public function all(InvoiceStatus $invoiceStatus): array
    {
        // Use Doctrine DBAL's QueryBuilder to fetch data
        $stmt = $this->db->createQueryBuilder()
            ->select('id', 'invoice_number', 'amount', 'invoice_status')  // Columns you want to fetch
            ->from('invoices')  // Table name
            ->where('invoice_status = :status')  // Use WHERE clause with a named parameter
            ->setParameter(':status', $invoiceStatus->value);  // Bind the value to the parameter
    
        // Execute the query and fetch the results
        $result = $stmt->executeQuery();
    
        // Return the result as an array of associative arrays
        return $result->fetchAllAssociative();
    }
    
}
