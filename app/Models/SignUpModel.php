<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class SignUpModel extends Model
{
    public function __construct(protected UserModel $userModel, protected InvoiceModel $invoiceModel)
    {
        parent::__construct();
    }

    public function register(array $userInfo, array $invoiceInfo)
    {

        try {

            $this->db->beginTransaction();

            $userId = $this->userModel->create($userInfo['email'], $userInfo['full_name']);
            $invoiceId = $this->invoiceModel->create($invoiceInfo['amount'], $userId);

            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }

        return $invoiceId;
    }
}
