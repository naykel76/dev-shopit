<?php

use Naykel\Shopit\Models\Product;

function createReleasedProduct()
{
    return Product::factory()->released()->create();
}

it('shows products overview (index)', function () {
    $firstProduct = createReleasedProduct();
    $secondProduct = createReleasedProduct();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSeeText([
            $firstProduct->name, $firstProduct->price,
            $secondProduct->name, $secondProduct->price,
        ]);
});

it('only shows active products', function () {
    $activeProduct = createReleasedProduct();
    $notActiveProduct = Product::factory()->create();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSeeText($activeProduct->name)
        ->assertDontSeeText($notActiveProduct->name);
});

it('has a link to product details page', function () {
    $product = createReleasedProduct();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSee(route('products.show', $product));
});

it('shows a message when no products are available', function () {
    $this->get(route('products.index'))
        ->assertOk()
        ->assertSeeText('No products available');
});

it('shows the add to cart button', function () {
})->todo();

it('paginates the products list', function () {
    Product::factory()->count(30)->create();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSee('Next')
        ->assertSee('Previous');
})->todo();

it('can search for products', function () {
})->todo();
