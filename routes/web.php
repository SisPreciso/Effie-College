<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;
use App\Mail\TestEmailResend;
use App\Mail\TestEmailChangeBrand;
use App\Mail\TestEmailResendTeacher;
use App\Mail\TestMailingBriefing;
use App\Mail\TestEmailResend01;
use App\Mail\TestMailingBriefBrand;
use App\Mail\TestMailingBriefChangeProduct;
use App\Mail\TestMailingBriefForm;
use App\Mail\MailingFinalistEffie;
use App\User;
use App\Teacher;  
use App\Caso;  
use App\Brand; 
use Illuminate\Support\Facades\Artisan;

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

Route::get('downloadAuthorization', 'CasoController@downloadAuthorization')->name('downloadAuthorization');

Auth::routes(['verify' => true]);


Route::get('/config-clear', function () {

    $exitCode = Artisan::call('config:clear');

    return 'Application cache cleared';

});


Route::get('casos.getBrand/{id}', 'CasoController@getBrand');

Route::get('users.getDocumentType/{id}', 'UserController@getDocumentType');

Route::get('downloadBrief/{edition}/{brand}', 'CasoController@downloadBrief')->name('downloadBrief');

Route::get('downloadAudio/{edition}/{brand}', 'CasoController@downloadAudio')->name('downloadAudio');

Route::get('downloadVisual/{edition}/{brand}', 'CasoController@downloadVisual')->name('downloadVisual');

Route::get('downloadWhole/{edition}/{brand}', 'CasoController@downloadWhole')->name('downloadWhole');

Route::get('downloadForm/{edition}', 'CasoController@downloadForm')->name('downloadForm');

Route::post('students.store', 'StudentController@store');

Route::post('students.update/{id}', 'StudentController@update');

Route::get('students.destroy/{id}', 'StudentController@destroy');

Route::get('students.edit/{id}', 'StudentController@edit');

// Vista de gracias (Todos menos Eureka)

//Route::view('thanks', 'thanks')->name('thanks');


Route::group([

    'middleware' => 'guest',

], function () {

    //Para activar el mensaje antes de las inscripciones 
    /*Route::get('/inscripciones', function () {
        return view('homeView');
    })->name('inscripciones');*/
    
    //Para el cierre de inscripciones
    Route::get('/inscripciones', function () {
        return view('registrationsClosed');
    })->name('inscripciones');

    Route::get('/', function () {
        return view('auth.login');
    }); 

    Route::get('confirm', function () {
        return view('confirm');
    });

    Route::get('verify', function () {
        return view('auth.verify');
    });
    
    /*Para activar las inscripciones */
    Route::get('inscripciones', 'UserController@create')->name('inscripciones');

    Route::get('activate/{code}', 'UserController@activate');

    Route::post('complete/{id}', 'UserController@complete');

});


Route::group([

    'middleware' => 'isnt_admin',

], function () {

    Route::post('files.store', 'FileController@store')->name('files.store');

    Route::get('files.destroy/{id}', 'FileController@destroy')->name('files.destroy');

    Route::post('answers.store', 'AnswerController@store')->name('answers.store');

    Route::patch('answers.update/{id}', 'AnswerController@update')->name('answers.update');

    Route::get('answers.history/{id}', 'AnswerController@history')->name('answers.history');

    Route::patch('updateTitle/{id}', 'AnswerController@updateTitle')->name('updateTitle');

    Route::post('storeTitle', 'AnswerController@storeTitle')->name('storeTitle');

    Route::post('sendProposal', 'UserController@sendProposal')->name('sendProposal');

    Route::get('propuesta', 'UserController@proposal')->name('proposal'); //

    Route::get('home', 'UserController@proposal')->name('home');

    Route::get('myAdvance', 'UserController@myAdvance')->name('myAdvance');

    /* Comentar está línea para que aparezca el formulario, no olvidar primero llenar el contenido en la tabla section para que se muestre, sino traerá error. */
    // Route::get('home', 'HomeController@home')->name('home'); 
    
    //Para el cierre de propuesta
    /*Route::get('/home', function () {
        return view('thanks');
    })->name('propuesta');*/

});


