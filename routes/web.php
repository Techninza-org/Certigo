<?php



use App\Http\Controllers\UserController;

use App\Models\User;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AuditController;

use App\Http\Controllers\TrashController;

use App\Http\Controllers\ClientController;

use App\Http\Controllers\SampleController;

use App\Http\Controllers\TemplateController;

use App\Http\Controllers\TrainingController;

use App\Http\Controllers\ClientAuthController;

use App\Http\Controllers\HrController;







Route::get('/clear-cache', function () {
    // Clear application cache
    Artisan::call('cache:clear');
    // Clear route cache
    Artisan::call('route:clear');
    // Clear view cache
    Artisan::call('view:clear');
    // Clear config cache
    Artisan::call('config:clear');

    return "All caches have been cleared!";
});






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



Route::get('/audit-report-viewpdf/{id}', [AuditController::class, 'viewGeneratedReport'])->name('audit-report-viewpdf');
Route::post('/audit-report-savepdf', [AuditController::class, 'saveReportToDb'])->name('audit.report.savepdf');
Route::get('/audit-report-view', [AuditController::class, 'auditRepView'])->name('audit.report.view');
Route::get('/audit-final-score', [AuditController::class, 'auditFinalScore'])->name('audit.final.score');


Route::post('/audit-report-save', [AuditController::class, 'auditRepSave'])->name('audit.report.save');
Route::get('/view-pdf', [AuditController::class, 'viewCompletedReport'])->name('view.completed.pdf');


Route::get('/send-email', [AuditController::class, 'sendEmail'])->name('send.email');

Route::get('/consolidated/{id}', [AuditController::class, 'consolidated'])->name('consolidated');


Route::get('/send-consolidated/{id}', [AuditController::class, 'sendconsolidated'])->name('sendconsolidated');

Route::get('/quarter-consolidated/{id}/{quarter}', [AuditController::class, 'consolidated_quarter'])->name('consolidated_quarter');
Route::get('/quarter-consolidated-link/{id}/{quarter}', [AuditController::class, 'consolidated_quarter_link'])->name('send_consolidated_quarter_link');








