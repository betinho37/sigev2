<?php
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/home', 'PaginaInicialController@index');
Route::get('paginainicial', 'PaginaInicialController@index');
Route::get('/', 'Auth\LoginController@showLoginForm');
//
Route::get('clientescadastrados', 'ClientesController@index');
Route::get('cliente/create', ['as' => 'clientes.create', 'uses' => 'ClientesController@create']);
Route::post('cliente/store', ['as' => 'cliente.store', 'uses'=> 'ClientesController@store']);
Route::get('clientescadastrados/edit/{id}', ['as' => 'clientescadastrados.edit', 'uses'=> 'ClientesController@edit']);
Route::put('clientescadastrados/update/{id}', ['as' => 'clientescadastrados.update', 'uses'=> 'ClientesController@update']);
Route::get('clientescadastrados/destroy/{id}', ['as' => 'clientescadastrados.destroy', 'uses'=> 'ClientesController@destroy']);
Route::get('/search', ['as' => 'ClientesController.search', 'uses' => 'ClientesController@search']);
//
Route::resource('pagamentos', 'pagamentos');
Route::resource('/pagamentos', 'pagamentos', [
    'except' => ['edit', 'show', 'store']
  ]);


Route::get('pagamentos/download', 'pagamentos@download');
Route::put('pagamentos/update/{id}', 'pagamentos@update');
Route::get('deletar/arquivo/{name}', 'pagamentos@deletfile')->name('deletar.arquivo');
//
Route::get('receita', 'ReceitaController@index');
Route::get('receita/create', ['as' => 'receita.create', 'uses'=> 'ReceitaController@create']);
Route::post('receita/store', ['as' => 'receita.store', 'uses'=> 'ReceitaController@store']);
Route::put('receita/update/{id}', ['as' => 'receita.update', 'uses'=> 'ReceitaController@update']);
Route::get('receita/edit/{id}', ['as' => 'receita.edit', 'uses'=> 'ReceitaController@edit']);
Route::get('receita/destroy/{id}', ['as' => 'receita.destroy', 'uses'=> 'ReceitaController@destroy']);
Route::get('receita/{receita}/download', 'ReceitaController@download');
Route::get('excluir/arquivo/{name}', 'ReceitaController@deletfile')->name('excluir.arquivo');
//
Route::get('empresas', 'EmpresasController@index');
Route::get('empresas/create', ['as' => 'empresas.create', 'uses'=> 'EmpresasController@create']);
Route::post('empresas/store', ['as' => 'empresas.store', 'uses'=> 'EmpresasController@store']);
Route::get('empresas/destroy/{id}', ['as' => 'empresas.destroy', 'uses'=> 'EmpresasController@destroy']);
//
Route::get('destino', 'DestinoController@index');
Route::get('destino/create', ['as' => 'destino.create', 'uses'=> 'DestinoController@create']);
Route::post('destino/store', ['as' => 'destino.store', 'uses'=> 'DestinoController@store']);
Route::get('destino/destroy/{id}', ['as' => 'destino.destroy', 'uses'=> 'DestinoController@destroy']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
