<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomepageBannerController;
use App\Http\Controllers\StayHealthyController;
use App\Http\Controllers\OurStoryController;
use App\Http\Controllers\FundsController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\MeetWhroPatientsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WHROImpactController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\GetInvolvedController;
use App\Http\Controllers\AboutMeController;

Route::get('/',[FrontendController::class, 'index'])->name('homepage');

Route::prefix('about-me')->group(function(){
    Route::get('content/{category_id}',[AboutMeController::class, 'loadContent'])->name('load.about.me.content');
});

Route::prefix('our-support')->group(function(){
    Route::get('content/{category_id}',[SupportController::class, 'loadContent'])->name('load.support.content');
});

Route::prefix('get-involved')->group(function(){
    Route::get('content/{category_id}',[GetInvolvedController::class, 'loadContent'])->name('load.get.involved.content');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.admin.index');
    })->name('dashboard');

    Route::prefix('blog')->group(function(){
        Route::get('/',[BlogController::class, 'createBlog'])->name('create.blog');
        Route::post('store-blog',[BlogController::class, 'storeBlog'])->name('save.blog');
        Route::get('manage-blog',[BlogController::class, 'manageBlog'])->name('manage.blog');
        Route::post('destroy-blog',[BlogController::class, 'destroyBlog'])->name('destroy.blog');
        Route::get('edit-blog/{id}',[BlogController::class, 'editBlog'])->name('edit.blog');
        Route::post('update-blog/{id}',[BlogController::class, 'updateBlog'])->name('update.blog');
    });

    Route::prefix('homepage-banner')->group(function(){
        Route::get('edit-homepage-banner',[HomepageBannerController::class, 'editHomepageBanner'])->name('edit.homepage.banner');
        Route::post('update-homepage-banner',[HomepageBannerController::class, 'updateHomepageBanner'])->name('update.homepage.banner');
    });

    Route::prefix('stay-healthy')->group(function(){
        Route::get('edit-stay-healthy',[StayHealthyController::class, 'editStayHealthy'])->name('edit.stay.healthy');
        Route::post('update-stay-healthy',[StayHealthyController::class, 'updateStayHealthy'])->name('update.stay.healthy');
        Route::get('add-stay-healthy-point',[StayHealthyController::class, 'addStayHealthyPoint'])->name('add.stay.healthy.point');
        Route::post('store-stay-healthy-point',[StayHealthyController::class, 'storeStayHealthyPoint'])->name('store.stay.healthy.point');
        Route::get('manage-stay-healthy-point',[StayHealthyController::class, 'manageStayHealthyPoint'])->name('manage.stay.healthy.point');
        Route::get('edit-stay-healthy-point/{id}',[StayHealthyController::class, 'editStayHealthyPoint'])->name('edit.stay.healthy.point');
        Route::post('update-stay-healthy-point/{id}',[StayHealthyController::class, 'updateStayHealthyPoint'])->name('update.stay.healthy.point');
    });

    Route::prefix('our-support')->group(function(){
        Route::get('manage-support',[SupportController::class, 'manageSupport'])->name('manage.support');
        Route::get('edit-support/{id}',[SupportController::class, 'editSupport'])->name('edit.support');
        Route::post('update-support/{id}',[SupportController::class, 'updateSupport'])->name('update.support');
    });

    Route::prefix('get-involved')->group(function(){
        Route::get('manage-get-involved',[GetInvolvedController::class, 'manageGetInvolved'])->name('manage.get.involved');
        Route::get('edit-get-involved/{id}',[GetInvolvedController::class, 'editGetInvolved'])->name('edit.get.involved');
        Route::post('update-get-involved/{id}',[GetInvolvedController::class, 'updateGetInvolved'])->name('update.get.involved');
    });

    Route::prefix('about-me')->group(function(){
        Route::get('manage-about-me',[AboutMeController::class, 'manageAboutMe'])->name('manage.about.me');
        Route::get('edit-about-me/{id}',[AboutMeController::class, 'editAboutMe'])->name('edit.about.me');
        Route::post('update-about-me/{id}',[AboutMeController::class, 'updateAboutMe'])->name('update.about.me');
    });

    Route::prefix('whro-impact')->group(function(){
        Route::get('add-whro-impact',[WHROImpactController::class, 'addWHROImpact'])->name('add.whro.impact');
        Route::post('store-whro-impact',[WHROImpactController::class, 'storeWHROImpact'])->name('store.whro.impact');
        Route::get('manage-whro-impact',[WHROImpactController::class, 'manageWHROImpact'])->name('manage.whro.impact');
        Route::get('edit-whro-impact/{id}',[WHROImpactController::class, 'editWHROImpact'])->name('edit.whro.impact');
        Route::post('update-whro-impact/{id}',[WHROImpactController::class, 'updateWHROImpact'])->name('update.whro.impact');
    });

    Route::prefix('our-story')->group(function(){
        Route::get('edit-our-story',[OurStoryController::class, 'editOurStory'])->name('edit.our.story');
        Route::post('update-our-story',[OurStoryController::class, 'updateOurStory'])->name('update.our.story');
    });

    Route::prefix('how-we-use-funds')->group(function(){
        Route::get('edit-how-we-use-funds',[FundsController::class, 'editHowWeUseFunds'])->name('edit.how.we.use.funds');
        Route::post('update-how-we-use-funds',[FundsController::class, 'updateHowWeUseFunds'])->name('update.how.we.use.funds');
    });

    Route::prefix('why-choose-us')->group(function(){
        Route::get('create-why-choose-us',[WhyChooseUsController::class, 'createWhyChooseUs'])->name('create.why.choose.us');
        Route::post('store-why-choose-us',[WhyChooseUsController::class, 'storeWhyChooseUs'])->name('store.why.choose.us');
        Route::get('manage-why-choose-us',[WhyChooseUsController::class, 'manageWhyChooseUs'])->name('manage.why.choose.us');
        Route::get('edit-why-choose-us',[WhyChooseUsController::class, 'editWhyChooseUs'])->name('edit.why.choose.us');
        Route::post('update-why-choose-us',[WhyChooseUsController::class, 'updateWhyChooseUs'])->name('update.why.choose.us');
    });

    Route::prefix('meet-whro-patients')->group(function(){
        Route::get('create-meet-whro-patients',[MeetWhroPatientsController::class, 'createMeetWhroPatients'])->name('create.meet.whro.patients');
        Route::post('store-meet-whro-patients',[MeetWhroPatientsController::class, 'storeMeetWhroPatients'])->name('store.meet.whro.patients');
        Route::get('manage-meet-whro-patients',[MeetWhroPatientsController::class, 'manageMeetWhroPatients'])->name('manage.meet.whro.patients');
        Route::get('edit-meet-whro-patients/{id}',[MeetWhroPatientsController::class, 'editMeetWhroPatients'])->name('edit.meet.whro.patients');
        Route::post('update-meet-whro-patients/{id}',[MeetWhroPatientsController::class, 'updateMeetWhroPatients'])->name('update.meet.whro.patients');
    });

});
