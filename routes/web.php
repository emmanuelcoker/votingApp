<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// election routes
Route::get('/election/vote',[
        'uses'=>'ElectionController@showVotingPage',
        'as'=>'show'
    ])->middleware(['ready','voter','auth']);
Route::get('/election/results',[
        'uses'=>'ElectionController@showResults',
        'as'=>'results'
    ]);
Route::post('/candidate/vote',[
        'uses'=>'ElectionController@vote',
        'as'=>'vote'
    ])->middleware(['voter','auth']);

// auth routes
Route::get('/login',[
    'uses'=>'Auth\LoginController@show',
    'as'=>'loginPage'
]);
Route::post('/login',[
    'uses'=>'Auth\LoginController@login',
    'as'=>'login'
]);
Route::get('/logout',[
    'uses'=>'Auth\LoginController@logout',
    'as'=>'logout'
]);

// auth routes
Route::post('/register',[
    'uses'=>'VoterController@register',
    'as'=>'register'
])->middleware('auth');

// admin Routes
Route::get('/admin/index',[
    'uses'=>'AdminController@showIndex',
    'as'=>'admin.index'
])->middleware(['admin','auth']);
// auth routes
Route::get('/admin/login',[
    'uses'=>'Auth\LoginController@showLogin',
    'as'=>'admin.login'
]);

Route::get('/admin/candidates',[
    'uses'=>'AdminController@getCandidates',
    'as'=>'admin.candidates'
])->middleware(['admin','auth']);

Route::post('/add/candidate',[
    'uses'=>'AdminController@addCandidate',
    'as'=>'candidate.add'
])->middleware(['admin','auth']);
