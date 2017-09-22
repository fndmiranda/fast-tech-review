<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Modules\Beer\Http\Controllers'], function() {
    Route::resource('beers', 'BeerController', ['only' => ['index', 'show'], 'middleware' => ['api']]);
    Route::resource('ingredients', 'IngredientController', ['only' => ['index', 'show'], 'middleware' => ['api']]);
});
