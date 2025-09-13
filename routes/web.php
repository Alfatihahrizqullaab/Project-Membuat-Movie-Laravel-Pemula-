<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/movie', function(){
//     return "Hallo movue";
// });



$movies = [];



Route::group(
    [
        'middleware' => ['isAuth'],
        'prefix' => 'movie',
        'as' => 'movie.'
    ], function () use($movies){

        Route::get('/',[MovieController::class, 'index']);


        Route::post('/', [MovieController::class, 'store']);

        Route::put('/{id}', [MovieController::class, 'update']);

        // Route::patch('/{id}', function($id) use ($movies){
        //     $movies[$id]['title'] = request('title');
        //     $movies[$id]['year'] = request('year');
        //     $movies[$id]['genre'] = request('genre');

        //     return $movies;
        // });

        Route::delete('/{id}', function($id) use ($movies){
            unset($movies[$id]);

            return $movies;
        });



        //meggambil data lebih spesifik
        Route::get('/{id}', [MovieController::class, 'show'])->middleware(['isMember']);



        Route::delete('/{id}', function($id) use ($movies){
            
        });

        Route::post('/{id}', function($id) use ($movies){
        
        });

        Route::put('/{id}', function($id) use ($movies){

        });

        Route::patch('/{id}', function($id) use ($movies){
        
        });

       
    }
);

        Route::get('/pricing', function(){
            return "Please, buy a membership";
        });

        Route::get('/login', function(){
            return 'login page';
        })->name('login');

