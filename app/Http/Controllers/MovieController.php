<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller
{
    public $movies = [];

    public function __construct(){
        for($i = 0; $i < 10; $i++){
            $this->movies[] = [
                'title' => 'Movie Controller' . $i,
                'year' => '2022',
                'genre' => 'horor'
            ];

            }

    }

    public static function middleware(){
       return[
        'isAuth',
        new Middleware('isMember', only:['show'])
       ];
    }

    public function index(){
        return $this->movies;
    }

    public function show($id){
        return $this->movies[$id];
    }

    public function store(){
        $this->movies[] = [
            'title' => request('title'),
            'year' => request('year'),
            'genre' => request('genre')
        ];

        return $this->movies;
    }

    public function update($id, Request $request)
    {
    $this->movies[$id]['title'] = $request->title;
    $this->movies[$id]['year']  = $request->year;
    $this->movies[$id]['genre'] = $request->genre;

    // return hanya movie yang baru diupdate
    return $this->movies[$id];
    }

    public function destroy($id){
        unset($this->movies[$id]);
        return $this->movies;
    }

}
