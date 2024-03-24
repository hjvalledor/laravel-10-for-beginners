<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
   //  return view('welcome');

   // fetch * users
//    $users = DB::select("select * from users");
   $user = DB::table("users")->get();

   // create new user
//    $users = DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
//         'Guenny', 
//         'guenalexis.gabutin@gmail.com', 
//         'password'
//     ]);

    // $user = DB::table("users")->insert([
    //     "name"=> "Guenny",
    //     "email"=> "guenalexis@gmail.com",
    //     "password"=> bcrypt("password")
    // ]);

    // update a user
    // $users = DB::update(
    //     "update users set email='guen.gabutin16@gmail.com' where id = 2"
    // );

    // $user = DB::table("users")
    //     ->where("id", 3)
    //     ->update(["email" => 'guen.gabutin16@gmail.com'])
    // ;

    // delete a user
    // $users = DB::delete("delete from users where id=2");
    // $user = DB::table("users")
    //     ->where("id", 3)
    //     ->delete()
    // ;

   dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
