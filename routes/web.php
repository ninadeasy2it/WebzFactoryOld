<?php

use Illuminate\Support\Facades\Route;

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


require __DIR__.'/auth.php';

Route::get('/', ['as' => 'home','uses' => 'HomeController@landingPage',])->middleware(['XSS']);
Route::get('/home', ['as' => 'home','uses' => 'HomeController@index',])->middleware(['auth','XSS','CheckPlan']);
Route::get('/dashboard', ['as' => 'home','uses' => 'HomeController@index',])->middleware(['auth','XSS','CheckPlan']);
Route::get('/appointment-calendar/{id?}', ['as' => 'appointment.calendar','uses' => 'AppointmentDeatailController@getCalenderAllData',])->middleware(['auth','XSS']);

Route::get('/appointment-note/{id?}', ['as' => 'appointment.add-note','uses' => 'AppointmentDeatailController@add_note',])->middleware(['auth','XSS']);
Route::post('/appointment-note-store/{id?}', ['as' => 'appointment.note.store','uses' => 'AppointmentDeatailController@note_store',])->middleware(['auth','XSS']);

Route::get('get-appointment-detail/{id}', ['as' => 'appointment.details','uses' => 'AppointmentDeatailController@getAppointmentDetails',])->middleware(['auth','XSS']);
Route::resource('business', 'BusinessController')->middleware(['auth','XSS','CheckPlan']);
Route::group(['middleware' => ['auth','XSS','CheckPlan'],], function (){

    Route::get('business/edit/{id}', ['as' => 'business.edit', 'uses' => 'BusinessController@edit']);
    Route::get('business/theme-edit/{id}', ['as' => 'business.edit2', 'uses' => 'BusinessController@edit2']);
    Route::get('business/analytics/{id}', ['as' => 'business.analytics', 'uses' => 'BusinessController@analytics']);
    Route::post('business/edit-theme/{id}', ['as' => 'business.edit-theme', 'uses' => 'BusinessController@editTheme']);
    Route::post('business/domain-setting/{id}', ['as' => 'business.domain-setting', 'uses' => 'BusinessController@domainsetting']);
    Route::resource('appointments', 'AppointmentDeatailController');
    // Route::get('appoinments/', ['as' => 'appointments.index', 'uses' => 'AppointmentDeatailController@index']);
    Route::resource('users', 'UserController');
    Route::get('user/{id}/plan', 'UserController@upgradePlan')->name('plan.upgrade');
    Route::get('user/{id}/plan/{pid}', 'UserController@activePlan')->name('plan.active');
    Route::get('business/preview/card/{slug}', ['as' => 'business.template', 'uses' => 'BusinessController@getcard']);
    Route::delete('business/destroy/{id}', ['as' => 'business.destroy', 'uses' => 'BusinessController@destroy']);
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('edit-profile', 'UserController@editprofile')->name('update.account');
    Route::resource('systems', 'SystemController');
    Route::post('email-settings', 'SystemController@saveEmailSettings')->name('email.settings');
    Route::post('company-settings-store', 'SystemController@storeCompanySetting')->name('company.settings.store');

    Route::post('test-mail', 'SystemController@testMail')->name('test.mail')->middleware(['auth','XSS']);
    Route::post('test-mail/send', 'SystemController@testSendMail')->name('test.send.mail')->middleware(['auth','XSS']);

    // Route::post('/test',['as' => 'test.email','uses' =>'SettingsController@testEmail'])->middleware(['auth','XSS']);
    // Route::post('/test/send',['as' => 'test.email.send','uses' =>'SettingsController@testEmailSend'])->middleware(['auth','XSS']);


    Route::get('change-language/{lang}', 'UserController@changeLanquage')->name('change.language');
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language');
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data');
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language');
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language');

    Route::delete('/lang/{lang}', 'LanguageController@destroyLang')->name('lang.destroy');
    Route::resource('coupons', 'CouponController');
});