Route::group([

    'middleware' => 'is_admin',

    'prefix' => 'admin'

], function () {

    Route::resource('users', 'UserController', ['only' => ['show', 'edit', 'update']]);

    Route::get('users.downloadFull', 'UserController@downloadFull')->name('users.downloadFull');

    Route::get('users.download', 'UserController@download')->name('users.download');

    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');

    Route::get('users.getByEdition/{id}', 'UserController@getByEdition');

    Route::get('casos.getByEdition/{id}', 'CasoController@getByEdition');

    Route::get('answers.history/{id}', 'AnswerController@history');

    Route::get('avance/{id}', 'UserController@advance')->name('advance');

    Route::get('reviews/{id}', 'UserController@reviews')->name('reviews');

    Route::get('viewScore/{user_id}/{jury_id}', 'UserController@viewScoreAdmin')->name('viewScore');

    Route::get('home', 'HomeController@adminHome')->name('home');

    Route::get('cases-pdf/{user}', 'PDFCasesController@index')->name('cases.pdf');

    Route::get('show/cases-pdf/{user}', 'PDFCasesController@show')->name('showcases.pdf');

});


Route::group([

    'middleware' => 'is_tutor',

    'prefix' => 'tutor'

], function () {

    Route::get('profile', function () {
        return view('auth.profile');
    })->name('profile');

    Route::post('updateAccount', 'UserController@updateAccount')->name('updateAccount');

    Route::post('changePassword', 'Auth\ChangePasswordController@store')->name('changePassword');

    Route::resource('users', 'UserController', ['only' => ['show', 'edit', 'update']]);

    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');

    Route::get('avance/{id}', 'UserController@advance')->name('advance');

    Route::get('home', 'HomeController@tutorHome')->name('home');

});


Route::group([

    'middleware' => 'is_jury',

    'prefix' => 'jurado'

], function () {

    Route::get('password', function () {
        return view('auth.passwords.update');
    })->name('password');

    Route::post('updatePassword', 'Auth\ChangePasswordController@store')->name('updatePassword');

    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');

    Route::post('sendScore/{id}', 'UserController@sendScore')->name('sendScore');

    Route::post('sendFeedback/{id}', 'UserController@sendFeedback')->name('sendFeedback');

    Route::post('blockScore', 'UserController@blockScore')->name('blockScore');

    Route::get('viewScore/{id}', 'UserController@viewScore')->name('viewScore');

    Route::get('home', 'HomeController@juryHome')->name('home');

});

//Route::get('test', 'TestController');
Route::get('testmail', function () {

    $teams = User::whereNull('password')->where('situation','PARTICIPANTE')->where('username','like','%2024%')->get();
    //dd($teams);
    
    foreach ($teams as $team) {
        //obtengo el codigo
        $code = $team['confirmation_code'];
        //obtengo el team
        $username = $team['username'];
        //dd($team);
        foreach($team->students as $student){
            
            try{
                $emailAddress = $student['student_email'];
                //dd($emailAddress);
                Mail::to($emailAddress)->send(new TestEmailResend([
                    /* 'username' => 'username',
                    'code' => 'code', */
                    'username' => $username,
                    'code'=> $code,
                ]));

            }catch (Exception $exception) {                                                                                                           
                        Log::error('error-student:' . $exception->getMessage());
            }

        }

    }

})->name('testmail');


//REENVIO DE CORREO CAMBIO DE MARCA

Route::get('testmailbrand', function () {

    $teams = User::where('username','E2020019')
                    ->orWhere('username', 'E2020018')
                    ->get();
    //dd($teams);
    
    foreach ($teams as $team) {
        //obtengo el team
        $username = $team['username'];
        
        foreach($team->students as $student){
            
            try{
                $emailAddress = $student['student_email'];
                //dd($emailAddress);
                Mail::to($emailAddress)->send(new TestEmailChangeBrand([
                    'username' => $username,
                ]));

            }catch (Exception $exception) {                                                                                                           
                        Log::error('error-student:' . $exception->getMessage());
            }

        }

    }

})->name('testmailbrand');


