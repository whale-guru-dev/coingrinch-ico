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

Auth::routes();


Route::get('/FAQ', 'HomeController@FAQ');

Route::get('/AddToken','HomeController@AddToken');
Route::post('/AddToken','HomeController@RegisterToken');

Route::get('/Privacy-Policy','HomeController@privacypolicy');

Route::get('/Terms-of-Use','HomeController@termsofuse');

Route::get('/VerifyEmail','VerifyController@VerifyEmail')->name('VerifyEmail'); 
Route::get('/Email-Verification-Link/{verifycode}', 'VerifyController@EmailVerify');

Route::post('/NewsLetter','HomeController@NewsLetter');

Route::post('/ResendVerifyEmail','VerifyController@ResendVerifyEmail')->name('ResendVerifyEmail');

Route::post('/CloseAccount','VerifyController@closeaccount')->name('CloseAccount');

Route::get('/VerifyMobile','VerifyController@VerifyMobile')->name('VerifyMobile');

Route::post('/VerifyMobile','VerifyController@MobileVerify');

Route::post('/ResendVerifyMobile','VerifyController@ResendVerifyMobile')->name('ResendVerifyMobile');

Route::get('/follow-me/{referral}','HomeController@Referral');

Route::post('/Google2fa','Auth\LoginController@login');

Route::post('/Coinbase_Api','CoinbaseController@Ipn_Manage');

Route::post('/tosupport','HomeController@tosupport');

Route::group(['middleware'=>['Checkverify','timeout'],'prefix'=>'Customers','namespace'=>'Customers'],function(){

	
	Route::get('/','HomeController@index');

	Route::get('/Dashboard','HomeController@index');

	Route::get('/BuyTokens','BuyTokenController@index');
	Route::post('/PurchaseToken' , 'BuyTokenController@purchase');

	Route::get('/Wallet','WalletController@index');

	Route::get('/WalletHistory','WalletController@history');

	Route::get('/Sponsorbonus','WalletController@sponsorbonus');
	Route::post('/Sponsorwithdraw','WalletController@withdraw');
	Route::post('/SponsorwithdrawVerify','WalletController@withdraw_verify');

	Route::get('/Transactions','TransactionController@index');

	Route::get('/Referrals','AffilateController@referrals');

	Route::get('/Share','AffilateController@share');
	Route::post('/ShareLink','AffilateController@sharelink');

	Route::get('/Profile','ProfileController@index');
	Route::post('/ChangePassword','ProfileController@changepassword');
	Route::post('/SetEthAddr','ProfileController@setethaddr');
	Route::post('/ProfileImage','ProfileController@setprofileimage');
	Route::post('/SetGoogle2fa','ProfileController@setgoogle2fa');

	Route::get('/Verification','VerificationController@index');

	Route::get('/Message','MessageController@index'); 
	Route::post('/GetMsg' , 'MessageController@GetMsg');
	Route::get('/GetNewMsg', 'MessageController@GetNewMsg');
	Route::post('/DelAllMsg', 'MessageController@DelAllMsg');
	Route::post('/DelMsg','MessageController@DelMsg');
	Route::get('/NewMsgCount','MessageController@NewMsgCount');

});

