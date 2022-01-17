<?php

namespace App\Http\Traits;


use Illuminate\Database\Query\Builder;
use Stripe\StripeClient;

trait Stripe
{

    public object $request;
    public string $type;

    public function createProduct($request, $type, $method, $model)
    {
        $this->request = $request;
        $this->type = $type;
        $price = $this->request->price ? $request->price : 50;
        $stripeKey = env('STRIPE_SECRET');
        $this->stripe = new StripeClient($stripeKey);

        if (!$request) return 'verified that all params is not empty';

        try {
            if ($method === 'create')
                $product = $this->productCreate('product');
            else
                $product = $this->editProduct('product', $model);

            $dataApi = [
                'unit_amount' => (int)$price * 100,
                'currency' => 'eur',
                'product' => $product->id,

            ];

            if ($this->type === 'service')
                $dataApi['recurring'] = ['interval' => 'month'];


            if ($method === 'create')
                $price = $this->productCreate('price', $dataApi);
            else
                $price = $this->editProduct('price', $model, $dataApi);


            return $price;

        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function productCreate($type, $dataApi = null)
    {
        if ($type === 'product') {
            $data = $this->stripe->products->create([
                'name' => $this->request->title,
                'type' => $this->type,
            ]);
        }
        if ($type === 'price') {
            $data = $this->stripe->prices->create($dataApi);
        }

        return $data;

    }

    public function editProduct($type, $model, $dataApi = null)
    {
            $product = $this->stripe->prices->retrieve($model->stripe_id);

        if ($type === 'product') {
            $data = $this->productCreate('product' );

        }
        if ($type === 'price') {

            // create price from products
            $data = $this->productCreate('price' , $dataApi);

        }

//        $this->stripe->plans->delete($model->stripe_id); NOT WORKING
//        $this->stripe->products->delete($product->product); NOT WORKING

        return $data;
    }


}
