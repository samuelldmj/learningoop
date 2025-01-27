<?php 

declare(strict_types=1); 

namespace   App\Enums;
enum InvoiceStatus: int {



    case PENDING  = 1;
    case PAID = 2;
    case VOID = 3;
    case FAILED = 4;


    // public const PENDING = 0;
    // public const PAID = 1;
    // public const VOID = 2;
    // public const FAILED = 3;

    // public static function all(): array {
    //     return [
    //         self::PENDING,
    //         self::PAID,
    //         self::VOID,
    //         self::FAILED
    //     ];
    // }

    //methods in eneums
    public function toString(){
        return 'Paid';
    }
}