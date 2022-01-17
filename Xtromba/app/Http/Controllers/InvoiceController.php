<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Konekt\PdfInvoice\InvoicePrinter;

class InvoiceController extends Controller
{
    /**
     * @var object
     */
    public $items;
    /**
     * @var
     */
    public $transaction;
    /**
     * @var float
     */
    public float $vat;
    /**
     * @var object
     */
    public object $invoice;
    /**
     * @var int
     */
    public int $total;

    /**
     * @param array $items
     * @param array $transaction
     */
    public function __construct(array $items , array $transaction)
    {
        $this->vat = 1.21;
        $this->items = collect([$items]);
        $this->transaction = $transaction;

    }

    public function generate(): void
    {


        $size = 'A4';
        $currency = '€';
        $language = 'es';
        $this->invoice = new InvoicePrinter($size, $currency, $language);
        $this->setup();

//        $this->invoice->setLogo("images/sample1.jpg");   //logo image path
        $this->invoice->setColor("#e52713");      // pdf color scheme
        $this->invoice->setType("Sale invoice N° {$this->transaction['id']}");    // Invoice Type
        $this->invoice->setReference("{$this->transaction['reference']}");   // Reference
        $this->invoice->setDate(date('M dS ,Y',strtotime( $this->transaction['created_at'])));   //Billing Date
        $this->invoice->setDue(date('M dS ,Y', strtotime('+3 months')));    // Due Date
        $this->invoice->setFrom([config('app.name'), "128 AA Juanita Ave", "Glendora , CA 91740", '']);
        $this->invoice->setTo(['Gustavo Alejandro', 'llxsantaellaxll@gmail.com', ' ']);
        $this->addItem();

//        $this->invoice->addTotal("Total",  $this->calculateTotal(isset($this->transaction['total']) ?$this->transaction['total']:405));
//        $this->invoice->addTotal("VAT 21%", $this->vat);

        $this->invoice->addTotal("Total pagado", $this->calculateTotal(isset($this->transaction['total']) ?$this->transaction['total']:0), true);

        $this->invoice->addBadge("Payment Paid");

        $this->invoice->addTitle("Important Notice");

        $this->invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");

        $this->invoice->setFooternote(config('app.name'));

        if(!Storage::disk('public')->exists('invoices')) {

            Storage::disk('public')->makeDirectory('invoices', 777, true);

        }
        $this->invoice->render(("storage/invoices/factura-{$this->transaction['id']}.pdf"), 'F');
        /* I => Display on browser, D => Force Download, F => local path save, S => return document as string */
    }


    public function addItem(): void
    {
        foreach ($this->items as $item) {
            $this->invoice->addItem($item['item'], $item['description'], $item['quantity'], $this->vat, $item['price'], $item['discount'], $this->calculateTotal($item['price']));
        };
    }

    /**
     * @param float $total
     * @return float|int
     */
    public function calculateTotal(float $total)
    {
        return abs(round(($total / $this->vat) - $total, 2));
    }

    /**
     * @return void
     */
    public function setup(): void
    {
        $this->invoice->changeLanguageTerm('vat', 'IVA 21%');
    }

    public function download()
    {

    }
}
