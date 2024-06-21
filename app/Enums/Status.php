<?php

namespace App\Enums;

class Status
{

    public const PENDING = 'pending';
    public const PAID = 'paid';
    public const DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined'
    ];
}
