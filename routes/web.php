<?php

use App\Exports\BlogExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ForgetPasswordManager;

Route::view("/", "welcome")->name("home"); // all
Route::get("/register", [AuthController::class, "register"])->name("register"); // admin
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post"); // admin
Route::get("/login", [AuthController::class, "login"])->name("login"); // all
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post"); // all
Route::get("/forget-password", [ForgetPasswordManager::class, "forgetPassword"])->name("forget.password"); // all
Route::post("/forget-password", [ForgetPasswordManager::class, "forgetPasswordPost"])->name("forget.password.post"); // all
Route::get("/reset-password/{token}/{email}", [ForgetPasswordManager::class, "resetPassword"])->name("reset.password"); // all
Route::post("/reset-password", [ForgetPasswordManager::class, "resetPasswordPost"])->name("reset.password.post"); // all
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create'); // admin
Route::post('/blog', [PostController::class, 'store'])->name('posts.store'); // admin
Route::post('ckeditor/upload', [PostController::class, 'upload'])->name('ckeditor.upload');
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts/store-details/{postId}', [PostController::class, 'storeDetails'])->name('posts.store-details');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/show', [PostController::class, 'showBlogDetails'])->name('table.index'); // admin
Route::get('/export-blogs', function () {
    return Excel::download(new BlogExport, 'blogs.xlsx');
})->name('export.blogs'); // admin

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // all
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // all
Route::get('/user-blogs', [BlogController::class, 'userBlogs'])->name('user.blogs'); // user
Route::get('/export-pdf', [BlogController::class, 'exportPdf'])->name('export.pdf');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::post('/admin/users/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');   
});
Route::get('/about', [BlogController::class, 'about'])->name('about');
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('showfeedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');


