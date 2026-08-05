<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\FacilityController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\ExtracurricularController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PpdbController;

/*
|--------------------------------------------------------------------------
| Portal API Routes
|--------------------------------------------------------------------------
|
| Endpoints consumed by the public-facing school portal (frontend).
| All responses are JSON.
|
*/

Route::prefix('v1')->group(function () {

    // ── Departments / Program Keahlian ──
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/departments/{slug}', [DepartmentController::class, 'show']);

    // ── Teachers / Guru ──
    Route::get('/teachers', [TeacherController::class, 'index']);
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);

    // ── Facilities / Fasilitas ──
    Route::get('/facilities', [FacilityController::class, 'index']);
    Route::get('/facilities/{slug}', [FacilityController::class, 'show']);

    // ── Partners / Mitra Industri ──
    Route::get('/partners', [PartnerController::class, 'index']);
    Route::get('/partners/{id}', [PartnerController::class, 'show']);

    // ── News / Berita ──
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{slug}', [NewsController::class, 'show']);

    // ── Gallery / Galeri ──
    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/gallery/{id}', [GalleryController::class, 'show']);

    // ── Achievements / Prestasi ──
    Route::get('/achievements', [AchievementController::class, 'index']);
    Route::get('/achievements/{id}', [AchievementController::class, 'show']);

    // ── Extracurriculars / Ekstrakurikuler ──
    Route::get('/extracurriculars', [ExtracurricularController::class, 'index']);
    Route::get('/extracurriculars/{slug}', [ExtracurricularController::class, 'show']);

    // ── Testimonials / Testimoni ──
    Route::get('/testimonials', [TestimonialController::class, 'index']);

    // ── FAQs ──
    Route::get('/faqs', [FaqController::class, 'index']);

    // ── PPDB (Penerimaan Peserta Didik Baru) ──
    Route::prefix('ppdb')->group(function () {
        Route::get('/config', [PpdbController::class, 'config']);
        Route::post('/daftar', [PpdbController::class, 'daftar']);
        Route::post('/cek-status', [PpdbController::class, 'cekStatus']);
        Route::post('/daftar-ulang', [PpdbController::class, 'daftarUlang']);
        Route::get('/statistik', [PpdbController::class, 'statistik']);
    });
});

