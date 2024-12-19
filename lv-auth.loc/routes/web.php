<?php

// use App\Http\Controllers\CardController;
use App\Http\Controllers\CardController;
// use App\Http\Controllers\Task\IndexController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;



// Route::get('/{locale?}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
//         app()->setLocale($locale);
//         Session::put('locale',$locale);
//     }

//     return view('welcome');
// })->name('welcome');
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('main');
    }
    $count = str(User::count('id'));
    for($i = 0; $i<6; $i++){
      if (strlen($count) < 6){
        $count = '0'.$count;
      }
    }
    // dd($count);
    return view('welcome')->with('count', $count);
})->name('welcome');
Route::get('clear', function () {
    Log::debug('CLEARED');
   Artisan::call('cache:clear');
});


// Route::get('/la', [UserController::class, 'index']);
// Route::get('/la', [UserController::class, 'index']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['namespace' => 'App\Http\Controllers\Task'], function () {
        Route::get('main', IndexController::class)->name('main');
        Route::post('tasks', StoreController::class)->name('task.store');
        Route::get('tasks/{task}', ShowController::class)->name('task.show');
        Route::post('tasks/update', UpdateController::class)->name('task.update');
        Route::get('task/delete', DeleteController::class)->name('task.delete');



        // Route::get('rozpisanie', [UserController::class, 'rozpisanie'])->name('rozpisanie');
        Route::get('rozpisanie/{day?}', IndexController::class)->name('rozpisanie');
        Route::post('rozpisanie/{day?}', IndexController::class)->name('rozpisanie.day');
    });




    Route::group(['namespace' => 'App\Http\Controllers\Shop'], function () {
        Route::get('shop', IndexController::class)->name('shop');
        Route::post('invetories', StoreController::class)->name('inventory.store');
        Route::get('invetories/{items}', ShowController::class)->name('invetories.show');
        Route::post('invetories/update', UpdateController::class)->name('inventory.update');
        // Route::get('task/delete', DeleteController::class)->name('task.delete');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Quest'], function () {
        // Route::get('shop', IndexController::class)->name('shop');
        // Route::post('invetories', StoreController::class)->name('inventory.store');
        Route::get('quests/{quest}', ShowController::class)->name('quest.show');
        // Route::post('invetories/update', UpdateController::class)->name('inventory.update');
        // Route::get('task/delete', DeleteController::class)->name('task.delete');
    });





    Route::group(['namespace' => 'App\Http\Controllers\Statistic'], function () {
        Route::post('task/complete', CompleteController::class)->name('task.complete');
        Route::post('records/update', UpdateController::class)->name('record.update');
    });


    Route::get('team', [UserController::class, 'team'])->name('team');
    Route::get('premium', [UserController::class, 'premium'])->name('premium');
    Route::get('options', [UserController::class, 'options'])->name('options');
    Route::get('chat', [UserController::class, 'chat'])->name('chat');
    Route::get('quest', [UserController::class, 'quest'])->name('quest');
    Route::get('statistic', [UserController::class, 'statistic'])->name('statistic');
    Route::get('isnt', [UserController::class, 'isnt'])->name('isnt');



    Route::post('uplvl', [UserController::class, 'upLvl'])->name('upLvl');


});

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('registration');
    Route::post('register', [UserController::class, 'store'])->name('user.store');

    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password', function () {
        return view('door.forgot-password');
    })->name('password.request');
    Route::post('forgot-password', [UserController::class, 'forgotPasswordStore'])
        ->name('password.email')->middleware('throttle:3,1');
    Route::get('reset-password/{token}', function (string $token) {
        return view('door.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::get('reset-password', [UserController::class, 'resetPasswordUpdate'])->name('password.update');
});




Route::middleware('auth')->group(function () {
    Route::get('verify-email', function () {
        return view('verification.verify-email');
    })->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('main');
    })->middleware('signed')->name('verification.verify');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back();
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');









    // Route::post('register', [CardController::class, 'store'])->name('card.store');
});



// Route::get('card', [CardController::class, 'show']);
// Route::get('card/create', [CardController::class, 'create']);
// Route::get('card/update', [CardController::class, 'update']);
// Route::get('card/delete', [CardController::class, 'delete']);

Route::post('dashboard', function () {
    return redirect('/dashboard');
});