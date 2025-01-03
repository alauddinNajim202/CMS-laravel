<?php

use App\Http\Controllers\Web\Backend\BlogController;
use App\Http\Controllers\Web\Backend\CMS\AboutUsPage\AboutUsPageController;
use App\Http\Controllers\Web\Backend\CMS\ContactUsPage\ContactUsPageController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\ClientReviewController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\LandingPageController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\ProcessController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\SuccessGuideController;
use App\Http\Controllers\Web\Backend\ContactUsController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\ExperienceController;
use App\Http\Controllers\Web\Backend\ExpertController;
use App\Http\Controllers\Web\Backend\FAQController;
use App\Http\Controllers\Web\Backend\NewsletterListController;
use App\Http\Controllers\Web\Backend\Settings\DynamicPageController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\StripeSettingController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
use App\Http\Controllers\Web\Backend\SkillController;
use App\Http\Controllers\Web\Backend\ToolController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //! Route for SystemSettingController
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('system.index');
    Route::post('/system-setting/update', [SystemSettingController::class, 'update'])->name('system.update');

    //! Route for ProfileController
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.setting');
    Route::post('/update-profile', [ProfileController::class, 'UpdateProfile'])->name('update.profile');
    Route::post('/update-profile-password', [ProfileController::class, 'UpdatePassword'])->name('update.Password');

    //! Route for MailSettingController
    Route::get('/mail-setting', [MailSettingController::class, 'index'])->name('mail.setting');
    Route::post('/mail-setting', [MailSettingController::class, 'update'])->name('mail.update');

    //!Route for DynamicPageController
    Route::get('/dynamic-page', [DynamicPageController::class, 'index'])->name('dynamic_page.index');
    Route::get('/dynamic-page/create', [DynamicPageController::class, 'create'])->name('dynamic_page.create');
    Route::post('/dynamic-page/store', [DynamicPageController::class, 'store'])->name('dynamic_page.store');
    Route::get('/dynamic-page/edit/{id}', [DynamicPageController::class, 'edit'])->name('dynamic_page.edit');
    Route::post('/dynamic-page/update/{id}', [DynamicPageController::class, 'update'])->name('dynamic_page.update');
    Route::delete('/dynamic-page/delete/{id}', [DynamicPageController::class, 'destroy'])->name('dynamic_page.destroy');
    Route::get('/dynamic-page/status/{id}', [DynamicPageController::class, 'status'])->name('dynamic_page.status');

    //! Route for StripeSettingController
    Route::get('/stripe-setting', [StripeSettingController::class, 'index'])->name('stripe.index');
    Route::post('/stripe-setting', [StripeSettingController::class, 'update'])->name('stripe.update');

    //!Route for GallaryImageController for Landing page
    Route::controller(ClientReviewController::class)->group(function () {
        Route::get('/client-reviews', 'index')->name('client-reviews.index');
        Route::get('/client-reviews/create', 'create')->name('client-reviews.create');
        Route::post('/client-reviews/store', 'store')->name('client-reviews.store');
        Route::get('/client-reviews/edit/{id}', 'edit')->name('client-reviews.edit');
        Route::post('/client-reviews/update/{id}', 'update')->name('client-reviews.update');
        Route::delete('/client-reviews/delete/{id}', 'destroy')->name('client-reviews.destroy');
        Route::get('/client-reviews/status/{id}', 'status')->name('client-reviews.status');
    });

    // Route for Process Controller
    // Route::get('/process', [ProcessController::class, 'index'])->name('process.index');
    // Route::get('/process/create', [ProcessController::class, 'create'])->name('process.create');
    // Route::post('/process/store', [ProcessController::class, 'store'])->name('process.store');
    // Route::get('/process/edit/{id}', [ProcessController::class, 'edit'])->name('process.edit');
    // Route::post('/process/update/{id}', [ProcessController::class, 'update'])->name('process.update');
    // Route::delete('/process/delete/{id}', [ProcessController::class, 'destroy'])->name('process.destroy');
    // Route::get('/process/status/{id}', [ProcessController::class, 'status'])->name('process.status');

    // // Route for SuccessGuideController
    // Route::get('/clinical-rotation', [SuccessGuideController::class, 'index'])->name('clinical.index');
    // Route::get('/clinical-rotation/create', [SuccessGuideController::class, 'create'])->name('clinical.create');
    // Route::post('/clinical-rotation/store', [SuccessGuideController::class, 'store'])->name('clinical.store');
    // Route::get('/clinical-rotation/edit/{id}', [SuccessGuideController::class, 'edit'])->name('clinical.edit');
    // Route::post('/clinical-rotation/update/{id}', [SuccessGuideController::class, 'update'])->name('clinical.update');
    // Route::delete('/clinical-rotation/delete/{id}', [SuccessGuideController::class, 'destroy'])->name('clinical.destroy');
    // Route::get('/clinical-rotation/status/{id}', [SuccessGuideController::class, 'status'])->name('clinical.status');

    //!Route for ToolController for Tool Page
    Route::controller(ToolController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/tools/header', 'toolHeader')->name('tools.header');
        Route::patch('/tools/header', 'toolHeaderContentImage')->name('tools.header.update');

        Route::get('/tools', 'index')->name('tools.index');
        Route::get('/tools/create', 'create')->name('tools.create');
        Route::post('/tools/store', 'store')->name('tools.store');
        Route::get('/tools/edit/{id}', 'edit')->name('tools.edit');
        Route::post('/tools/update/{id}', 'update')->name('tools.update');
        Route::delete('/tools/delete/{id}', 'destroy')->name('tools.destroy');
        Route::get('/tools/status/{id}', 'status')->name('tools.status');
    });

    //!Route for BlogController for Blog Page
    Route::controller(BlogController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/blogs/header', 'blogHeader')->name('blogs.header');
        Route::patch('/blogs/header', 'blogHeaderContentImage')->name('blogs.header.update');

        Route::get('/blogs', 'index')->name('blogs.index');
        Route::get('/blogs/create', 'create')->name('blogs.create');
        Route::post('/blogs/store', 'store')->name('blogs.store');
        Route::get('/blogs/edit/{id}', 'edit')->name('blogs.edit');
        Route::post('/blogs/update/{id}', 'update')->name('blogs.update');
        Route::delete('/blogs/delete/{id}', 'destroy')->name('blogs.destroy');
        Route::get('/blogs/status/{id}', 'status')->name('blogs.status');
    });

    //!Route for ExpertsController for Blog Page
    Route::controller(ExpertController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/experts', 'index')->name('experts.index');
        Route::get('/experts/create', 'create')->name('experts.create');
        Route::post('/experts/store', 'store')->name('experts.store');
        Route::get('/experts/edit/{id}', 'edit')->name('experts.edit');
        Route::post('/experts/update/{id}', 'update')->name('experts.update');
        Route::delete('/experts/delete/{id}', 'destroy')->name('experts.destroy');
        Route::get('/experts/status/{id}', 'status')->name('experts.status');
    });

    Route::controller(SkillController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/skills', 'index')->name('skills.index');
        Route::get('/skills/create', 'create')->name('skills.create');
        Route::post('/skills/store', 'store')->name('skills.store');
        Route::get('/skills/edit/{id}', 'edit')->name('skills.edit');
        Route::post('/skills/update/{id}', 'update')->name('skills.update');
        Route::delete('/skills/delete/{id}', 'destroy')->name('skills.destroy');
        Route::get('/skills/status/{id}', 'status')->name('skills.status');
    });

    Route::controller(ExperienceController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/experiences', 'index')->name('experiences.index');
        Route::get('/experiences/create', 'create')->name('experiences.create');
        Route::post('/experiences/store', 'store')->name('experiences.store');
        Route::get('/experiences/edit/{id}', 'edit')->name('experiences.edit');
        Route::post('/experiences/update/{id}', 'update')->name('experiences.update');
        Route::delete('/experiences/delete/{id}', 'destroy')->name('experiences.destroy');
        Route::get('/experiences/status/{id}', 'status')->name('experiences.status');
    });




    // Route for Faq Controller
    // Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    // Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    // Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    // Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    // Route::post('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
    // Route::delete('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
    // Route::get('/faq/status/{id}', [FaqController::class, 'status'])->name('faq.status');

    Route::controller(LandingPageController::class)->group(function () {

        /// Emanueltozzi code start

        Route::get('/cms/landing-page/banner', 'banner')->name('cms.landing-page.banner');
        Route::patch('/cms/landing-page/banner', 'bannerContentImage')->name('cms.landing-page.banner.update');

        Route::get('/cms/landing-page/experties', 'experties')->name('cms.landing-page.experties');
        Route::patch('/cms/landing-page/experties', 'expertiesContent')->name('cms.landing-page.experties.update');

        Route::get('/cms/landing-page/client-review-header', 'clientReviewHeader')->name('cms.landing-page.client-review-header');
        Route::patch('/cms/landing-page/client-review-header', 'clientReviewHeaderContent')->name('cms.landing-page.client-review-header.update');

        Route::get('/cms/landing-page/contact-us-header', 'contactUsHeader')->name('cms.landing-page.contact-us-header');
        Route::patch('/cms/landing-page/contact-us-header', 'contactUsHeaderContent')->name('cms.landing-page.contact-us-header.update');

        Route::get('/cms/landing-page/who-we-are', 'whoWeAre')->name('cms.landing-page.who-we-are');
        Route::patch('/cms/landing-page/who-we-are', 'whoWeAreContent')->name('cms.landing-page.who-we-are.update');

        // Route::get('/cms/landing-page/ideal-preceptor', 'idealPreceptor')->name('cms.landing-page.ideal-preceptor');
        // Route::patch('/cms/landing-page/ideal-preceptor', 'idealPreceptorContent')->name('cms.landing-page.ideal-preceptor.update');
        Route::get('/cms/landing-page/connect-member', 'connectMember')->name('cms.landing-page.connect-member');
        Route::patch('/cms/landing-page/connect-member', 'connectMemberContent')->name('cms.landing-page.connect-member.update');
        // Route::get('/cms/landing-page/expert-preceptor', 'expertPreceptor')->name('cms.landing-page.expert-preceptor');
        // Route::patch('/cms/landing-page/expert-preceptor', 'expertPreceptorContent')->name('cms.landing-page.expert-preceptor.update');
        Route::get('/cms/landing-page/available-preceptor', 'availablePreceptor')->name('cms.landing-page.map');
        Route::patch('/cms/landing-page/available-preceptor', 'availablePreceptorContent')->name('cms.landing-page.map.update');
    });

    Route::controller(AboutUsPageController::class)->group(function () {
        Route::get('/cms/about-us/banner', 'banner')->name('cms.about-us.banner');
        Route::patch('/cms/about-us/banner', 'bannerContent')->name('cms.about-us.banner.update');

        Route::get('/cms/about-us/who-we-are', 'whoWeAre')->name('cms.about-us.who-we-are');
        Route::patch('/cms/about-us/who-we-are', 'whoWeAreContent')->name('cms.about-us.who-we-are.update');

        Route::get('/cms/about-us/digital-journey', 'digitalJourney')->name('cms.about-us.digital-journey');
        Route::patch('/cms/about-us/digital-journey', 'digitalJourneyContent')->name('cms.about-us.digital-journey.update');

        Route::get('/cms/about-us/business-growth', 'businessGrowth')->name('cms.about-us.business-growth');
        Route::patch('/cms/about-us/business-growth', 'businessGrowthContent')->name('cms.about-us.business-growth.update');

        Route::get('/cms/about-us/why-choose-us', 'whyChooseUs')->name('cms.about-us.why-choose-us');
        Route::patch('/cms/about-us/why-choose-us', 'whyChooseUsContent')->name('cms.about-us.why-choose-us.update');
    });

    Route::controller(AboutUsPageController::class)->group(function () {

        // Route::get('/cms/landing-page/connect-member', 'connectMember')->name('cms.landing-page.connect-member');
        // Route::patch('/cms/landing-page/connect-member', 'connectMemberContent')->name('cms.landing-page.connect-member.update');
        // Route::get('/cms/landing-page/success-preceptor', 'successPreceptor')->name('cms.landing-page.success-preceptor');
        // Route::patch('/cms/landing-page/success-preceptor', 'successPreceptorContent')->name('cms.landing-page.success-preceptor.update');
    });

    Route::controller(ContactUsPageController::class)->group(function () {
        Route::get('/cms/student-form/', 'studentForm')->name('cms.student-form');
        Route::patch('/cms/student-form/', 'studentFormContent')->name('cms.student-form.update');
        Route::get('/cms/intake-form/', 'intakeForm')->name('cms.intake-form');
        Route::patch('/cms/intake-form/', 'intakeFormContent')->name('cms.intake-form.update');
        Route::get('/cms/ideal-preceptor/preceptor', 'idealPreceptor')->name('cms.ideal-preceptor.preceptor');
        Route::patch('/cms/ideal-preceptor/preceptor', 'idealPreceptorFormContent')->name('cms.ideal-preceptor.preceptor.update');

        Route::get('/cms/card/', 'cardForm')->name('cms.card-one');
        Route::patch('/cms/card-one/', 'cardOneFormContent')->name('cms.card-one.update');
        Route::patch('/cms/card-two/', 'cardTwoFormContent')->name('cms.card-two.update');
        Route::patch('/cms/card-three/', 'cardThreeFormContent')->name('cms.card-three.update');
        Route::patch('/cms/card-four/', 'cardFourFormContent')->name('cms.card-four.update');
        Route::patch('/cms/card-five/', 'cardFiveFormContent')->name('cms.card-five.update');
        Route::patch('/cms/card-six/', 'cardSixFormContent')->name('cms.card-six.update');
        Route::patch('/cms/card-seven/', 'cardSevenFormContent')->name('cms.card-seven.update');

        Route::get('/cms/contact-information/', 'contact')->name('cms.contact');
        Route::patch('/cms/contact-information/', 'contactContent')->name('cms.contact.update');
    });

    //!Route for ContactUsController
    Route::controller(ContactUsController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::delete('/contact/destroy/{id}', 'destroy')->name('contact.destroy');
    });
    //!Route for NewsletterListController
    Route::controller(NewsletterListController::class)->group(function () {
        Route::get('/newsletter', 'index')->name('newsletter.index');
        Route::delete('/newsletter/destroy/{id}', 'destroy')->name('newsletter.destroy');
    });
});
