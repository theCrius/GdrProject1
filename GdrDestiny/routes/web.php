<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//logo
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//home esterna
Route::get('/welcome', function () {
    return view('welcome2');
})->name('welcome2');

Auth::routes();

//logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//registrazione
Route::get('registrati/razza/{token?}','Auth\RegisterController@primoStep')->name('registrati1');
Route::get('registrati/{idRazza}/emisfero/{token?}','Auth\RegisterController@secondoStep')->name('registrati2');
Route::get('registrati/{idRazza}/{idEmisfero}/sesso/{token?}','Auth\RegisterController@terzoStep')->name('registrati3');
Route::get('registrati/{idRazza}/{idEmisfero}/{sesso}({token?}','Auth\RegisterController@quartoStep')->name('registrati4');

Route::get('ambientazione','GuidaController@indexAmbientazione')->name('ambientazione');
Route::get('regolamento','GuidaController@indexRegolamento')->name('regolamento');


//only if the user is logged
Route::middleware('auth')->group(function(){



//after logging
Route::get('/home', 'TopmapController@index')->name('home');

//show a single middle map
Route::get('/home/{idMiddlemap}','MiddlemapController@index')->name('middlemap');

//show a single bottom map
Route::get('/home/{idMiddlemap}/{idBottommap}','BottommapController@index')->name('bottommap');

//add class by user
Route::get('/user/AddClass','UserclasseController@addClass')->name('addClass');
Route::post('/user/AddClass','UserclasseController@storeClass')->name('storeClass');

//add skills
Route::post('/user/{idUser}/StoreSkills','UserskillController@storeSkills')->name('storeSkills');
Route::get('/user/{idUser}/{skillFrom}/AddSkills','UserskillController@addSkills')->name('addSkills');

//add specs
Route::post('/user/{idUser}/StoreSpecs','UserspecializationController@storeSpecs')->name('storeSpecs');
Route::get('/user/{idUser}/{specFrom}/AddSpecs','UserspecializationController@addSpecs')->name('addSpecs');

//show skill
Route::get('/user/{idUser}/Abilita','SkillController@show')->name('showSkills');


//Modify the level of skill
Route::get('/user/{idUser}/{idSkill}/UpdateSkillLevel','UserskillController@incrementLevelOfSkill')->name('updateSkillLevel');

//get background
Route::get('/user/{idUser}/background','ChiamateAjaxController@showBackground')->name('showBackground');

//modify the background
Route::put('/user/{idUser}/background/update', 'ChiamateAjaxController@updateBackground')->name('updateBackground');
Route::get('/user/{idUser}/background/modify', 'ChiamateAjaxController@editBackground')->name('modifyBackground');

//Show medical record
Route::get('/user/{idUser}/cartellaClinica','MedicalrecordController@show')->name('showMedicalRecord');

//Show objects(equipped and owned)
Route::get('/user/{idUser}/oggettiEquipaggiati','UserobjectController@showObjectEquipped')->name('objectEquipped');
Route::get('/user/{idUser}/oggettiPosseduti','UserobjectController@showObjectOwned')->name('objectOwned');

//Equips the object or remove
Route::get('/user/{idUser}/{idObject}/equipsOrUnequips','UserobjectController@equipsOrUnequips')->name('equipsOrUnequips');

//Mecha 
Route::get('/user/{idUser}/Mecha','UsermechaController@show')->name('showMecha');

//Messages
Route::post('/user/{idUser}/InviaMessaggio','MessageController@store')->name('storeMessage');


//Modify Profile
Route::get('/user/{idUser}/modifica','UserController@showOptionEditsUser')->name('showOptionEditsUser');

Route::get('/user/{idUser}/modificaGeneralità','UserController@editUser1')->name('editUser1');
Route::put('/user/{idUser}/modificaGeneralità','UserController@updateUser1')->name('updateUser1');

Route::get('/user/{idUser}/cambioPg','UserController@destroy')->name('deleteUser');


//log routes
Route::prefix('/user/{idUser}/log')->group(function () {

    Route::get('exp','ExpController@showLog')->name('expLog');
    Route::get('money','MoneyController@showLog')->name('moneyLog');
    Route::prefix('admin')->middleware('checkIfAdmin')->group(function(){

        Route::get('logged','UserloggedLogController@show')->name('userloggedLog');
        Route::get('messages','MessageController@showLog')->name('usermessagesLog');
    });
});

Route::put('/message/update/{idMessage}','MessageController@update')->name('updateMessage');

//show profile
Route::get('/user/{idUser}','UserController@show')->name('userProfile');

});