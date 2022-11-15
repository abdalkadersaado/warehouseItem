<?php

namespace App\Http\Controllers\Commands;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CommandsController extends Controller
{
    public function seed_category_with_item()
    {
        $exitCode = Artisan::call('db:seed');
        return '<h1>seed Category with items is done</h1>';
    }
}
