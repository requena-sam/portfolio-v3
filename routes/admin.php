<?php

use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Messages\MessagesIndex;
use App\Livewire\Admin\Projects\ProjectsIndex;
use App\Livewire\Admin\Settings;
use App\Livewire\Admin\Skills\SkillsIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('projects', ProjectsIndex::class)->name('projects.index');

    Route::get('skills', SkillsIndex::class)->name('skills.index');

    Route::get('messages', MessagesIndex::class)->name('messages.index');

    Route::get('settings', Settings::class)->name('settings');

    Route::post('logout', function () {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    })->name('logout');
});
