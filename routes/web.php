<?php



use App\Http\Controllers\Companies\CompanyController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\Users\UserController;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Locations\LocationController;

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
    return view('login');
});

// Route::get('/', function () {
//     return view('login');
// });

Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');
Route::view('/index', "index")->name('index')->middleware('auth');

// LOGIN ROUTES
Route::post('/validate_register',[LoginController::class,'register'])->name('validate_register');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// FORGOT PASSWORD TEST
Route::view('/forgotPassword', "forgotPassword")->name('forgotPassword');
//MAIL TEST
Route::get('/email', function(){
    //return (new ResetPassword("Fio"))-> render();
    $response = Mail::to('fiocc30@gmail.com')->send(new ResetPassword("Fio"));
    
    dump($response);
});


//USERS ROUTES
Route::get('/users',[UserController::class,'index'])->name('users.index')->middleware('auth');
Route::get('/users/new',[UserController::class,'create'])->name('users.create')->middleware('auth');
Route::post('/users/create',[UserController::class,'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}/update',[UserController::class,'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}/delete',[UserController::class,'destroy'])->name('users.destroy')->middleware('auth');

//COMPANIES ROUTES
Route::get('/companies',[CompanyController::class,'index'])->name('companies.index')->middleware('auth');
Route::get('/companies/new',[CompanyController::class,'create'])->name('companies.create')->middleware('auth');
Route::post('/companies/create',[CompanyController::class,'store'])->name('companies.store')->middleware('auth');
Route::get('/companies/{company}/edit',[CompanyController::class,'edit'])->name('companies.edit')->middleware('auth');
Route::put('/companies/{company}/update',[CompanyController::class,'update'])->name('companies.update')->middleware('auth');
Route::delete('/companies/{company}/delete',[CompanyController::class,'destroy'])->name('companies.destroy')->middleware('auth');

//PDF ROUTE
Route::get('/users/PDFusers',[PdfController::class,'export_users'])->name('export_users');
Route::get('/companies/PDFcompanies',[PdfController::class,'export_companies'])->name('export_companies');

//LOCATIONS ROUTES
Route::get('/locations',[LocationController::class,'index'])->name('locations.index')->middleware('auth');
Route::get('/locations/new',[LocationController::class,'create'])->name('locations.create')->middleware('auth');
Route::post('/locations/create',[LocationController::class,'store'])->name('locations.store')->middleware('auth');

//Route::get('users', UserController::class)->names('users.user');


