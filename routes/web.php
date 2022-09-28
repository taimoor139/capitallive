<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefferalController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TradeactivationController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\Auth\VerificationController;
use App\Models\DepositLimit;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


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

Auth::routes(['verify' => true]);


Route::get('/complete/profile', function (){
    if(Auth::user()->role_id == 1){
        return view('admin.profile.completeProfile');
    }else{
        return view('user.profile.completeProfile');
    }

})->name('completeProfile');

//Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin-login');
//Route::get('/admin/register', [LoginController::class, 'adminRegister'])->name('admin-register');
Route::get('/admin/password/reset', [LoginController::class, 'adminResetPassword'])->name('admin-reset-password');

Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('updatePassword');

Route::get('/register/{referrer_id}', [RefferalController::class, 'registerReferred']);
Route::post('/referrer/validation', [RefferalController::class, 'referrerValidation'])->name('referrerValidation');
Route::post('/username/validation', [RefferalController::class, 'usernameValidation'])->name('usernameValidation');
Route::post('/save_user_data', [ProfileController::class, 'completeProfile'])->name('saveUserData');

Route::group(['prefix'=>'2fa'], function(){
    Route::post('/generateSecret',[ProfileController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/enable2fa',[ProfileController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa',[ProfileController::class, 'disable2fa'])->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth', 'verified', 'profile', '2fa', 'system_access'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

    //deposit
    Route::get('deposit', [DepositController::class, 'index'])->name('deposit-dashboard')->withoutMiddleware('system_access');
    Route::post('deposit/store', [DepositController::class, 'depositStore'])->name('deposit-store')->withoutMiddleware('system_access');
    Route::post('deposit/types', [DepositController::class, 'accountType'])->name('account-type')->withoutMiddleware('system_access');

    //withdrawals
    Route::get('withdrawals', [WithdrawalController::class, 'index'])->name('withdrawal-dashboard');
    Route::post('withdrawals/store', [WithdrawalController::class, 'withdrawalStore'])->name('withdrawal-store');

    //accounts
    Route::get('accounts', [AccountsController::class, 'index'])->name('account-dashboard');
    Route::get('earning/accounts', [AccountsController::class, 'earningAccounts'])->name('earning-accounts');
    Route::get('earning/move', [AccountsController::class, 'move'])->name('move-earning');
    Route::get('earning/charts', [AccountsController::class, 'earningChart'])->name('user-earning-chart');

    //network
    Route::get('network', [NetworkController::class, 'index'])->name('network-dashboard');
    Route::post('network/members', [NetworkController::class, 'members'])->name('user-members');

    //awards
    Route::get('rank/awards', [AwardController ::class, 'index'])->name('award-dashboard');
    Route::get('executive/awards', [AwardController ::class, 'executiveAwards'])->name('executive-dashboard');

    //documents
    Route::get('kyc/documents', [DocumentController::class, 'index'])->name('document-dashboard');
    Route::post('kyc/documents/verify', [DocumentController::class, 'verify'])->name('document-verify');

    //profle
    Route::get('my/profile', [ProfileController::class, 'index'])->name('profile-dashboard');
    Route::get('my-profile/change-password', [ProfileController::class, 'security'])->name('security');
    Route::get('my-profile/nok', [ProfileController::class, 'nextOfKin'])->name('nextOfKin');
    Route::post('nok/add', [ProfileController::class, 'addNextOfKin'])->name('addNok');
    Route::post('profile/change-picture', [ProfileController::class, 'uploadDp'])->name('change-dp');

    //refferals
    Route::get('refferal', [RefferalController::class, 'index'])->name('refferals');
    Route::post('/refferal/set-position', [RefferalController::class, 'referralPosition'])->name("set-position");

    //trade activation
    Route::get('trade/activation', [TradeactivationController::class, 'index'])->name('trade-activation');
    Route::post('trade/activation/status', [TradeactivationController::class, 'status'])->name('trade-status');

    //support
    Route::get('support/new-ticket',[SupportController::class,'index'])->name('new-ticket');
    Route::post('support/new-ticket/create',[SupportController::class,'create'])->name('create-ticket');
    Route::get('support/tickets',[SupportController::class,'myTickets'])->name('tickets');
    Route::get('support/ticket/{id}',[SupportController::class,'show'])->name('view-ticket');
    Route::get('support/ticket/download/{Attachment}', function($Attachment){
        $file = public_path()."/uploads/".$Attachment;
        return response()->download($file);
    })->name('download-ticket');
    Route::post('support/ticket/{id}/close/',[SupportController::class,'closeTicket'])->name('close-ticket');
    Route::post('support/ticket/{id}/reply',[SupportController::class,'message'])->name('reply-ticket');
    Route::get('support/ticket/message/{Attachment}', function($Attachment){
        $file = public_path()."/uploads/tickets_attachments/".$Attachment;
        return response()->download($file);
    })->name('download-message');

    //download
    Route::get('downloads',[DownloadController::class,'index'])->name('download');
    Route::get('/download/{Attachment}', function($Attachment){
        return Storage::download("public/forms/".$Attachment.".pdf");
    })->name('download-form');

    //education
    Route::get('education',[EducationController::class,'index'])->name('education');

    //suggestions
    Route::get('suggestion',[SuggestionController::class,'index'])->name('suggestions');
    Route::post('suggestion/store', [SuggestionController::class, 'create'])->name('suggestion-store');

});

//=======================Frontend=======================
Route::get('about-us', [FrontendController::class, 'about']);
Route::get('legal-docs', [FrontendController::class, 'docs']);
Route::post('/contact/store', [ContactUsController::class, 'storeContact'])->name('contact-store');


//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth', 'verified', 'profile', '2fa'], 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Users
    Route::get('users', [AdminController::class, 'users'])->name('all-users');
    Route::get('users/banned', [AdminController::class, 'bannedUsers'])->name('banned-users');
    Route::get('users/active', [AdminController::class, 'activeUsers'])->name('active-users');
    Route::get('users/unverified', [AdminController::class, 'emailUnverified'])->name('unverified-users');
    Route::get('users/send_email', [AdminController::class, 'sendEmail'])->name('send-email-view');
    Route::get('users/{id}', [AdminController::class, 'viewUser'])->name('view-user');
    Route::post('users/{id}', [AdminController::class, 'updateUser'])->name('update-user');
    Route::post('send_emails', [AdminController::class, 'sendEmails'])->name('send-email');
    Route::post('send_single_email', [AdminController::class, 'sendSingleEmail'])->name('send-single-email');
    Route::get('view_profile', [AdminController::class, 'profile'])->name('view-profile');
    Route::post('profile/update', [AdminController::class, 'uploadProfile'])->name('profile-update');
    Route::get('/password', [AdminController::class, 'updateAdminPassword'])->name('updateAdminPassword');
    Route::post('/password/update', [AdminController::class, 'updatePassword'])->name('update-admin-password');

    //Subadmin
    Route::get('subadmins', [SubadminController::class, 'index'])->name('subadmins');
    Route::get('subadmins/create', [SubadminController::class, 'create'])->name('create-subadmin');
    Route::get('subadmins/store', [SubadminController::class, 'store'])->name('store-subadmin');

    //Deposits
    Route::get('deposits', [DepositController::class, 'deposits'])->name('deposits');
    Route::get('pending_deposits', [DepositController::class, 'pendingDeposits'])->name('pending-deposits');
    Route::get('approved_deposits', [DepositController::class, 'approvedDeposits'])->name('approved-deposits');
    Route::get('successful_deposits', [DepositController::class, 'successfulDeposits'])->name('successful-deposits');
    Route::get('rejected_deposits', [DepositController::class, 'rejectedDeposits'])->name('rejected-deposits');
    Route::get('deposit/limit', [DepositController::class, 'depositLimit'])->name('deposit-limit');
    Route::post('deposit/limit/add', [DepositController::class, 'addLimit'])->name('add-deposit-limit');
    Route::post('deposit/limit/update', [DepositController::class, 'updateLimit'])->name('update-deposit-limit');
    Route::post('deposit/limit/delete/{id}', [DepositController::class, 'deleteLimit'])->name('delete-deposit-limit');
    Route::get('deposit/manual', [DepositController::class, 'manualDeposit'])->name('manual-deposit');
    Route::get('deposit/manual/create', function (){
        $users = User::query()->where('role_id', 2)->get();
        $depositTypes = DepositLimit::query()->orderBy('limit', 'ASC')->get();
        return view('admin.deposits.addManual', compact('users', 'depositTypes'));
    })->name('create-manual-deposit');
    Route::post('deposit/manual/add', [DepositController::class, 'addManualDeposit'])->name('add-manual-deposit');
    Route::post('deposit/types', [DepositController::class, 'accountType'])->name('admin-account-type');


    //Support
    Route::get('all_tickets', [SupportController::class, 'allTickets'])->name('all-tickets');
    Route::get('pending_tickets', [SupportController::class, 'pendingTickets'])->name('pending-tickets');
    Route::get('closed_tickets', [SupportController::class, 'closedTickets'])->name('closed-tickets');
    Route::get('ticket/view/{id}', [SupportController::class, 'view'])->name('views-ticket');
    Route::post('ticket/{id}/close/',[SupportController::class,'closeTicket'])->name('closed-ticket');
    Route::post('ticket/message/delete',[SupportController::class,'deleteMessage'])->name('delete-message');
    Route::post('ticket/{id}/reply',[SupportController::class,'message'])->name('reply-message');
    Route::post('ticket/delete', [SupportController::class, 'destroy'])->name('delete-ticket');
    Route::get('support/ticket/message/{Attachment}', function($Attachment){
        $file = public_path()."/uploads/tickets_attachments/".$Attachment;
        return response()->download($file);
    })->name('admin-download-message');

    //Earning Charts
    Route::get('earning_charts',[AdminController::class, 'earningCharts'])->name('earning-charts');
    Route::post('earning_charts/update',[AdminController::class, 'updateRoi'])->name('update-roi');

    //Notification
    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('create_notification', [NotificationController::class, 'create'])->name('create-notification');
    Route::post('update_notification', [NotificationController::class, 'update'])->name('update-notification');
    Route::post('delete_notification/{id}', [NotificationController::class, 'destroy'])->name('delete-notification');
    Route::get('admin_notifications', [NotificationController::class, 'adminNotifications'])->name('admin-notifications');

    //Education
    Route::get('education', [EducationController::class, 'articles'])->name('articles');
    Route::get('education/create', [EducationController::class, 'create'])->name('create-education');
    Route::post('education/store', [EducationController::class, 'store'])->name('store-education');
    Route::get('education/view/{id}', [EducationController::class, 'view'])->name('view-education');
    Route::post('education/update/{id}', [EducationController::class, 'update'])->name('update-education');
    Route::post('education/delete/{id}', [EducationController::class, 'destroy'])->name('delete-education');

    //Documents
    Route::get('documents', [DocumentController::class, 'documents'])->name('documents');
    Route::post('documents/update', [DocumentController::class, 'update'])->name('update-document-status');
    Route::post('documents/{id}', [DocumentController::class, 'destroy'])->name('delete-document');

    //withdrawals
    Route::get('withdrawals', [WithdrawalController::class, 'allWithdrawal'])->name('all-withdrawals');
    Route::get('withdrawals/pending', [WithdrawalController::class, 'pendingWithdrawal'])->name('pending-withdrawals');
    Route::get('withdrawals/approved', [WithdrawalController::class, 'approvedWithdrawal'])->name('approved-withdrawals');
    Route::get('withdrawals/rejected', [WithdrawalController::class, 'rejectedWithdrawal'])->name('rejected-withdrawals');
    Route::post('withdrawals/update', [WithdrawalController::class, 'update'])->name('update-withdrawal');
    Route::post('withdrawals/mass/update', [WithdrawalController::class, 'massUpdate'])->name('update-mass-withdrawal');
    Route::post('withdrawals/delete/{id}', [WithdrawalController::class, 'destroy'])->name('delete-withdrawal');
    Route::get('withdrawal/limit', [WithdrawalController::class, 'withdrawalLimit'])->name('withdrawal-limit');
    Route::post('withdrawal/limit/add', [WithdrawalController::class, 'addLimit'])->name('add-withdrawal-limit');
    Route::post('withdrawals/limit/update', [WithdrawalController::class, 'updateLimit'])->name('update-withdrawal-limit');
    Route::post('withdrawals/limit/delete/{id}', [WithdrawalController::class, 'deleteLimit'])->name('delete-withdrawal-limit');

});

//Subadmin