Route::post('stripe-settings', 'SystemController@savePaymentSettings')->name('payment.settings')->middleware(['auth','XSS']);
Route::get('/stripe/{code}', 'StripePaymentController@stripe')->name('stripe')->middleware(['auth','XSS']);
Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post')->middleware(['auth','XSS']);
Route::get('order', 'StripePaymentController@index')->name('order.index')->middleware(['auth','XSS']);
Route::any('/plan/error/{flag}', 'PaymentWallPaymentController@paymenterror')->name('callback.error');
Route::any('plan-mercado-callback/{plan_id}', 'MercadoPaymentController@mercadopagoPaymentCallback')->name('plan.mercado.callback')->middleware(['auth']);
Route::resource('plans', 'PlanController');
//================================= Custom Landing Page ====================================//


Route::get('/{slug}', 'BusinessController@getcard');
Route::post('appoinment/make-appointment', ['as' => 'appoinment.store', 'uses' => 'AppointmentDeatailController@store'])->middleware('XSS');

Route::post('change-password', 'UserController@updatePassword')->name('update.password');
Route::get('/download/{slug}', 'BusinessController@getVcardDownload')->name('bussiness.save');

Route::get('/apply-coupon', ['as' => 'apply.coupon','uses' => 'CouponController@applyCoupon',])->middleware(['auth','XSS']);


Route::post('prepare-payment', ['as' => 'prepare.payment','uses' => 'PlanController@preparePayment',])->middleware(['auth','XSS',]);
Route::get('/payment/{code}', ['as' => 'payment','uses' => 'PlanController@payment',])->middleware(['auth','XSS',]);

Route::post('plan-pay-with-paypal', 'PaypalController@planPayWithPaypal')->name('plan.pay.with.paypal')->middleware(['auth','XSS',]);


//================================= Plan Payment Gateways  ====================================//

