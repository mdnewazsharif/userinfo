<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RobotController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\RechargeController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\WithdrawController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



// user client app auth route

Route::prefix('v1')->group(function(){
  
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/checkResetPass', [AuthController::class, 'checkResetPass']);
    Route::post('/updatePass', [AuthController::class, 'updatePass']);//->middleware('auth:api');
    Route::post('/checkIfAccountExists', [AuthController::class, 'checkIfAccountExists']);
    Route::post('/send-otp', [AuthController::class, 'sendOTP']);
    Route::post('/check-refer-id', [AuthController::class, 'checkRefererID']);
    Route::post('/check-user', [AuthController::class, 'checkUser']);
    Route::post('/create-kyc-request', [AuthController::class, 'createKycRequest'])->middleware('auth:api');
    Route::get('/kyc-requests', [AuthController::class, 'kycRequests'])->middleware('auth:api');
    Route::get('/pending-kyc-requests-count', [AuthController::class, 'pendingKycRequest'])->middleware('auth:api');

    // private routes
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/updateLoggedinUserPass', [AuthController::class, 'updateLoggedinUserPass'])->middleware('auth:api');
    Route::post('/change-pin', [AuthController::class, 'changePin'])->middleware('auth:api');
    Route::post('/reset-loggedin-user-pin', [AuthController::class, 'resetLoggedInUserPIN'])->middleware('auth:api');
    Route::get('/user', [AuthController::class, 'user'])->middleware('auth:api');
    Route::get('/user-wallet', [AuthController::class, 'userWallet'])->middleware('auth:api');

    Route::post('/updateUserProfile', [AuthController::class, 'updateUserProfile'])->middleware('auth:api');
    Route::post('/updateUserProfilePhoto', [AuthController::class, 'updateUserProfilePhoto'])->middleware('auth:api');
    Route::post('/updateDeviceToken', [AuthController::class, 'updateDeviceToken'])->middleware('auth:api');
    Route::get('/check-if-user-blocked', [AuthController::class, 'checkIfUserBlocked'])->middleware('auth:api');

    // Others
    Route::get('/categories', [AppController::class, 'allCategories']);
    Route::get('/app-info', [AppController::class, 'appInfo']);
    Route::get('/check-maintenance-mode', [AppController::class, 'checkMaintenanceMode']);
    Route::post('/delete-account', [SupportController::class, 'deleteAccount']);


    Route::get('/adjust-own-robot-count', [AppController::class, 'adjustOwnRobotCount']);
    Route::get('/adjust-team-robot-count', [AppController::class, 'adjustTeamRobotCount']);
    Route::get('/adjust-referrals', [AppController::class, 'adjustReferrals']);
    Route::get('/get-users-with-referrals', [AppController::class, 'getUserWithReferrals']);



    Route::get('/notifications', [AppController::class, 'allNotifications']);
    Route::get('/unread-notifications-count', [AppController::class, 'unreadNotificationCount']);
    Route::get('/update-notification-read-status', [AppController::class, 'updateNotificationReadStatus']);
    Route::get('/notices', [AppController::class, 'allNotice']);
    Route::get('/sliders', [AppController::class, 'allSliders']);
    Route::post('/device-token/update', [AppController::class, 'updateUsersDeviceToken']);
    Route::post('/user-log/update', [AppController::class, 'updateUsersDeviceLoginID']);
    Route::get('/user-log', [AppController::class, 'getDeviceLoginID']);
    Route::get('/user-deleted', [AppController::class, 'isUserDeleted']);


    Route::post('/get-referrals', [AppController::class, 'getReferrals']);
    Route::get('/get-top-coach', [AppController::class, 'getTopCoach']);
    Route::get('/get-top-coach-2', [AppController::class, 'getTopCoach2']);
    Route::get('/off-user-transfer', [AppController::class, 'offUserTransfer']);
    

    // recharge request
    Route::get('/all-recharge-requests', [RechargeController::class, 'rechargeRequests']);
    Route::post('/create-recharge-request', [RechargeController::class, 'createRechargeRequest']);
    Route::get('/all-recharge-requests-for-agent', [RechargeController::class, 'rechargeRequestsForAgent']);
    Route::get('/all-approved-recharge-requests-for-agent', [RechargeController::class, 'approvedRechargeRequestsForAgent']);
    Route::post('/create-recharge-request-by-agent', [RechargeController::class, 'createRechargeRequestByAgent']);
    Route::post('/agent-approve-recharge-request', [RechargeController::class, 'agentApproveRechargeRequest']);
    Route::post('/agent-reject-recharge-request', [RechargeController::class, 'rejectRechargeRequestAgent']);

    // transfer balance
    Route::post('/transfer-balance-by-agent', [TransferController::class, 'transferBalanceByAgent']);
    Route::post('/transfer-balance-by-user', [TransferController::class, 'transferBalanceByUser']);
    Route::post('/convert-user-balance', [TransferController::class, 'convertUserBalance']);
    Route::post('/check-user-id', [TransferController::class, 'checkUserID']);

    // withdraw request
    Route::get('/all-withdraw-requests', [WithdrawController::class, 'withdrawRequests']);
    Route::post('/create-withdraw-request', [WithdrawController::class, 'createWithdrawRequest']);
    Route::post('/create-withdraw-request-by-agent', [WithdrawController::class, 'createWithdrawRequestByAgent']);
    Route::get('/all-withdraw-requests-for-agent', [WithdrawController::class, 'withdrawRequestForAgent']);
    Route::post('/reject-withdraw-request-by-agent', [WithdrawController::class, 'rejectWithdrawRequestByAgent']);
    Route::post('/agent-approve-withdraw-request', [WithdrawController::class, 'agentApproveWithdrawRequest']);
    Route::get('/all-agents', [WithdrawController::class, 'allAgents']);
    Route::post('/get-agent', [WithdrawController::class, 'getAgent']);
    Route::get('/get-commission-rate', [WithdrawController::class, 'getCommissionRate']);

    // robots
    Route::get('/all-purchase-codes', [RobotController::class, 'allPurchaseCodes']);
    Route::get('/all-unsed-purchase-codes', [RobotController::class, 'unusedPurchaseCodes']);
    Route::post('/buy-purchase-code', [RobotController::class, 'buyPurchaseCode']);
    Route::post('/buy-purchase-code-updated', [RobotController::class, 'buyPurchaseCodeUpdated']);
    Route::get('/all-robots', [RobotController::class, 'allRobots']);

    Route::get('/active-robots', [RobotController::class, 'activeRobots']);



    Route::post('/activate-robot', [RobotController::class, 'activateRobot']);
    Route::get('/robot-activation-request', [RobotController::class, 'robotActivationRequests']);
    Route::get('/activate-robot-updated', [RobotController::class, 'activateRobotUpdated']);
    Route::post('/create-robot-request', [RobotController::class, 'createRobotRequest']);
    Route::get('/active-robot-count', [RobotController::class, 'activeRobotCount']);
    Route::get('/delete-duplicate-robots', [RobotController::class, 'deleteDuplicateRobots']);
    Route::get('/check-generation', [RobotController::class, 'distributeGenerationCommission']);

    // report
    Route::get('/user-report', [ReportController::class, 'userReport']);
    Route::get('/user-report/all-converts', [ReportController::class, 'AllConverts']);
    Route::get('/user-report/all-activity-incomes', [ReportController::class, 'AllActivityIncomes']);
    Route::get('/user-report/all-fund-receives', [ReportController::class, 'AllFundReceives']);
    Route::get('/user-report/all-recharge', [ReportController::class, 'AllRecharge']);
    Route::get('/user-report/all-fund-transfers', [ReportController::class, 'AllFundTransfers']);
    Route::get('/user-report/all-fund-receive-for-agent', [ReportController::class, 'AllFundReceiveForAgent']);
    Route::get('/user-report/withdraw-statement-agent', [ReportController::class, 'WithdrawStatementAgent']);
    Route::get('/user-report/all-refer-bonus', [ReportController::class, 'AllReferBonus']);
    Route::get('/user-report/all-robot-income', [ReportController::class, 'AllRobotIncome']);
    Route::get('/user-report/all-performance-income', [ReportController::class, 'AllPerformanceIncome']);
    Route::get('/user-report/agent-commission-income', [ReportController::class, 'AgentCommissionIncomes']);
    Route::get('/user-report/all-gen-incomes', [ReportController::class, 'AllGenIncomes']);

    Route::get('/updates', [AppController::class, 'updates']);
    Route::get('/updates2', [AppController::class, 'updates2']);
    Route::get('/updates3', [AppController::class, 'updates3']);
    Route::get('/updates4', [AppController::class, 'updates4']);
    Route::post('/updates5', [AppController::class, 'updates5']);
    Route::get('/showlist', [AppController::class, 'showlist']);
    Route::get('/showlist2', [AppController::class, 'showlist2']);
    Route::post('/showlist3', [AppController::class, 'showlist3']);

    Route::get('/user-report/all-gen-incomes', [ReportController::class, 'updateCategory']);
    
    Route::get('/search-withdraw-statement/{keyword}', [WithdrawController::class, 'searchWithdrawStatements']);
    

});