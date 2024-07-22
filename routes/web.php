<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TranningCourseController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\ContactCotroller;
use App\Http\Controllers\GeneralController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/welcome', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/visimisi', [AboutController::class, 'visiMisi'])->name('visimisi');
Route::get('/companybrief', [AboutController::class, 'companyBrief'])->name('companybrief');
Route::get('/contact', [ContactCotroller::class, 'contact'])->name('contact');



// General Route
Route::get('/fetch-upcoming-trainings', [GeneralController::class, 'fetchUpcomingTrainings'])->name('fetch-upcoming-trainings');
Route::get('/fetch-upcoming-jobvacancy', [GeneralController::class, 'fetchUpcomingJobvacancy'])->name('fetch-upcoming-jobvacancy');
Route::get('/fetch-upcoming-news', [GeneralController::class, 'fetcUpcominghNews'])->name('fetch-upcoming-news');
// end route General Route

// route training course
Route::get('/traningcourse', [TranningCourseController::class, 'index'])->name('traningcourse');
Route::get('/detail-course/{id}', [TranningCourseController::class, 'detailCourse'])->name('detail-course');
Route::get('/get-content-training-course', [TranningCourseController::class, 'getContentTrainingCourse'])->name('get-content-training-course');
Route::get('/preview-filter-jenis-sertifikasi-course', [TranningCourseController::class, 'previewFilter_jenis_sertifikasi'])->name('preview-filter-jenis-sertifikasi-course');
Route::get('/filter-type-course', [TranningCourseController::class, 'previewFilter_Type_course'])->name('filter-type-course');
// End route training course

// route Job vacancy
Route::get('/jobvacancy', [JobVacancyController::class, 'index'])->name('jobvacancy');
Route::get('/detail-job/{id}', [JobVacancyController::class, 'detailJob'])->name('detail-job');
Route::get('/preview-filter-job', [JobVacancyController::class, 'previewFilter'])->name('preview-filter-job');
Route::get('/filter-work-location-job', [JobVacancyController::class, 'previewFilterWorkLocation'])->name('filter-work-location-job');
Route::get('/filter-experience-level-job', [JobVacancyController::class, 'previewFilterExperienceLevel'])->name('filter-experience-level-job');
Route::get('/filter-education-job', [JobVacancyController::class, 'previewFilterEducation'])->name('filter-education-job');
Route::get('/get-content-job', [JobVacancyController::class, 'getContentJob'])->name('get-content-job');
// end route Job vacancy



