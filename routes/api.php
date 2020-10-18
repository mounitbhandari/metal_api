<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//testing purpose-------------
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::get('/me', 'AuthController@me');
Route::get('/check', 'AuthController@check');
Route::get('/logout', 'AuthController@logout');
Route::get('/payloads', 'AuthController@payload');
Route::get('/refresh', 'AuthController@refresh');


// LedgerGroup
Route::get('/ledgerGroups','LedgerGroupController@index');
Route::get('/ledgerGroups/{id}','LedgerGroupController@getLedgerGroupById');
Route::post('/ledgerGroups','LedgerGroupController@store');



Route::group(array('prefix' => 'dev'), function() {



});







//secured links here
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    Route::get('/incomeLedgers', 'LedgerController@getIncomes');
    Route::get('/expenditureLedgers', 'LedgerController@getExpenditures');
    Route::get('/assets', 'AssetController@index');

    Route::get('/incomeTransactions', 'TransactionController@getIncomeTransactions');
    Route::post('/incomeTransactions', 'TransactionController@saveIncomeTransaction');

    Route::post('/expenditureTransactions', 'TransactionController@saveExpenditureTransaction');
    Route::get('/expenditureTransactions', 'TransactionController@getExpenditureTransactions');

    Route::get('/transactionYears', 'TransactionController@get_transaction_years');

    Route::get('/incomeLedgersTotal/{year}', 'TransactionController@get_income_ledgers_group_total_by_year');
    Route::get('/incomeLedgersTotal/{year}/{month}', 'TransactionController@get_income_ledgers_group_total_by_year_n_month');

    Route::get('/expenditureLedgersTotal/{year}', 'TransactionController@get_expenditure_ledgers_group_total_by_year');
    Route::get('/expenditureLedgersTotal/{year}/{month}', 'TransactionController@get_expenditure_ledgers_group_total_by_year_n_month');

    Route::post('/ledgers', 'LedgerController@create');

    Route::get('/cashBook', 'TransactionController@getCashBook');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
