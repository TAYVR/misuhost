<?php

use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SoungController;
use App\Models\Soung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

        $users = User::with('soungs')
        ->select('users.id', 'users.name','users.profil', \DB::raw('SUM(soungs.views) as total_views'))
        ->leftJoin('soungs', 'users.id', '=', 'soungs.user_id')
        ->groupBy('users.id', 'users.name','users.profil')
        ->orderBy('total_views', 'desc')
        ->limit(4)->get();



    return view('home', compact('users'));
})->name('home');

Route::get('/login', [UserController::class,'loginPage'])->name('loginPage');
Route::post('/login', [UserController::class,'login'])->name('login');
Route::get('/signup', [UserController::class,'create'])->name('signup');
Route::post('/signup', [UserController::class,'store'])->name('store');
Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('auth/google', [SocialiteController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [SocialiteController::class,'handleGoogleCallback']);


Route::get('/{id}', [UserController::class,'show'])->name('show')->middleware('auth');

Route::get('/singer/{id}', [UserController::class,'userpage'])->name('userpage');

Route::get('/{id}/settings', [UserController::class,'edit'])->name('edit')->middleware('auth');
Route::put('/{id}', [UserController::class,'update'])->name('update')->middleware('auth');
Route::get('/song/{id}/favorites', [UserController::class,'myFavorit'])->name('myFavorit')->middleware('auth');



Route::get('/song/add', [SoungController::class,'create'])->name('addsoung')->middleware('auth');
Route::post('/song', [SoungController::class,'store'])->name('storesoung')->middleware('auth');
Route::delete('/song/{id}', [SoungController::class,'destroy'])->name('deletesoung')->middleware('auth');
Route::get('/song/{id}/editsong', [SoungController::class,'edit'])->name('editsong')->middleware('auth');
Route::put('/song/{id}/editsong', [SoungController::class,'update'])->name('updatesong')->middleware('auth');

Route::get('/song/{id}/favorites', [UserController::class,'myFavorit'])->name('myFavorit')->middleware('auth');

Route::get('/songs/listen/{id}', [SoungController::class,'show'])->name('listensong');








Route::get('/songs/latest', [SoungController::class,'latestSongs'])->name('latestSongs');
Route::get('/songs/all', [SoungController::class,'index'])->name('allsong');
Route::get('/songs/tranding', [SoungController::class,'trandsong'])->name('tranding');


Route::post('/songs/listen/{id}/like', [SoungController::class,'like'])->name('like')->middleware('auth');

Route::post('/songs/listen/{id}/addToFavorite', [UserController::class,'addToFavorite'])->name('addToFavorite')->middleware('auth');



Route::post('/search', function(Request $request) {
    $data =$request->data;
    $users=User::where('name','like',$data.'%')->select('id','name')->limit(10)->get();
    return response()->json(['users'=> $users]);
})->name('search');




Route::post('/song/{id}/addview', [SoungController::class,'addView'])->name('addView');
Route::post('/song/{id}/getPrevOrNext', function(Request $request, $id){

    if($request->type=="next"){
        $song=Soung::where('id','>',$id)->first();

    }else{
        $song=Soung::where('id','<',$id)->first();
    }

    if($song){
        return response()->json(['song'=> $song]);
    }else{
        return response()->json(['song'=> Soung::first()]);
    }


})->name('getPrevOrNext');


Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');

