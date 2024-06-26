<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['middleware' => ['verified']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth','XSS']);
   
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);

    Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language')->middleware(['auth', 'XSS']);


    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
    });


    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
    });

    Route::get('/change/mode', [DashboardController::class, 'changeMode'])->name('change.mode');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);
    Route::put('change-password', [DashboardController::class, 'updatePassword'])->name('update.password');
    Route::put('edit-profile', [DashboardController::class, 'editprofile'])->name('update.account')->middleware(['auth', 'XSS']);

    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::post('business-setting', [SettingController::class, 'saveBusinessSettings'])->name('business.setting');
        Route::post('social-setting', [SettingController::class, 'saveSocialSettings'])->name('social.setting');
        Route::post('company-setting', [SettingController::class, 'saveCompanySettings'])->name('company.setting');
        Route::post('email-setting', [SettingController::class, 'saveEmailSettings'])->name('email.setting');
        Route::post('system-setting', [SettingController::class, 'saveSystemSettings'])->name('system.setting');
        Route::post('test-mail', [SettingController::class, 'testMail'])->name('test.mail');
        Route::post('send-mail', [SettingController::class, 'testSendMail'])->name('test.send.mail');
        Route::get('settings', [SettingController::class, 'index'])->name('settings');

        Route::any('/cookie-consent', [SettingController::class, 'CookieConsent'])->name('cookie-consent');
        Route::post('cookie-setting', [SettingController::class, 'saveCookieSettings'])->name('cookie.setting');
    });



    // Email Templates
    Route::get('email_template_lang/{lang?}', [EmailTemplateController::class, 'emailTemplate'])->name('email_template')->middleware(['auth', 'XSS']);
    Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware(['auth', 'XSS']);
    Route::put('email_template_lang/{id}/', [EmailTemplateController::class, 'updateEmailSettings'])->name('updateEmail.settings')->middleware(['auth', 'XSS']);
    Route::put('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware(['auth', 'XSS']);
    Route::put('email_template_status/{id}', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware(['auth', 'XSS']);
    Route::put('email_template_status/{id}', [EmailTemplateController::class, 'updateStatus'])->name('email_template.update')->middleware(['auth', 'XSS']);


    /*==================================Recaptcha====================================================*/
    Route::post('/recaptcha-settings', [SettingController::class, 'recaptchaSettingStore'])->name('recaptcha.settings.store')->middleware(['auth', 'XSS']);


    Route::post('storage-settings', [SettingController::class, 'storageSettingStore'])->name('storage.setting.store')->middleware(['auth', 'XSS']);
});


Route::resource('users', UserController::class)->middleware(['auth', 'XSS']);
Route::get('users/reset/{id}', [UserController::class, 'reset'])->name('users.reset')->middleware(['auth', 'XSS']);
Route::post('users/reset/{id}', [UserController::class, 'updatePassword'])->name('users.resetpassword')->middleware(['auth', 'XSS']);

//==================================== cache setting ====================================//
Route::get('/config-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success', 'Clear Cache successfully.');
});

