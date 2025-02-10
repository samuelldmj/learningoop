<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

/**
 * @property int $id
 * @property int $invoice_id
 * @property string $invoice_description
 * @property int $quantity
 * @property float $unit_price
*/

class InvoiceItem  extends Model {

    public $timestamps = false;

    // protected $table = 'invoice_items';


    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}