<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/', [taskController::class,'getindex'])->name('asd');
Route::get('/task', [taskController::class,'index'])->name('index');

Route::post('delete/{id}', [taskController::class,'delete'])->name('task.delete');
/*
Route::post('update/{id}', function ($id) {
    DB::delete(
        'update tasks set name=?,updated_at=? where id = ?', [$_POST['name_upda'],now(),$id])
        ;

    return redirect()->back();
});
*/
Route::post('insert',[taskController::class,'insert'])->name('task.insert');
Route::post('update/{id}',[taskController::class,'update'])->name('task.upadte');
