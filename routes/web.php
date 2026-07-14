<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home');
Route::view('/about', 'pages.about.index')->name('about');
Route::view('/projects', 'pages.projects.index')->name('projects');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