Route::post('/plan-pay-with-paystack',['as' => 'plan.pay.with.paystack','uses' =>'PaystackPaymentController@planPayWithPaystack'])->middleware(['auth','XSS']);
Route::get('/plan/paystack/{pay_id}/{plan_id}', ['as' => 'plan.paystack','uses' => 'PaystackPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-flaterwave',['as' => 'plan.pay.with.flaterwave','uses' =>'FlutterwavePaymentController@planPayWithFlutterwave'])->middleware(['auth','XSS']);
Route::get('/plan/flaterwave/{txref}/{plan_id}', ['as' => 'plan.flaterwave','uses' => 'FlutterwavePaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-razorpay',['as' => 'plan.pay.with.razorpay','uses' =>'RazorpayPaymentController@planPayWithRazorpay'])->middleware(['auth','XSS']);
Route::get('/plan/razorpay/{txref}/{plan_id}', ['as' => 'plan.razorpay','uses' => 'RazorpayPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-paytm',['as' => 'plan.pay.with.paytm','uses' =>'PaytmPaymentController@planPayWithPaytm'])->middleware(['auth','XSS']);
Route::post('/plan/paytm/{plan}', ['as' => 'plan.paytm','uses' => 'PaytmPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-mercado',['as' => 'plan.pay.with.mercado','uses' =>'MercadoPaymentController@planPayWithMercado'])->middleware(['auth','XSS']);
Route::post('/plan/mercado', ['as' => 'plan.mercado','uses' => 'MercadoPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-mollie',['as' => 'plan.pay.with.mollie','uses' =>'MolliePaymentController@planPayWithMollie'])->middleware(['auth','XSS']);
Route::get('/plan/mollie/{plan}', ['as' => 'plan.mollie','uses' => 'MolliePaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-skrill',['as' => 'plan.pay.with.skrill','uses' =>'SkrillPaymentController@planPayWithSkrill'])->middleware(['auth','XSS']);
Route::get('/plan/skrill/{plan}', ['as' => 'plan.skrill','uses' => 'SkrillPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-coingate',['as' => 'plan.pay.with.coingate','uses' =>'CoingatePaymentController@planPayWithCoingate'])->middleware(['auth','XSS']);
Route::get('/plan/coingate/{plan}', ['as' => 'plan.coingate','uses' => 'CoingatePaymentController@getPaymentStatus']);


Route::get('{id}/plan-get-payment-status', 'PaypalController@planGetPaymentStatus')->name('plan.get.payment.status')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('business/{slug}/get_card', 'BusinessController@cardpdf')->name('get.card');
Route::get('businessqr/download/', 'BusinessController@downloadqr')->name('download.qr');   

// Route::get('business/card', 'BusinessController@card')->name('get.card');


Route::post('business/block-setting/{id}', ['as' => 'business.block-setting', 'uses' => 'BusinessController@blocksetting'])->middleware(
    [
        'auth',
        'XSS',
    ]
);

//=================================Plan Request Module ====================================//
Route::get('plan_request/index', 'PlanRequestController@index')->name('plan_request.index')->middleware(['auth','XSS',]);
Route::get('request_frequency/{id}', 'PlanRequestController@requestView')->name('request.view')->middleware(['auth','XSS',]);
Route::get('request_send/{id}', 'PlanRequestController@userRequest')->name('send.request')->middleware(['auth','XSS',]);
Route::get('request_response/{id}/{response}', 'PlanRequestController@acceptRequest')->name('response.request')->middleware(['auth','XSS',]);
Route::get('request_cancel/{id}', 'PlanRequestController@cancelRequest')->name('request.cancel')->middleware(['auth','XSS',]);


/*==================================Recaptcha====================================================*/

Route::post('/recaptcha-settings',['as' => 'recaptcha.settings.store','uses' =>'SystemController@recaptchaSettingStore'])->middleware(['auth','XSS']);

/*====================================Contacts====================================================*/

Route::get('/contacts/show', ['as' => 'contacts.index','uses' => 'ContactsController@index',])->middleware(['auth','XSS']);
Route::delete('/contacts/delete/{id}', ['as' => 'contacts.destroy','uses' => 'ContactsController@destroy',])->middleware(['auth','XSS']);
Route::post('/contacts/store/', ['as' => 'contacts.store','uses' => 'ContactsController@store',]);
Route::get('/contacts/business/show{id}', ['as' => 'business.contacts.show','uses' => 'ContactsController@index',])->middleware(['auth','XSS']);
Route::get('/contacts/edit/{id}', ['as' => 'contacts.edit','uses' => 'ContactsController@edit',])->middleware(['auth','XSS']);
Route::post('/contacts/update/{id}', ['as' => 'Contacts.update','uses' => 'ContactsController@update',])->middleware(['auth','XSS']);

/*========================================================================================================================*/

Route::post('business/custom-js-setting/{id}', ['as' => 'business.custom-js-setting', 'uses' => 'BusinessController@savejsandcss']);
Route::post('business/seo/{id}', ['as' => 'business.seo-setting', 'uses' => 'BusinessController@saveseo']);
Route::post('business/googlefont/{id}', ['as' => 'business.googlefont-setting', 'uses' => 'BusinessController@savegooglefont']);
Route::post('business/setpassword/{id}', ['as' => 'business.password-setting', 'uses' => 'BusinessController@savepassword']);
Route::post('business/setgdpr/{id}', ['as' => 'business.gdpr-setting', 'uses' => 'BusinessController@savegdpr']);
Route::post('business/setbranding/{id}', ['as' => 'business.branding-setting', 'uses' => 'BusinessController@savebranding']);

/*==============================================================================================================================*/

Route::any('user-reset-password/{id}', 'UserController@userPassword')->name('user.reset');
Route::post('user-reset-password/{id}', 'UserController@userPasswordReset')->name('user.password.update');

/*=============================*/

Route::post('paymentwall', ['as' => 'paymentwall', 'uses' => 'PaymentWallPaymentController@index']);
Route::post('plan-pay-with-paymentwall/{plan}', ['as' => 'plan.pay.with.paymentwall', 'uses' => 'PaymentWallPaymentController@planPayWithPaymentwall']);

Route::get('email_template_lang/{id}/{lang?}', 'EmailTemplateController@manageEmailLang')->name('manage.email.language')->middleware(['auth']);
Route::put('email_template_lang/{id}/', 'EmailTemplateController@updateEmailSettings')->name('updateEmail.settings')->middleware(['auth','XSS']);
// Route::resource('email_template', 'EmailTemplateController')->middleware(['auth','XSS']);


Route::post('storage-settings',['as' => 'storage.setting.store','uses' =>'SystemController@storageSettingStore'])->middleware(['auth','XSS']);

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

