<?php

use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');




    Route::get('/company', [OfferController::class, 'companyView'])->name('company');

    // CRUD Actions
    Route::post('/company/store', [OfferController::class, 'addCompany'])->name('company.store');
    Route::post('/company/update/{id}', [OfferController::class, 'editCompany'])->name('company.update');
    Route::post('/company/delete/{id}', [OfferController::class, 'deleteCompany'])->name('company.delete');





    Route::get('/offer-letter/add', [OfferController::class, 'addOfferView'])->name('offer-letter.add');

    // Offer Letter Add Page
    Route::get('/offer-letter/add', [OfferController::class, 'addOfferView'])->name('offer-letter.add');
    Route::get('/get-company/{id}', [OfferController::class, 'getCompany'])->name('company.get');
    Route::post('/offer-letter/store', [OfferController::class, 'addOfferLetterStore'])->name('offer-letter.store');


    // Dashboard
    Route::get('/dashboard', [OfferController::class, 'dashboard'])->name('dashboard');

    // Create
    Route::get('/offer-letter/add', [OfferController::class, 'addOfferView'])->name('offer-letter.add');
    Route::post('/offer-letter/store', [OfferController::class, 'addOfferLetterStore'])->name('offer-letter.store');

    // Edit
    Route::get('/offer-letter/edit/{id}', [OfferController::class, 'editOfferView'])->name('offer-letter.edit');
    Route::post('/offer-letter/update/{id}', [OfferController::class, 'editOfferLetter'])->name('offer-letter.update');

    // Delete
    Route::delete('/offer-letter/delete/{id}', [OfferController::class, 'deleteOfferLetter'])->name('offer-letter.delete');

    // AJAX: Get Offer Letter
    Route::get('/offer-letter/get/{id}', [OfferController::class, 'getOfferLetter'])->name('offer-letter.get');

    // View Offer Letter
    Route::get('/offer-letter/view/{id}', [OfferController::class, 'showOfferLetterView'])->name('offer-letter.view');








    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
