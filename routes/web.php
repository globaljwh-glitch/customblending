<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Api\GetItNowController;
use App\Http\Controllers\Admin\GetItNowController as AdminGetItNowController;
use App\Http\Controllers\Api\ConsultationRequestController;
use App\Http\Controllers\Admin\ConsultationRequestController as AdminConsultationRequestController;
use App\Http\Controllers\Api\AnalyticalLabServiceController;
use App\Http\Controllers\Admin\AnalyticalLabServiceController as AdminAnalyticalLabServiceController;
use App\Http\Controllers\Admin\ServiceFeatureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceAccordionController;
use App\Http\Controllers\Admin\ServiceIndustryController;
use App\Http\Controllers\Admin\ServiceMediaSectionController;

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {

                Route::get('media', [ServiceMediaSectionController::class, 'index'])
                    ->name('media.index');

                Route::get('media/create', [ServiceMediaSectionController::class, 'create'])
                    ->name('media.create');

                Route::post('media', [ServiceMediaSectionController::class, 'store'])
                    ->name('media.store');

                Route::get('media/{media}/edit', [ServiceMediaSectionController::class, 'edit'])
                    ->name('media.edit');

                Route::put('media/{media}', [ServiceMediaSectionController::class, 'update'])
                    ->name('media.update');

                Route::delete('media/{media}', [ServiceMediaSectionController::class, 'destroy'])
                    ->name('media.destroy');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {

                Route::get('industries', [ServiceIndustryController::class, 'index'])
                    ->name('industries.index');

                Route::get('industries/create', [ServiceIndustryController::class, 'create'])
                    ->name('industries.create');

                Route::post('industries', [ServiceIndustryController::class, 'store'])
                    ->name('industries.store');

                Route::get('industries/{industry}/edit', [ServiceIndustryController::class, 'edit'])
                    ->name('industries.edit');

                Route::put('industries/{industry}', [ServiceIndustryController::class, 'update'])
                    ->name('industries.update');

                Route::delete('industries/{industry}', [ServiceIndustryController::class, 'destroy'])
                    ->name('industries.destroy');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {

                Route::get('accordions', [ServiceAccordionController::class, 'index'])
                    ->name('accordions.index');

                Route::get('accordions/create', [ServiceAccordionController::class, 'create'])
                    ->name('accordions.create');

                Route::post('accordions', [ServiceAccordionController::class, 'store'])
                    ->name('accordions.store');

                Route::get('accordions/{accordion}/edit', [ServiceAccordionController::class, 'edit'])
                    ->name('accordions.edit');

                Route::put('accordions/{accordion}', [ServiceAccordionController::class, 'update'])
                    ->name('accordions.update');

                Route::delete('accordions/{accordion}', [ServiceAccordionController::class, 'destroy'])
                    ->name('accordions.destroy');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {

                Route::get('features', [ServiceFeatureController::class, 'index'])
                    ->name('features.index');

                Route::get('features/create', [ServiceFeatureController::class, 'create'])
                    ->name('features.create');

                Route::post('features', [ServiceFeatureController::class, 'store'])
                    ->name('features.store');

                Route::get('features/{feature}/edit', [ServiceFeatureController::class, 'edit'])
                    ->name('features.edit');

                Route::put('features/{feature}', [ServiceFeatureController::class, 'update'])
                    ->name('features.update');

                Route::delete('features/{feature}', [ServiceFeatureController::class, 'destroy'])
                    ->name('features.destroy');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('services', ServiceController::class);
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {

                Route::get('features', [ServiceFeatureController::class, 'index'])
                    ->name('features.index');

                Route::get('features/create', [ServiceFeatureController::class, 'create'])
                    ->name('features.create');

                Route::post('features', [ServiceFeatureController::class, 'store'])
                    ->name('features.store');

                Route::get('features/{feature}/edit', [ServiceFeatureController::class, 'edit'])
                    ->name('features.edit');

                Route::put('features/{feature}', [ServiceFeatureController::class, 'update'])
                    ->name('features.update');

                Route::delete('features/{feature}', [ServiceFeatureController::class, 'destroy'])
                    ->name('features.destroy');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('analytical-lab-services',
            [AdminAnalyticalLabServiceController::class, 'index']
        )->name('analytical-lab-services.index');

        Route::get('analytical-lab-services/{analyticalLabService}',
            [AdminAnalyticalLabServiceController::class, 'show']
        )->name('analytical-lab-services.show');
    });

Route::post('/api/analytical-lab-service', [AnalyticalLabServiceController::class, 'store']);

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('consultation-requests',
            [AdminConsultationRequestController::class, 'index']
        )->name('consultation-requests.index');

        Route::get('consultation-requests/{consultationRequest}',
            [AdminConsultationRequestController::class, 'show']
        )->name('consultation-requests.show');
    });

Route::post('/api/consultation-request', [ConsultationRequestController::class, 'store']);

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('get-it-now', [AdminGetItNowController::class, 'index'])
            ->name('get-it-now.index');

        Route::get('get-it-now/{getItNow}', [AdminGetItNowController::class, 'show'])
            ->name('get-it-now.show');
    });

Route::post('/api/get-it-now', [GetItNowController::class, 'store']);

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])
            ->name('contacts.index');

        Route::get('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])
            ->name('contacts.show');
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('industries', \App\Http\Controllers\Admin\IndustryController::class);
    });

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
});

// Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
//     Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
// });

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/resources', [ResourceController::class, 'index'])->name('resource.index');
    Route::get('/resources/create', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/resources', [ResourceController::class, 'store'])->name('resource.store');
    Route::get('/resources/{id}/edit', [ResourceController::class, 'edit'])->name('resource.edit');
    Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resource.update');
    Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resource.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{id}', [AdminBlogController::class, 'destroy'])->name('blog.delete');
});

Route::prefix('api')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{id}', [BlogController::class, 'show']);
    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);
});

Route::post('/api/contact', [ContactController::class, 'store']);

Route::get('/', function () {
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!login|dashboard|admin).*$');


require __DIR__.'/auth.php';
