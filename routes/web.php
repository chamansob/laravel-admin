<?php
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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
Route::view('/', 'welcome');

Route::get('/per',function(){
return Permission::select('name', 'guard_name','group_name')->get();
});
require __DIR__ . '/user.php';

require __DIR__ . '/admin.php';



require __DIR__ . '/auth.php';