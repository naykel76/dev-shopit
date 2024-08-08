<?php

use Naykel\Shopit\Models\Product;

it('only returns released products for released query scope', function () {
    Product::factory()->released()->create();
    Product::factory()->create();

    $this->expect(Product::active()->get())
        ->toHaveCount(1);
});
