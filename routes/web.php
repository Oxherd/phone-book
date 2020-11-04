<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $data = Contact::paginate(15);

    return response()->json($data, 200, [
        'Content-Type' => 'application/json;charset=UTF-8',
        'Charset' => 'utf-8',
    ], JSON_UNESCAPED_UNICODE);
});
