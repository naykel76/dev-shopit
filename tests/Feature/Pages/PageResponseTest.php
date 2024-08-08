<?php

use Naykel\Shopit\Models\Product;

test('gives successful response for home page', function () {
    $this->get(route('home'))->assertOk();
});

test('gives successful response for products page', function () {
    $this->get(route('products.index'))->assertOk();
});

test('gives successful response for product details page', function () {
    $product = Product::factory()->create();
    $this->get(route('products.show', $product))->assertOk();
});
