<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Commands\CommandsController;


// create new item
Route::post('item/create', [ItemController::class, 'create']);
// select all items
Route::get('items', [ItemController::class, 'all_items']);
// reverse code
Route::post('reverse', [ItemController::class, 'reverse']);
// seed categories with items through url:"localhost:8000/api/seed"
Route::get('/seed', [CommandsController::class, 'seed_category_with_item']);
