<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Task;
class taskController extends Controller
{
    //
    public function getindex(){
        return view('dashboard');
    }
    public function index(){
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
    }
    public function delete($id){
        Task::where('id',[$id])->delete();
        //DB::delete(
          //  'delete from tasks where id = ?', [$id])
            //;

        return redirect()->back();
    }
    public function insert(){

            //DB::table('tasks')->insert([
              //  'name' => $_POST['name'],
              //  'created_at' => now(),
                //'updated_at' => now()
            //]);
            $task = new Task();
            $task->name = $_POST['name'];
            $task->save();


        return  redirect('/task');//redirect('/');
    }
    public function update($id){
        Task::where('id',$id)->update([
            'name' => $_POST['name'],
            'updated_at' => now()
        ]);
       // DB::delete(
        //    'update tasks set name=?,updated_at=? where id = ?', [$_POST['name'],now(),$id])
         //   ;
         return  redirect('/task');//redirect('/');

    }

}
