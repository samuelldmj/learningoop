<?php
declare(strict_types=1);
namespace   App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\EnumType;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('invoices')]
class Invoice  {

    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column('amount', type: 'decimal', precision: 10, scale: 2)]
    private float $amount;

    #[Column('invoice_number')]
    private string $invoiceNumber;

    #[Column('invoice_status', enumType: InvoiceStatus::class)]
    private InvoiceStatus $invoiceStatus; 

    #[OneToMany(targetEntity: InvoiceItem::class, mappedBy: 'invoice')]
    private Collection $items;

    #[Column(name: 'created_at')]
    private \DateTime $createdAt;


    public function __construct()
{
    $this->items = new  ArrayCollection();
}    

public function setID($id){
        $this->id = $id;
    }

    public function getID(){
       return $this->id;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount(){
        return $this->amount ;
    }
    public function setInvoiceStatus($invoiceStatus){
        $this->invoiceStatus = $invoiceStatus;
        return $this;
    }

    public function getInvoiceStatus(){
       return $this->invoiceStatus ;
    }

    public function setInvoiceNumber($invoiceNumber){
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getInvoiceNumber(){
       return $this->invoiceNumber ;
    }
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getCreatedAt(){
       return $this->createdAt ;
    }


    public function addItem(InvoiceItem $item){
        $this->items->add($item);
        return $this;
    }
}