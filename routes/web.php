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

Route::post('/search/user',[
        'uses'=>'AdminController@searchUser',
        'as'=>'searchUser'
    ])->middleware('auth');

Route::post('/search/candidate',[
        'uses'=>'AdminController@searchCandidate',
        'as'=>'searchCandidate'
    ])->middleware('auth');

Route::get('/logout',[
        'uses'=>'Auth\LoginController@logout',
        'as'=>'logout'
    ]);
    

    //register
Route::post('/register',[
        'uses'=>'VoterController@register',
        'as'=>'register'
    ])->middleware('auth');

// Auth::routes();

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

Route::get('/login',[
    'uses'=>'Auth\LoginController@show',
    'as'=>'loginPage'
]);
Route::post('/login',[
    'uses'=>'Auth\LoginController@login',
    'as'=>'login'
]);

Route::get('/admin/candidates',[
    'uses'=>'AdminController@getCandidates',
    'as'=>'admin.candidates'
])->middleware(['admin','auth']);

Route::post('/add/candidate',[
    'uses'=>'AdminController@addCandidate',
    'as'=>'candidate.add'
])->middleware(['admin','auth']);


Route::post('/admin/priviledge',[
    'uses'=>'AdminController@addPriviledge',
    'as'=>'priviledge'
])->middleware(['admin','auth']);

Route::post('/admin/seat',[
    'uses'=>'AdminController@addSeat',
    'as'=>'seat'
])->middleware(['admin','auth']);


Route::post('/admin/department',[
    'uses'=>'AdminController@addDepartment',
    'as'=>'department'
])->middleware(['admin','auth']);

Route::post('/admin/faculty',[
    'uses'=>'AdminController@addFaculty',
    'as'=>'faculty'
])->middleware(['admin','auth']);

Route::get('/admin/departments',[
    'uses'=>'AdminController@department',
    'as'=>'admin.department'
])->middleware(['admin','auth']);


Route::get('/admin/faculties',[
    'uses'=>'AdminController@faculty',
    'as'=>'admin.faculty'
])->middleware(['admin','auth']);


Route::get('/admin/seats',[
    'uses'=>'AdminController@seat',
    'as'=>'admin.seat'
])->middleware(['admin','auth']);


//edit
Route::get('/users/{id}/edit',[
    'uses'=>'AdminController@editStudent',
    'as'=>'editStudent'
])->middleware(['admin','auth']);

Route::post('/users/{id}/',[
    'uses'=>'AdminController@updateStudent',
    'as'=>'updateStudent'
])->middleware(['admin','auth']);

Route::get('/candidate/{id}/edit',[
    'uses'=>'AdminController@editCandidate',
    'as'=>'editCandidate'
])->middleware(['admin','auth']);

Route::get('/candidate/{id}/',[
    'uses'=>'AdminController@showCandidate',
    'as'=>'showCandidate'
])->middleware(['admin','auth']);

Route::post('/candidate/{id}/',[
    'uses'=>'AdminController@updateCandidate',
    'as'=>'updateCandidate'
])->middleware(['admin','auth']);


//delete
Route::delete('/destroyStudent/{id}',[
    'uses'=>'AdminController@destroyStudent',
    'as'=>'destroyStudent'
])->middleware(['admin','auth']);

Route::delete('/destroyCandidate/{id}',[
    'uses'=>'AdminController@destroyCandidate',
    'as'=>'destroyCandidate'
])->middleware(['admin','auth']);


Route::delete('/destroyFaculty/{id}',[
    'uses'=>'AdminController@destroyFaculty',
    'as'=>'destroyFaculty'
])->middleware(['admin','auth']);

Route::delete('/destroyDepartment/{id}',[
    'uses'=>'AdminController@destroyDepartment',
    'as'=>'destroyDepartment'
])->middleware(['admin','auth']);

Route::delete('/destroySeat/{id}',[
    'uses'=>'AdminController@destroySeat',
    'as'=>'destroySeat'
])->middleware(['admin','auth']);


//Vote time Route

// Route::get('/admin/votetime',[
//     'uses'=>'AdminController@voteTime',
//     'as'=>'voteTime'
// ])->middleware(['admin','auth']);

Route::get('/votetime/{id}/edit',[
    'uses'=>'AdminController@editVoteTime',
    'as'=>'editVoteTime'
])->middleware(['admin','auth']);


Route::post('/voteTime/{id}/',[
    'uses'=>'AdminController@updateVoteTime',
    'as'=>'updateVoteTime'
])->middleware(['admin','auth']);