Route::group(['middleware' => 'checkalone', 'prefix'=>'Admins','namespace'=>'Admins'],function(){

	Route::get('/','HomeController@index');

	Route::get('/Login', 'LoginController@showLoginForm')->name('Admins.Login');
    Route::post('/Login', 'LoginController@login')->name('Admins.Login.Submit');
    Route::get('/Logout', 'LoginController@logout');

	Route::get('/Dashboard','HomeController@index');

	Route::get('/GeneralSetting', 'GeneralSettingController@index');
	Route::post('/GeneralSettings','GeneralSettingController@setgeneralsetting');

	Route::get('/EmailSetting','GeneralSettingController@emailsetting');
	Route::post('/SetEmailSetting','GeneralSettingController@setemailsetting');

	Route::get('/SMSSetting','GeneralSettingController@smssetting');
	Route::post('/SetSmsSetting','GeneralSettingController@setsmssetting');

	Route::get('/AffilateBonus','GeneralSettingController@affilatebonus');
	Route::post('/AffilateBonus','GeneralSettingController@setaffilatebonus');

	Route::get('/CalendarICO','GeneralSettingController@calendarico');
	Route::post('/SetCalendarIco','GeneralSettingController@setcalendarico');

	Route::get('/Invested','GeneralSettingController@invested');

	Route::get('/Blog','GeneralSettingController@blog');
	Route::post('/ManageBlog','GeneralSettingController@manageblog');
	Route::get('/Blog/{id}','GeneralSettingController@blogedit');

	Route::get('/LogoSetting','GeneralSettingController@logosetting');
	Route::post('/SetLogoSetting','GeneralSettingController@setlogosetting');

	Route::get('/CoinFund','TransactionController@coinfund');
	Route::get('/CoinFundWithdraw' ,'TransactionController@coinwithdraw');

	// Route::get('/KYC','TransactionController@kyc');
	// Route::post('/KycManage','TransactionController@kycmanage');
	// Route::get('/KYC/{id}','TransactionController@kycreview');

	Route::get('/TokenLogs','TransactionController@usertrxs');

	Route::get('/UserDepositedFund','TransactionController@userdepositedfund');

	Route::get('/AdminGeneratedFund','TransactionController@admingeneratedfund');
	Route::post('/TrxSearch','TransactionController@trxsearch');

	Route::get('/Transactions','TransactionController@usertrxs');

	Route::get('/Staffs','UsermanagementController@staffs');

	Route::get('/AllUsers','UsermanagementController@allusers');
	Route::post('/Search', 'UsermanagementController@search');
	Route::get('/UserDetails/{id}','UsermanagementController@userdetails');
	Route::post('/UserNormalUpdate','UsermanagementController@usernormalupdate');


	Route::get('/UsersTransaction/{id}','UsermanagementController@usertransaction');

	Route::get('/UsersDeposit/{id}','UsermanagementController@userdeposit');

	Route::get('/UsersReferral/{id}','UsermanagementController@referrals');

	Route::get('/UsersWithdraw/{id}','UsermanagementController@userwithdraw');

	Route::get('/UsersLogin/{id}','UsermanagementController@userlogins');

	Route::get('/BalanceUser/{id}','UsermanagementController@balanceuser');
	Route::post('/AddUserBalance','UsermanagementController@adduserbalance');

	Route::get('/AffiliateBalanceUser/{id}','UsermanagementController@affiliatebonus');
	Route::post('/AddUserAffiliateBalance','UsermanagementController@adduseraffiliatebalance');

	Route::get('/SMStoUser/{id}','UsermanagementController@smstouser');
	Route::post('/SendSms', 'UsermanagementController@sendsmstouser');

	Route::get('/EMAILtoUser/{id}','UsermanagementController@emailtouser');
	Route::post('/SendEmail', 'UsermanagementController@sendemailtouser');

	Route::get('/SendMessage','UsermanagementController@sendmessage');
	Route::post('/SendMsg','UsermanagementController@sendmsg');
	Route::post('/SearchForMessage','UsermanagementController@searchformsg');

	Route::get('/BannedUsers','UsermanagementController@bannedusers');
	Route::post('/DelBannedUser','UsermanagementController@delBannedUser');

	Route::get('/VerifiedUsers','UsermanagementController@verifiedusers');

	Route::get('/PendingUsers','UsermanagementController@pendingusers');

	Route::get('/EmailUnverifiedUsers','UsermanagementController@emailunverifiedusers');

	Route::get('/MobileUnverifiedUsers','UsermanagementController@mobileunverifiedusers');

	Route::get('/KYCUnverifiedUsers','UsermanagementController@kycunverifiedusers');

	Route::get('/ChangeProfile','AdminSettingController@changeprofile');
	Route::post('/SetNewPassword','AdminSettingController@setnewpassword');
	Route::post('/SetNewUsername','AdminSettingController@setnewusername');

	Route::get('/TokenControl', 'TokenController@index');
	Route::post('/TokenControl/MintFinish', 'TokenController@mintFinish');
	Route::post('/TokenControl/AllowTransfer', 'TokenController@allowTransfer');
	Route::post('/TokenControl/MintToken', 'TokenController@minttoken');
	Route::post('/TokenControl/FreezeAccount','TokenController@freezeAccount');
	Route::post('/TokenControl/MintUserToken','TokenController@MintUserToken');

	Route::get('/TokenHolders','TokenController@tokenholders');

	
	Route::get('/ModalSetting','GeneralSettingController@modalsetting');

	Route::post('/ModalSetting','GeneralSettingController@setmodalsetting');

	Route::get('/NewsLetter','UsermanagementController@newsletter');
	Route::post('/SendSubscribers','UsermanagementController@tosubscriber');

});