Route::get('crud', [\App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');
Route::post('crud', [\App\Http\Controllers\CrudController::class, 'store'])->name('crud.store');

Route::post('disable-language', [LanguageController::class, 'disableLang'])->name('disablelanguage')->middleware(['auth', 'XSS']);


          Route::post('sociallink', [\App\Http\Controllers\SocialLinkController::class, 'store'])->name('sociallink.store'); 

          Route::get('sociallinks', [\App\Http\Controllers\SocialLinkController::class, 'index'])->name('sociallink.index'); 

          Route::get('sociallink/create', [\App\Http\Controllers\SocialLinkController::class, 'create'])->name('sociallink.create'); 

          Route::put('sociallink/{id}', [\App\Http\Controllers\SocialLinkController::class, 'update'])->name('sociallink.update'); 

          Route::delete('sociallink/{id}', [\App\Http\Controllers\SocialLinkController::class, 'destroy'])->name('sociallink.destroy'); 

          Route::get('sociallink/{id}/edit', [\App\Http\Controllers\SocialLinkController::class, 'edit'])->name('sociallink.edit'); 


          Route::post('about', [\App\Http\Controllers\AboutController::class, 'store'])->name('about.store'); 

          Route::get('abouts', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index'); 

          Route::get('about/create', [\App\Http\Controllers\AboutController::class, 'create'])->name('about.create'); 

          Route::put('about/{id}', [\App\Http\Controllers\AboutController::class, 'update'])->name('about.update'); 

          Route::delete('about/{id}', [\App\Http\Controllers\AboutController::class, 'destroy'])->name('about.destroy'); 

          Route::get('about/{id}/edit', [\App\Http\Controllers\AboutController::class, 'edit'])->name('about.edit'); 

      


          Route::post('faq', [\App\Http\Controllers\FaqController::class, 'store'])->name('faq.store'); 

          Route::get('faqs', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq.index'); 

          Route::get('faq/create', [\App\Http\Controllers\FaqController::class, 'create'])->name('faq.create'); 

          Route::put('faq/{id}', [\App\Http\Controllers\FaqController::class, 'update'])->name('faq.update'); 

          Route::delete('faq/{id}', [\App\Http\Controllers\FaqController::class, 'destroy'])->name('faq.destroy'); 

          Route::get('faq/{id}/edit', [\App\Http\Controllers\FaqController::class, 'edit'])->name('faq.edit'); 

      


          Route::post('partner', [\App\Http\Controllers\PartnerController::class, 'store'])->name('partner.store'); 

          Route::get('partners', [\App\Http\Controllers\PartnerController::class, 'index'])->name('partner.index'); 

          Route::get('partner/create', [\App\Http\Controllers\PartnerController::class, 'create'])->name('partner.create'); 

          Route::put('partner/{id}', [\App\Http\Controllers\PartnerController::class, 'update'])->name('partner.update'); 

          Route::delete('partner/{id}', [\App\Http\Controllers\PartnerController::class, 'destroy'])->name('partner.destroy'); 

          Route::get('partner/{id}/edit', [\App\Http\Controllers\PartnerController::class, 'edit'])->name('partner.edit'); 

      


          Route::post('counter', [\App\Http\Controllers\CounterController::class, 'store'])->name('counter.store'); 

          Route::get('counters', [\App\Http\Controllers\CounterController::class, 'index'])->name('counter.index'); 

          Route::get('counter/create', [\App\Http\Controllers\CounterController::class, 'create'])->name('counter.create'); 

          Route::put('counter/{id}', [\App\Http\Controllers\CounterController::class, 'update'])->name('counter.update'); 

          Route::delete('counter/{id}', [\App\Http\Controllers\CounterController::class, 'destroy'])->name('counter.destroy'); 

          Route::get('counter/{id}/edit', [\App\Http\Controllers\CounterController::class, 'edit'])->name('counter.edit'); 

      


          Route::post('aboutdetail', [\App\Http\Controllers\AboutDetailController::class, 'store'])->name('aboutdetail.store'); 

          Route::get('aboutdetails', [\App\Http\Controllers\AboutDetailController::class, 'index'])->name('aboutdetail.index'); 

          Route::get('aboutdetail/create', [\App\Http\Controllers\AboutDetailController::class, 'create'])->name('aboutdetail.create'); 

          Route::put('aboutdetail/{id}', [\App\Http\Controllers\AboutDetailController::class, 'update'])->name('aboutdetail.update'); 

          Route::delete('aboutdetail/{id}', [\App\Http\Controllers\AboutDetailController::class, 'destroy'])->name('aboutdetail.destroy'); 

          Route::get('aboutdetail/{id}/edit', [\App\Http\Controllers\AboutDetailController::class, 'edit'])->name('aboutdetail.edit'); 

      
          Route::post('tag', [\App\Http\Controllers\TagController::class, 'store'])->name('tag.store'); 

          Route::get('tags', [\App\Http\Controllers\TagController::class, 'index'])->name('tag.index'); 

          Route::get('tag/create', [\App\Http\Controllers\TagController::class, 'create'])->name('tag.create'); 

          Route::put('tag/{id}', [\App\Http\Controllers\TagController::class, 'update'])->name('tag.update'); 

          Route::delete('tag/{id}', [\App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy'); 

          Route::get('tag/{id}/edit', [\App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit'); 

      


          Route::post('blog', [\App\Http\Controllers\BlogController::class, 'store'])->name('blog.store'); 

          Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index'); 

          Route::get('blog/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('blog.create'); 

          Route::put('blog/{id}', [\App\Http\Controllers\BlogController::class, 'update'])->name('blog.update'); 

          Route::delete('blog/{id}', [\App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.destroy'); 

          Route::get('blog/{id}/edit', [\App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit'); 

      


          Route::post('contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store'); 

          Route::get('contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index'); 

          Route::get('contact/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create'); 

          Route::put('contact/{id}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contact.update'); 

          Route::delete('contact/{id}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy'); 

          Route::get('contact/{id}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit'); 

      


          Route::post('maininformation', [\App\Http\Controllers\MainInformationController::class, 'store'])->name('maininformation.store'); 

          Route::get('maininformations', [\App\Http\Controllers\MainInformationController::class, 'index'])->name('maininformation.index'); 

          Route::get('maininformation/create', [\App\Http\Controllers\MainInformationController::class, 'create'])->name('maininformation.create'); 

          Route::put('maininformation/{id}', [\App\Http\Controllers\MainInformationController::class, 'update'])->name('maininformation.update'); 

          Route::delete('maininformation/{id}', [\App\Http\Controllers\MainInformationController::class, 'destroy'])->name('maininformation.destroy'); 

          Route::get('maininformation/{id}/edit', [\App\Http\Controllers\MainInformationController::class, 'edit'])->name('maininformation.edit'); 

      


          Route::post('slider', [\App\Http\Controllers\SliderController::class, 'store'])->name('slider.store'); 

          Route::get('sliders', [\App\Http\Controllers\SliderController::class, 'index'])->name('slider.index'); 

          Route::get('slider/create', [\App\Http\Controllers\SliderController::class, 'create'])->name('slider.create'); 

          Route::put('slider/{id}', [\App\Http\Controllers\SliderController::class, 'update'])->name('slider.update'); 

          Route::delete('slider/{id}', [\App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy'); 

          Route::get('slider/{id}/edit', [\App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit'); 

      


      
      


          Route::post('service', [\App\Http\Controllers\ServiceController::class, 'store'])->name('service.store'); 

          Route::get('services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('service.index'); 

          Route::get('service/create', [\App\Http\Controllers\ServiceController::class, 'create'])->name('service.create'); 

          Route::put('service/{id}', [\App\Http\Controllers\ServiceController::class, 'update'])->name('service.update'); 

          Route::delete('service/{id}', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy'); 

          Route::get('service/{id}/edit', [\App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit'); 

      



          Route::post('certificate', [\App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store'); 

          Route::get('certificates', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index'); 

          Route::get('certificate/create', [\App\Http\Controllers\CertificateController::class, 'create'])->name('certificate.create'); 

          Route::put('certificate/{id}', [\App\Http\Controllers\CertificateController::class, 'update'])->name('certificate.update'); 

          Route::delete('certificate/{id}', [\App\Http\Controllers\CertificateController::class, 'destroy'])->name('certificate.destroy'); 

          Route::get('certificate/{id}/edit', [\App\Http\Controllers\CertificateController::class, 'edit'])->name('certificate.edit'); 

      


          Route::post('gallery', [\App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store'); 

          Route::get('gallerys', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index'); 

          Route::get('gallery/create', [\App\Http\Controllers\GalleryController::class, 'create'])->name('gallery.create'); 

          Route::put('gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update'); 

          Route::delete('gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy'); 

          Route::get('gallery/{id}/edit', [\App\Http\Controllers\GalleryController::class, 'edit'])->name('gallery.edit'); 

      


          Route::post('video', [\App\Http\Controllers\VideoController::class, 'store'])->name('video.store'); 

          Route::get('videos', [\App\Http\Controllers\VideoController::class, 'index'])->name('video.index'); 

          Route::get('video/create', [\App\Http\Controllers\VideoController::class, 'create'])->name('video.create'); 

          Route::put('video/{id}', [\App\Http\Controllers\VideoController::class, 'update'])->name('video.update'); 

          Route::delete('video/{id}', [\App\Http\Controllers\VideoController::class, 'destroy'])->name('video.destroy'); 

          Route::get('video/{id}/edit', [\App\Http\Controllers\VideoController::class, 'edit'])->name('video.edit'); 

      


          Route::post('project', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.store'); 

          Route::get('projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index'); 

          Route::get('project/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('project.create'); 

          Route::put('project/{id}', [\App\Http\Controllers\ProjectController::class, 'update'])->name('project.update'); 

          Route::delete('project/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy'); 

          Route::get('project/{id}/edit', [\App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit'); 

      


          Route::post('projectattribute', [\App\Http\Controllers\ProjectAttributeController::class, 'store'])->name('projectattribute.store'); 

          Route::get('projectattributes', [\App\Http\Controllers\ProjectAttributeController::class, 'index'])->name('projectattribute.index'); 

          Route::get('projectattribute/create', [\App\Http\Controllers\ProjectAttributeController::class, 'create'])->name('projectattribute.create'); 

          Route::put('projectattribute/{id}', [\App\Http\Controllers\ProjectAttributeController::class, 'update'])->name('projectattribute.update'); 

          Route::delete('projectattribute/{id}', [\App\Http\Controllers\ProjectAttributeController::class, 'destroy'])->name('projectattribute.destroy'); 

          Route::get('projectattribute/{id}/edit', [\App\Http\Controllers\ProjectAttributeController::class, 'edit'])->name('projectattribute.edit'); 

      


          Route::post('projectimage/{id}', [\App\Http\Controllers\ProjectImageController::class, 'store'])->name('projectimage.store'); 

          Route::get('projectimages/{id}', [\App\Http\Controllers\ProjectImageController::class, 'index'])->name('projectimage.index'); 

          Route::get('projectimage/create/{id}', [\App\Http\Controllers\ProjectImageController::class, 'create'])->name('projectimage.create'); 

          Route::put('projectimage/{id}', [\App\Http\Controllers\ProjectImageController::class, 'update'])->name('projectimage.update'); 

          Route::delete('projectimage/{id}', [\App\Http\Controllers\ProjectImageController::class, 'destroy'])->name('projectimage.destroy'); 

          Route::get('projectimage/{id}/edit', [\App\Http\Controllers\ProjectImageController::class, 'edit'])->name('projectimage.edit'); 

      


          Route::post('equipment', [\App\Http\Controllers\EquipmentController::class, 'store'])->name('equipment.store'); 

          Route::get('equipments', [\App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment.index'); 

          Route::get('equipment/create', [\App\Http\Controllers\EquipmentController::class, 'create'])->name('equipment.create'); 

          Route::put('equipment/{id}', [\App\Http\Controllers\EquipmentController::class, 'update'])->name('equipment.update'); 

          Route::delete('equipment/{id}', [\App\Http\Controllers\EquipmentController::class, 'destroy'])->name('equipment.destroy'); 

          Route::get('equipment/{id}/edit', [\App\Http\Controllers\EquipmentController::class, 'edit'])->name('equipment.edit'); 

      


          Route::post('equipmentimage/{id}', [\App\Http\Controllers\EquipmentImageController::class, 'store'])->name('equipmentimage.store'); 

          Route::get('equipmentimages/{id}', [\App\Http\Controllers\EquipmentImageController::class, 'index'])->name('equipmentimage.index'); 

          Route::get('equipmentimage/create/{id}', [\App\Http\Controllers\EquipmentImageController::class, 'create'])->name('equipmentimage.create'); 

          Route::put('equipmentimage/{id}', [\App\Http\Controllers\EquipmentImageController::class, 'update'])->name('equipmentimage.update'); 

          Route::delete('equipmentimage/{id}', [\App\Http\Controllers\EquipmentImageController::class, 'destroy'])->name('equipmentimage.destroy'); 

          Route::get('equipmentimage/{id}/edit', [\App\Http\Controllers\EquipmentImageController::class, 'edit'])->name('equipmentimage.edit'); 

      


          Route::post('serviceattribute', [\App\Http\Controllers\ServiceAttributeController::class, 'store'])->name('serviceattribute.store'); 

          Route::get('serviceattributes', [\App\Http\Controllers\ServiceAttributeController::class, 'index'])->name('serviceattribute.index'); 

          Route::get('serviceattribute/create', [\App\Http\Controllers\ServiceAttributeController::class, 'create'])->name('serviceattribute.create'); 

          Route::put('serviceattribute/{id}', [\App\Http\Controllers\ServiceAttributeController::class, 'update'])->name('serviceattribute.update'); 

          Route::delete('serviceattribute/{id}', [\App\Http\Controllers\ServiceAttributeController::class, 'destroy'])->name('serviceattribute.destroy'); 

          Route::get('serviceattribute/{id}/edit', [\App\Http\Controllers\ServiceAttributeController::class, 'edit'])->name('serviceattribute.edit'); 

      


   
