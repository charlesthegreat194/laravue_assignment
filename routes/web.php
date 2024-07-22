<?php



use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return Inertia::render('index');
});

Route::get('/contact', function(){
    return Inertia::render('contact');
});



// route, when clicked it goes to the login page
Route::get('/login', function(){
    return Inertia::render('login');
})->name('login');

// route, when clicked it goes to the signup page
Route::get('/signup', function(){
    return Inertia::render('signup');
})->name('signup');



// api for login and register from authcontroller
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// route, whenn clicked it goes to the dashboard
Route::get('/dashboard', function(){
    return Inertia::render('dashboard');
})->name('dashboard');



// shows the read the data to the dashboard
Route::middleware(['auth', 'api'])->group(function(){
    Route::get('/dashboard', function(){
        $users = User::paginate();
        return Inertia::render('dashboard', ['users' => $users]);
    })->name('dashboard');
});