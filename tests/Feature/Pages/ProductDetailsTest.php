<?php

use Naykel\Shopit\Models\Product;

it('shows product details', function () {
    $product = createReleasedProduct();

    $this->get(route('products.show', $product))
        ->assertOk()
        ->assertSeeText([
            $product->name,
            $product->code,
            $product->description,
            $product->price,
        ])
        ->assertSee($product->image_name);
});

it('shows the main image url from the model', function () {
})->todo();

it('shows the add to cart button', function () {
})->todo();
