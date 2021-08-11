<?php

use App\Jobs\ChangeNewUserName;
use App\Jobs\IncreaseUserCounter;
use App\Models\CountUser;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/exemplo', function () {
    $user = User::create([
        'name' => 'Teste 2',
        'email' => 'teste@dois.com.br',
        'password' => bcrypt('12345678')
    ]);

    IncreaseUserCounter::dispatch();
    ChangeNewUserName::dispatch($user);

    return 'Usuário Cadastrado!';
});
