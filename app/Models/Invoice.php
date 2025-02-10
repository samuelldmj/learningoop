<?php

declare(strict_types=1);
namespace App\Models;

use App\Enums\InvoiceStatus;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $invoice_number
 * @property float $amount
 * @property InvoiceStatus $invoice_status
 * @property Carbon $due_date
 * @property DateTime $created_at
 * 
 */

class Invoice extends Model
{

  //not compulsory to set this by convention, eloquent model are mapped with thier respective table names.
  protected $table = 'invoices';

  //handling primary keys
  // //when the key is not incremental and has different data type. follow the below instruction.
  // protected $primaryKey = 'invoice_uuid';
  // public $incrementing = false;
  // protected $keyType = 'string';


  //by default the eloquent orm expect the updated_at and created_at column it will automatically set the timestamps value.
  //if one of the column is missing it could trigger an error. to disable,  follow the code below

  public $timestamps = false;

  //or override them by:

  // public const CREATED_AT = 'created_date';
  // const UPDATED_AT = 'updated_date' ;

  //or disable the other column not available to null

  //eloquent assume that foreign key is table name in singular form (invoice_id)

  public const UPDATED_AT = null;

  protected $casts = [
    'created_at' => 'datetime',
    'due_date' => 'datetime',
    'invoice_status' => InvoiceStatus::class
  ];


  public function items(): HasMany
  {
    return $this->hasMany(InvoiceItem::class);
  }

}