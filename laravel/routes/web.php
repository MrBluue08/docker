<?php

use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\InsuranceCompanieController;
use App\Http\Controllers\InsuredRoomController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SponsorCompanieController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamInvitationController;
use App\Http\Controllers\TeamSignupCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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

Route::prefix('/admin')->group(function() {
    Route::get('/login/{error?}',[AdminController::class,'login'])->name('admin.login');
    Route::post('/auth',[AdminController::class,'auth'])->name('admin.login.auth');
    
    //Route::middleware(['admin'])->group(function(){})
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/logout', [AdminController::class,'logout'])->name('admin.logout');
        Route::get('/index',[AdminController::class,'index'])->name('admin.index');
        
        Route::get('/listarRoom', [RoomController::class, 'index'])->name('listRoom');
        Route::get('/createRoom', [RoomController::class, 'create'])->name('createRoomForm');
        Route::get('/roomInfo/{roomId}', [RoomController::class, 'infoRoom'])->name('admin.editRoomForm');
        Route::post('/updateRoom', [RoomController::class, 'update'])->name('admin.editRoom');
        Route::post('/createRoom',[RoomController::class, 'store'])->name('storeRoom');
        Route::get('/searchRoom', [RoomController::class, 'search'])->name('searchRoom');
        Route::get('/listParties/{roomId}', [RoomController::class, 'listParties'])->name('listParties');
        Route::get('/massImageUpload/{roomId}', [RoomController::class, 'massImageUpload'])->name('massImageUpload');
        Route::post('/massImageUpload/{roomId}', [RoomController::class, 'massImageUpload'])->name('massImageUpload');
        Route::post('/uploadRoomImages', [PhotoController::class, 'store'])->name('uploadRoomImages');

        
        Route::get('/listarSponsor', [SponsorCompanieController::class, 'index'])->name('listSponsor');
        Route::get('/createSponsor', [SponsorCompanieController::class, 'create'])->name('createSponsorForm');
        Route::post('/createSponsor',[SponsorCompanieController::class, 'store'])->name('storeSponsor');
        Route::get('/editSponsor/{sponsorCompanie}', [SponsorCompanieController::class, 'editForm'])->name('editSponsorForm');
        Route::post('/editSponsor', [SponsorCompanieController::class, 'edit'])->name('editSponsor');
        Route::get('/searchSponsor', [SponsorCompanieController::class, 'search'])->name('searchSponsor');
        Route::get('/sponsorRooms/{sponsorCompanie}', [RoomController::class, 'index']);
        Route::get('/sponsorRoom', [SponsorController::class, 'create']);
        
        Route::get('/listarInsurance', [InsuranceCompanieController::class, 'index'])->name('listInsurance');
        Route::get('/createInsurance', [InsuranceCompanieController::class, 'create'])->name('admin.createInsuranceForm');
        Route::get('/insurnaceInfo/{CIF}', [InsuranceCompanieController::class, 'infoCompanie'])->name('admin.editInsuranceForm');
        Route::post('/createInsurance', [InsuranceCompanieController::class, 'store'])->name('admin.storeInsurance');
        Route::post('/updateInsurance', [InsuranceCompanieController::class, 'update'])->name('admin.editInsurance');
        Route::get('/searchInsurance', [InsuranceCompanieController::class, 'search'])->name('searchInsurance');
        Route::get('/roomsInsureList/{CIF}',[InsuranceCompanieController::class, 'roomNewInsureList'])->name('admin.roomInsureList');
        Route::get('/roomsInsuredList/{CIF}',[InsuranceCompanieController::class, 'roomInsuredList'])->name('admin.roomInsuredList');
        Route::post('/insureRoom',[InsuredRoomController::class, 'store'])->name('admin.insureRoom');
        Route::post('/desInsureRoom',[InsuredRoomController::class, 'delete'])->name('admin.desInsureRoom');
        
        Route::get('/listarEquipos', [TeamController::class, 'index'])->name('listTeam');
        Route::get('/teamInfo', [TeamController::class, 'info'])->name('admin.teamInfo');
        Route::get('/searchTeam', [TeamController::class, 'search'])->name('searchTeam');

        Route::get('/generatePDF/{roomID}', [PDFcontroller::class, 'generatePDF'])->name('admin.generatePDF');
        Route::get('/generateSponsorBill/{sponsor}', [PDFcontroller::class, 'generateSponsorBill'])->name('admin.generateBillSponsor');
        Route::get('/generateInsuranceBill/{insurance}', [PDFcontroller::class, 'generateInsuranceBill'])->name('admin.generateBillInsurance');


    });
});

Route::prefix('/main')->group(function() {
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/auth', [UserController::class, 'auth'])->name('user.login.auth');
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::get('/index', [UserController::class, 'main'])->name('user.main');
    Route::get('/info', [UserController::class, 'showInfo'])->name('user.info');
    Route::get('/riddles',[UserController::class, 'openRiddles'])->name('user.openRiddles');
    Route::get('/incomingRooms', [RoomController::class, 'incomingRooms'])->name('user.incomingRooms');
    Route::get('/searchRoom', [RoomController::class, 'search'])->name('user.searchRoom');
    Route::get('/roomDetailsUser/{roomId}', [RoomController::class, 'roomDetailsUser'])->name('user.roomDetailsUser');
    Route::get('/roomResults/{roomId}', [RoomController::class, 'roomResults'])->name('user.roomResults');
    Route::get('/openGlobalRanking', [TeamController::class, 'openGlobalRanking'])->name('user.openGlobalRanking');
    Route::get('/saveTime/{teamId}/{roomId}', [TeamController::class, 'saveTime'])->name('qr.savetime');
    Route::get('/imageCarousel/{roomId}', [PhotoController::class, 'carousel'])->name('user.imageCarousel');



    Route::group(['middleware' => 'user'], function(){
        Route::get('/userProfile/{mail}', [UserController::class, 'userProfile'])->name('userProfile');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::post('/leaveTeam', [UserController::class, 'leaveTeam'])->name('user.leaveTeam');
        Route::post('/joinTeam', [UserController::class,'joinTeam'])->name('user.joinTeam');
        Route::get('/pendingInvites/{mail}', [UserController::class, 'pendingInvitesList'])->name('user.pendingInvites');
        Route::get('/editTeam', [UserController::class, 'editTeam'])->name('user.editTeam');
        Route::get('/searchUsers', [UserController::class, 'search'])->name('searchTeam');

        Route::get('/openLeagueRanking', [TeamController::class, 'openLeagueRanking'])->name('user.openLeagueRanking');        
        Route::post('/createTeam', [TeamController::class, 'store'])->name('user.createTeam');
        Route::get('/destroyTeam', [TeamController::class, 'destroy'])->name('user.destroyTeam');

        Route::post('/inviteUsers', [TeamInvitationController::class, 'store'])->name('user.inviteUsers');
        
        Route::get('/payment/{roomId}',  [PaymentController::class, 'loadPayment'])->name('loadPayment');



    });
});