//REENVIO DE CORREO DESPUES DE LA INSCRIPCION TUTOR
Route::get('testmailteacher', function () {

    //$teams = User::whereNull('password')->where('situation','PARTICIPANTE')->where('username', 'E2024001')->get();
    $users = User::whereNull('password')->where('situation','TUTOR')->where('username', 'dniqueng@usmp.pe')->get();
    
    foreach ($users as $user) {
        //obtengo el codigo
        $code = $user['confirmation_code'];
        
        //obtengo el team
        $username = $user['username'];
        
        
        $teacher_id = $user['teacher_id'];

        $team = User::where('situation','PARTICIPANTE')->where('teacher_id', $teacher_id)->first();

       $team_teacher = $team->username;
        
        $teacher = $user->teacher;
        //dd($teacher);
        
        //foreach($team->students as $student){
            
            try{
                $nameTeacher = $teacher['teacher_name'];
                //dd($emailAddress);
                Mail::to($username)->send(new TestEmailResendTeacher([
                    'name' => $nameTeacher,
                    'email' => $username,
                    'code'=> $code,
                    'team'=> $team_teacher,
                ]));

            }catch (Exception $exception) {                                                                                                           
                        Log::error('error-student:' . $exception->getMessage());
            }

        //}

    }

})->name('testmailteacher');


Route::get('testmailResendEffie', function () {
   
    $teams = User::where('situation','PARTICIPANTE')->where('username','like','%E2024%')->get();
    //print (count($teams));
    foreach ($teams as $team) {
        //obtengo el team
        $username = $team['username'];
        // echo $username."</br>";
        foreach($team->students as $student){
            try{
                $emailAddress = $student['student_email'];
                //echo $emailAddress."</br>";
                Mail::to($emailAddress)->send(new TestEmailResend01([
                    'username' => $username,
                ]));
            }catch (Exception $exception) {                                                                                                    
                        Log::error('error-student:' . $exception->getMessage());
            }
        }
    }
})->name('testmailResendEffie');




Route::get('testmailResendEffieUrgente', function () {
    
try {Mail::to('n00207717@upn.pe')->send(new TestEmailResend01(['username' => 'E2024152']));} catch (Exception $exception) {Log::error('error-student:' . $exception->getMessage());}
    
});


//Mailing reunión de briefing alumno
Route::get('mailing/brands', [MailController::class, 'mailingBrands']);

//Mailing reunión de briefing cambio producto
Route::get('TestMailingBriefChangeProduct', function () {
    
try {Mail::to('20203561@aloe.ulima.edu.pe')->send(new TestMailingBriefChangeProduct(['username' => 'E2024109']));} catch (Exception $exception) {Log::error('error-student:' . $exception->getMessage());}

});

//////////
Route::get('TestMailingBriefForm', function () {
    
//try {Mail::to('2021161534@talento.tls.edu.pe')->send(new TestMailingBriefForm(['username' => 'E2024095']));} catch (Exception $exception) {Log::error('error-student:' . $exception->getMessage());}

});

Route::get('storage-link',function(){
	$targetFolder = storage_path('app/public');
	echo $targetFolder.'</br>';
	$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
	echo $linkFolder;
	symlink($targetFolder,$linkFolder);
});


Route::get('storage-link2',function(){
	//Artisan::call('storage:link');
	return asset('storage');
	
});


Route::get('TestEmailFinalistEffie', function () {
    
    try {Mail::to('rescate@preciso.pe')->send(new MailingFinalistEffie(['username' => 'E2024005','brand' => 'Bolivar']));} catch (Exception $exception) {Log::error('error-student:' . $exception->getMessage());}
    //try {Mail::to('rescate@preciso.pe')->send(new TestEmailActiveAccount(['username' => 'E2024110']));} catch (Exception $exception) {Log::error('error-student:' . $exception->getMessage());}
});









