<?php

Route::group(['prefix' => 'items', 'as' => 'api.item.'], function () {
    $ctrl = 'Api\ItemController';
    Route::get('/', usesas($ctrl, 'index'));
});
