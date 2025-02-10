<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Carbon;

require_once  __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/../eloquent.php";

//carbon library is used to work with date.


//CREAT OPERATION
//transaction is used for handling possible inconsistency when inserting data into the db. due to error etc.
// Capsule::connection()->transaction(function(){
//     $invoice = new Invoice();

// $invoice->amount = 45;
// $invoice->invoice_number = '1' ;
// $invoice->invoice_status = InvoiceStatus::PENDING;
// $invoice->created_at = new DateTime();
// $invoice->due_date = (new Carbon())->addDays(10);

// //PERSIST IN D DB or save the record above.
// $invoice->save();


// //invoice_items

// $items = [['item 1', 1, 15], ['item 2', 3, 7.5], ['item 3', 4, 34.35]];

// // $invoice = (new Invoice())
// // ->setAmount(45)
// // ->setInvoiceNumber('1')
// // ->setInvoiceStatus(InvoiceStatus::PAID)
// // ->setCreatedAt(new DateTime());


// foreach( $items as [$description, $qty, $unitPrice]){
//     $item = new InvoiceItem();
//     $item->invoice_description = $description;
//     $item->quantity = $qty;
//     $item->unit_price = $unitPrice;

//     $item->invoice_id = $invoice->id;
//     $item->invoice()->associate($invoice);

//     $item->save();
// }

// });


//UPDATE OPERATION
$invoiceId = 1;
// echo Invoice::query()->where('id', '=', $invoiceId)->toSql();//->update(['invoice_status' => InvoiceStatus::PAID]);
// echo Invoice::query()->where('id', '=', $invoiceId)->update(['invoice_status' => InvoiceStatus::PAID]);
// echo Invoice::query()->where('id', '=', $invoiceId)->get();
// echo Invoice::query()->where('invoice_status', '=', InvoiceStatus::PAID)->get()->each(function(Invoice $invoice){
//     echo $invoice->id . ',' . $invoice->invoice_status->toString() . ',' . $invoice->created_at->format('m/d/Y') . PHP_EOL; 
// });

echo Invoice::where('invoice_status', '=', InvoiceStatus::PAID)->get()->each(function(Invoice $invoice){
    echo $invoice->id . ',' . $invoice->invoice_status->toString() . ',' . $invoice->created_at->format('m/d/Y') . PHP_EOL; 
});