Route::group(['middleware' => 'auth'], function () {



    Route::controller(AuditController::class)->group(function () {

        // Route::get('/', 'index')->name('audit');

        Route::post('/schedule-audit', 'schedule_audit')->name('scheduleAudit');

        Route::post('/update-audit', 'update_audit')->name('update.audit');

        Route::post('/template-options', 'template_options')->name('templateOptions');



        Route::post('/templates', 'tempsInFolder')->name('tempsInFolder');





        Route::get('/resume-audit', 'resume_audit')->name('resumeAudit');



        Route::post('/remove-audit', 'remove_audit')->name('removeAudit');



        Route::post('/remove-selected-template', 'remSelTemp')->name('remSelTemp');

        Route::post('/fetch-template-details', 'tempdetAjax')->name('tempdetAjax');

        Route::post('/fetch-responses', 'getResGrp')->name('getResGrp');



        Route::post('/fill-audit', 'fillAudit')->name('fillAudit');

        Route::post('/audit-data', 'getFormData')->name('getFormData');

        Route::get('/remove-evidence-image', 'removeEvidence')->name('removeEvidence');



        Route::post('/response-type', 'getResponseType')->name('getResponseType');





        Route::get('/audit-report', 'dloadAudRep')->name('audit.report');







        Route::post('/signature-upload', 'signaturesUpload')->name('signatures.upload');



        Route::get('/service-code', 'getServiceCode')->name('get.serviceCode');

        Route::post('/service-code', 'saveServiceCode')->name('post.serviceCode');



        Route::get('signature-pad-auditor', 'signView')->name('sign.view');

        Route::get('signature-pad-auditee', 'sign_View')->name('auditee.sign.view');





        Route::post('signaturepad', 'store')->name('signature_pad.store');

        Route::post('signature-pad', 'store_sign')->name('signature_pad.upload');



        Route::post('/doc-personal', 'store_docref_pesonal')->name('store_docref_pesonal');





    });







    Route::controller(ClientController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/ajax-clients', 'ajax')->name('dataindex');





        Route::post('/client-store', 'client_store')->name('client.store');

        Route::get('/audit-client', 'audit_client')->name('client.audit');

        Route::get('/view-client', 'view_client')->name('view.client');



        Route::get('/edit-client', 'edit_client')->name('edit.client');

        Route::post('/client-update', 'update_client')->name('client.update');

        Route::get('/delete-client', 'delete_client')->name('delete.client');

        Route::post('/inactive-client', 'inactive_client')->name('inactive.client');

        Route::get('/active-client', 'active_client')->name('active.client');



        Route::get('/client-audits', 'audit_client')->name('back.client.audit');







    });





    Route::post('/copy-folder', [TemplateController::class, 'copy_folder'])->name('copyFolder');


    Route::controller(TemplateController::class)->group(function () {



        Route::get('/all-folders', 'index')->name('get.templates');

        Route::get('/template-files', 'get_template_files')->name('get_template_files');

        Route::post('/remove-folder', 'remove_folder')->name('removeFolder');

        // Route::post('/copy-folder', 'copy_folder')->name('copyFolder');



        Route::post('/template-store', 'template_store')->name('folder.store');

        Route::post('/store-template', 'templatestore')->name('template.store');

        Route::get('/edit-template', 'get_edit_template')->name('get-edit-template');

        Route::post('/template-update', 'template_update')->name('template.update');

        Route::post('/edit-template', 'edit_temp_name')->name('edittemplatename');

        Route::get('/open-template', 'open_template')->name('open-template');

        Route::post('/remove-template', 'remove_template')->name('removeTemplate');




        Route::post('/add-objective', 'add_objective')->name('add-objective');

        Route::post('/update-objective-question', 'updt_obj_q')->name('updt-obj-q');

        Route::post('/update-objective-response', 'changeResponse')->name('change.response');



        Route::post('/remove-objective', 'removeObjective')->name('remove-objective');

        Route::post('/submit-responses', 'submitForm')->name('submitResponsesForm');

        Route::post('/get-response-id', 'fetchResponseId')->name('fetch.response.id');





        Route::post('/preview-template', 'fillViewModal')->name('fillViewModal');





        Route::get('/responses', 'getResponses')->name('getResponses');

        Route::get('/remove-response', 'removeResponse')->name('delete-response');









    });





    Route::controller(TrashController::class)->group(function () {

        Route::get('/all-trash', 'allTrash')->name('get.trash');

        Route::post('/restore-audit', 'r_audit')->name('restoreAudit');

        Route::post('/restore-client', 'r_client')->name('restoreClient');

        Route::post('/restore-training', 'r_training')->name('restoreTraining');

        Route::post('/restore-user', 'r_user')->name('restoreuser');





    });



    Route::controller(TrainingController::class)->group(function () {

        Route::get('/all-trainings', 'allTrainings')->name('get.trainings');

        Route::post('/schedule-training', 'scheduleTraining')->name('scheduleTraining');

        Route::get('/view-training', 'viewTraining')->name('view.training');
        Route::post('/add-attendee-in-training', 'addAttendeeInTraining')->name('add.attendees.training');



        // Route::get('/edit-training','geteditTraining')->name('get.edit.training');

        Route::get('/edit-training/{id}', 'geteditTraining')->name('get.edit.training');



        Route::post('/edit-training', 'editTraining')->name('edit.training');

        Route::get('/delete-training', 'deleteTraining')->name('delete.training');





        Route::post('/add-attendee', 'addAttendee')->name('attendee.store');



        Route::post('/start-training', 'startTraining')->name('startTraining');

        Route::get('/complete-training', 'getCompletePage')->name('get.complete.page');

        Route::post('/training-images', 'trainingImages')->name('training.images');



        Route::get('/complete-training/{id}', 'postCompletePage')->name('post.complete.training');

        Route::get('/download-pdf', 'downloadPdf')->name('downlaod.training.pdf');



        Route::get('/remove-point', 'remove_point')->name('remove_point');



        Route::get('/upload-signatures/{trainingId}', 'getUploadSign')->name('get.signature.training');





        Route::post('/training-signatures', 'trainingSignatures')->name('training.signatures');



        Route::get('/trainer-signature-pad/{id}', 'signView')->name('trainer.sign.view');

        Route::get('/trainee-signature-pad/{id}', 'sign_View')->name('trainee.sign.view');



        Route::post('/trainer-signature-pad', 'store')->name('trainer.signature_pad.store');

        Route::post('/trainee-signature-pad', 'store_sign')->name('trainee.signature_pad.upload');





    });



    Route::controller(SampleController::class)->group(function () {

        Route::get('/all-samples', 'allSamples')->name('get.samples');

        Route::post('/schedule-sample', 'scheduleSample')->name('store.sample');

        Route::post('/add-parameter', 'addParameter')->name('store.parameter');



        Route::get('/view-sample', 'viewSample')->name('view.sample');

        Route::post('/start-sample', 'startSample')->name('startSample');



        Route::get('/complete-sample', 'completeSample')->name('complete.sample.get');

        Route::get('/complete-sample/{id}', 'postCompleteSample')->name('post.complete.sample');

        Route::post('/sample-images', 'sampleImages')->name('sample.images');



        Route::get('/downlaod-sample-report', 'downloadPdf')->name('downlaod.sample.pdf');

        Route::get('/remove-sample-point', 'remove_sample_point')->name('remove_sample_point');



        Route::get('/delete-sample', 'deleteSample')->name('delete.sample');





        Route::get('/sample-signatures/{sampleId}', 'getUploadSign')->name('get.signature.sample');





        Route::post('/sample-signatures', 'sampleSignatures')->name('sample.signatures');



        Route::get('/sampleby-signature-pad/{id}', 'signView')->name('sampleby.sign.view');

        Route::get('/sampleto-signature-pad/{id}', 'sign_View')->name('sampleto.sign.view');



        Route::post('sampleby-signature-pad', 'store')->name('sampleby.signature_pad.store');

        Route::post('sampleto-signature-pad', 'store_sign')->name('sampleto.signature_pad.upload');



    });



    Route::controller(MailController::class)->group(function () {

        Route::get('/sendbasicemail', 'basic_email');

        Route::get('/sendhtmlemail', 'html_email');

        Route::get('/sendattachmentemail', 'attachment_email');

    });



    Route::get('/users', function () {

        $allUsers = User::all();

        return view('users.all', ['allUsers' => $allUsers]);

    })->name('get.users');



    Route::post('/add-user', [UserController::class, 'addUser'])->name('add.user');



    Route::get('/edit-user', [UserController::class, 'editUser'])->name('edit.user');

    Route::post('/edit-user', [UserController::class, 'editUserDetails'])->name('edit.user.details');

    Route::post('/update-user-password', [UserController::class, 'updateUserPass'])->name('update.user.pass');

    Route::get('/delete-user', [UserController::class, 'delete_user'])->name('delete.user');

    Route::post('/inactive-user', [UserController::class, 'inactive_user'])->name('inactive.user');

    Route::get('/active-user', [UserController::class, 'active_user'])->name('active.user');





    Route::get('/report-colour', [UserController::class, 'getColourPage'])->name('get.color.page');

    Route::post('/report-colour', [UserController::class, 'setColourPage'])->name('set.color.page');

    Route::post('/report-colour-industrial', [UserController::class, 'setColourIndPage'])->name('set.color.ind.page');





    Route::get('/graph-type', [UserController::class, 'getGraphPage'])->name('get.graph.page');

    Route::post('/graph-type', [UserController::class, 'setGraphPage'])->name('set.graph.page');






    // Hr controller 
    Route::get('/create-offer-letter', [HrController::class, 'getOfferLetter'])->name('get.offer.letter.page');
    Route::post('/create-offer-letter', [HrController::class, 'postOfferLetter'])->name('postOfferLetter');
    Route::get('/view-offer-letter', [HrController::class, 'viewOfferLetterPdf'])->name('view.pdf');
    Route::get('/edit-offer-letter', [HrController::class, 'geteditofferLetter'])->name('edit.offer.letter.page');
    Route::post('/edit-offer-letter', [HrController::class, 'posteditofferLetter'])->name('post.edit.offer.letter.page');


    Route::get('/create-pay-slip', [HrController::class, 'getPayslipPage'])->name('get.payslip.page');
    Route::post('/create-pay-slip', [HrController::class, 'postPayslipPage'])->name('post.payslip.page');
    Route::get('/view-pay-slip', [HrController::class, 'viewPaySlipPdf'])->name('view.paySlip.pdf');
    Route::get('/edit-pay-slip', [HrController::class, 'editPaySlipPdf'])->name('edit.paySlip');
    Route::post('/edit-pay-slip', [HrController::class, 'posteditPaySlipPdf'])->name('post.edit.paySlip');
    Route::post('/delete-pay-slip', [HrController::class, 'deletePaySlipPdf'])->name('delete.paySlip');



    Route::get('/pay-slip-pdf', [HrController::class, 'paySlip'])->name('paySlip');



    Route::get('/create-appointment-letter', [HrController::class, 'getappointmentLetter'])->name('get.appointment.letter.page');
    Route::post('/create-appointment-letter', [HrController::class, 'postappointmentLetter'])->name('postappointmentLetter');
    Route::get('/view-appointment-letter', [HrController::class, 'viewappointmentLetterPdf'])->name('view.appointment.pdf');
    Route::get('/edit-appointment-letter', [HrController::class, 'geteditappointmentLetter'])->name('edit.appointment.letter.page');
    Route::post('/edit-appointment-letter', [HrController::class, 'posteditappointmentLetter'])->name('post.edit.appointment.letter.page');





    Route::get('/pay-slip', [HrController::class, 'paySlip'])->name('pay.slip');

});





Route::get('/client', [ClientAuthController::class, 'index'])->name('client.home')->middleware("auth:webclient");

Route::get('/client/login', [ClientAuthController::class, 'login'])->name('client.login');

Route::get('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');

Route::post('/client/login', [ClientAuthController::class, 'handleLogin'])->name('client.handleLogin');





Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/tom', function () {

    \Artisan::call('make:model CompletedReport');

});

Route::get('/controluday', function () {

    \Artisan::call('make:controller HrController');

});



Route::get('/foo', function () {

    \Artisan::call('storage:link');



});
Route::get('/dor', function () {

    \Artisan::call('vendor:publish');



});



Route::get('/roo', function () {

    \Artisan::call('route:clear');



});



Route::get('/coo', function () {

    \Artisan::call('cache:clear');



});