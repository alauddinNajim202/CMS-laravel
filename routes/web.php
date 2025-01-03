<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\NewsletterController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/professional',[HomeController::class,'professional'])->name('home.professional');
Route::get('/professional-details/{id}',[HomeController::class,'professional_details'])->name('home.professional_details');



Route::get('/services',[HomeController::class,'services'])->name('services');


Route::get('/article-lists',[HomeController::class,'article_lists'])->name('home.article_lists');
Route::get('/articles',[HomeController::class,'articles'])->name('home.articles');
Route::get('/articles-details/{id}',[HomeController::class,'articles_details'])->name('home.articles_details');




Route::get('/home-tools',[HomeController::class,'tools'])->name('home.tools');

Route::post('/tools/download', [HomeController::class, 'download'])->name('tools.download');

Route::get('/Iscriviti-alla-newsletter',[HomeController::class,'newsletter'])->name('newsletter');



Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/available-preceptors',[HomeController::class,'availablePreceptors'])->name('available-preceptors');
Route::get('/faq-page',[HomeController::class,'faq'])->name('faq.page');
Route::get('/student-form',[HomeController::class,'studentForm'])->name('student.form');
Route::get('/become-preceptor',[HomeController::class,'becomePreceptor'])->name('become-preceptor');
Route::get('/contact-us',[HomeController::class,'contactUs'])->name('conatct-us');
Route::post('/contact', [HomeController::class, 'send'])->name('contact.send');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


require __DIR__.'/auth.php';
