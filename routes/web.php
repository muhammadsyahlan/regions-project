<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Member;
use App\Http\Livewire\Kotkab;
use App\Http\Livewire\Provinsi;
use App\Http\Livewire\Personal;
use App\Http\Livewire\Hobby;
use App\Http\Livewire\Snpersonal;
use App\Http\Livewire\Vpersonal;
use App\Http\Livewire\Vprovinsi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/member', Member::class)->name('member');

Route::get('/provinsi', Provinsi::class)->name('provinsi');
Route::get('/provinsi/view/{id}', Vprovinsi::class)->name('vprovinsi');

Route::get('/kotkab', Kotkab::class)->name('kotkab');

Route::get('/personal', Personal::class)->name('personal');
Route::get('/personal/summernote/{id}', Snpersonal::class)->name('snpersonal');
Route::get('/personal/view/{id}', Vpersonal::class)->name('vpersonal');

Route::get('/hobby', Hobby::class)->name('hobby');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 