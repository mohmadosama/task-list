<?php

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


Route::get('/', function () {
     //$name = "mhamad";
    // if (isset($_GET['name'])){
     //    $name = $_GET['name'];
    // }
   // $tasks = ['mhamad 1', 'mhamad 2' , 'mhamad 3' ,'mhamad 4'];
   $nameTask = '';
   $idTask = -1;
    if (isset($_GET['nameTask'])){
        $id_nameTask = $_GET['nameTask'];
        $task = explode('|', $id_nameTask);
        $nameTask = $task[1];
        $idTask = $task[0];
    }
    #$_GET['nameTask'] = '';

    $tasks = DB::select('select * from tasks');

    return view('index',compact('tasks','nameTask','idTask'));
});

Route::post('delete/{id}', function ($id) {
    DB::delete(
        'delete from tasks where id = ?', [$id])
        ;

    return redirect()->back();
});
/*
Route::post('update/{id}', function ($id) {
    DB::delete(
        'update tasks set name=?,updated_at=? where id = ?', [$_POST['name_upda'],now(),$id])
        ;

    return redirect()->back();
});
*/
Route::post('insertOrUpdate/{id}', function ($id) {
    if (isset($_POST['add'])){
        DB::table('tasks')->insert([
            'name' => $_POST['name'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    else{
        DB::delete(
            'update tasks set name=?,updated_at=? where id = ?', [$_POST['name'],now(),$id])
            ;
    }
    return  redirect('/');
});
