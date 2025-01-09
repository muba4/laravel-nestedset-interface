<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('admin.rubrics.')
    ->namespace('App\Http\Controllers\Admin\Rubric')
    ->prefix('admin/rubrics')
    ->group(function () {
        Route::get('/', 'IndexController')->name('index');

        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');

        Route::get('/create-primary-child/{rubric}', 'CreatePrimaryChildController')->name('create-primary-child');
        Route::post('/create-primary-child', 'StorePrimaryChildController')->name('store-primary-child');

        Route::get('/create-finalizing-child/{rubric}', 'CreateFinalizingChildController')->name('create-finalizing-child');
        Route::post('/create-finalizing-child', 'StoreFinalizingChildController')->name('store-finalizing-child');

        Route::get('/create-primary-sibling/{rubric}', 'CreatePrimarySiblingController')->name('create-primary-sibling');
        Route::post('/create-primary-sibling', 'StorePrimarySiblingController')->name('store-primary-sibling');

        Route::get('/create-finalizing-sibling/{rubric}', 'CreateFinalizingSiblingController')->name('create-finalizing-sibling');
        Route::post('/create-finalizing-sibling', 'StoreFinalizingSiblingController')->name('store-finalizing-sibling');

        Route::get('/move-up/{rubric}', 'MoveUpController')->name('move-up');
        Route::get('/move-down/{rubric}', 'MoveDownController')->name('move-down');

        Route::get('/fix-tree', 'FixTreeController')->name('fix-tree');

        Route::get('/delete-witch-children/{rubric}', 'DeleteWitchChildrenController')->name('delete-witch-children');
        Route::delete('/delete-witch-children', 'DeletingWitchChildrenController')->name('deleting-witch-children');

        Route::get('/delete-single/{rubric}', 'DeleteSingleController')->name('delete-single');
        Route::delete('/delete-single', 'DeletingSingleController')->name('deleting-single');

        Route::get('/move-single/{rubric}', 'MoveSingleController')->name('move-single');
        Route::patch('/move-single', 'MoveSingleSaveController')->name('move-single-save');
    });

require __DIR__ . '/auth.php';
