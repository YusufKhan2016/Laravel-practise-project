<?php

use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',['posts' => Post::paginate(3)]);
})->name('home');

// Route ::get('/add',function (){
//     return view('add');
// });

Route::get('/add',[PostController::class, 'add']);

Route::post('/store',[PostController::class, 'dataStore'])->name('store');

// here in the postcontroller, the datastore and add is the method ....
// also the store in name is the name of where is the data is gonna store

// to edit specific data collected by id 
Route::get('/edit/{id}', [PostController::class, 'editData']) -> name('edit');
Route::post('/update/{id}', [PostController::class, 'updateData']) -> name('update');

// to delete specific data collected by id 

Route::get('/delete/{id}', [PostController::class, 'deleteData']) -> name('delete');

?>