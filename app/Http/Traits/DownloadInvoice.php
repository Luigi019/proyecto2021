<?php
namespace App\Http\Traits;

use App\Http\Controllers\InvoiceController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

trait DownloadInvoice {

    public function downloadInvoice(Transaction $transaction): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $fileName = "factura-{$transaction->id}.pdf";
        $path = Storage::disk('public')->path('invoices/'.$fileName);
        if(!\File::exists($path))
        {

            $items = [
                'id'=>$transaction->id,
                'item' => $transaction->transactions->title,
                'description' => $transaction->transactions->description,
                'quantity' => 1,
                'reference' => $transaction->reference,
                'price' => $transaction->transactions->price,
                'discount' => 0,
            ];
            $invoice =  new InvoiceController($items  , $transaction->toArray());
            $invoice->generate();
        }


        return response()->download($path, $fileName);

    }

}
