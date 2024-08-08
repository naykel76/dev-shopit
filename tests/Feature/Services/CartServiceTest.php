<?php

test('the cart helper returns an instance of CartService', function () {
    expect(cart())->toBeInstanceOf(CartService::class);
})->todo();

// add intercafe to CartService and use facade
