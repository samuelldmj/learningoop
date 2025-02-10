<?php 

declare(strict_types=1);
namespace   App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table('invoice_items')]
class InvoiceItem {

    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    //undirectional relationship
    #[Column('invoice_id')]
    private int $invoiceId;

    #[Column('invoice_description')]
    private string $invoiceDescription;

    #[Column('quantity')]
    private int $quantity;

    #[Column(name:'unit_price',type: 'decimal' ,precision: 10, scale: 2)]
    private float $unitPrice;

    //no need for this below because we have type hinted invoice
    // #[ManyToOne(Invoice::class)]
    /*
    bidirectional relationship: we have the owning side and the inverse side.
    The owning side is always the manyToOne while the 
    inverse side is the oneToMany
    */
    #[ManyToOne(inversedBy: 'items')]
    private Invoice $invoice;


    
public function setID($id){
    $this->id = $id;
    return $this;
}

public function getID(){
   return $this->id;
}

public function setQuantity($quantity){
    $this->quantity = $quantity;
    return $this;
}

public function getQuantity(){
    return $this->quantity ;
}


public function setInvoiceDescription($invoiceDescription){
    $this->invoiceDescription = $invoiceDescription;
    return $this;
}

public function getInvoiceDescription(){
    return $this->invoiceDescription ;
}
public function setUnitPrice($unitPrice){
    $this->unitPrice = $unitPrice;
    return $this;
}

public function getUnitPrice(){
    return $this->unitPrice ;
}
public function setInvoiceId($invoiceId){
    $this->invoiceId = $invoiceId;
    return $this;
}

public function getInvoiceId(){
    return $this->invoiceId;
}


}