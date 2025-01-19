<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\adminController;

// Page d'accueil
Route::get('/', function () {
    return view('index');
});

// Routes pour les étudiants

Route::get('/etudient/login', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/admin/etudientAddPage', [EtudiantController::class, 'showAddPage'])->name('etudiant.showAddPage');
Route::post('/admin/addEtudient', [EtudiantController::class, 'ajouter'])->name('etudient.ajouter');
Route::delete('/admin/etudiant/{id}', [EtudiantController::class, 'delete'])->name('etudiant.delete');
Route::get('/admin/etudiantUpdatePage/{id}', [EtudiantController::class, 'showEtudiantUpdatePage'])->name('etudiant.showEditPage');
Route::put('/admin/etudiant/edit/{id}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::post('/etudiant/profil', [EtudiantController::class, 'etudiantLogin'])->name('etudiant.auth');
Route::post('/etudiant/profil/{id}', [EtudiantController::class, 'upload'])->name('rapportEtudiant.upload');



// Routes pour les professeurs

Route::get('/prof/login', [ProfesseurController::class, 'index'])->name('professeur.index');
Route::get('/admin/profAddPage', [ProfesseurController::class, 'showAddPage'])->name('prof.showAddPage');
Route::post('/admin/addProf', [ProfesseurController::class, 'ajouter'])->name('prof.ajouter');
Route::delete('/admin/prof/{id}', [ProfesseurController::class, 'delete'])->name('prof.delete');
Route::get('/admin/profUpdatePage/{id}', [ProfesseurController::class, 'showProfUpdatePage'])->name('prof.showEditPage');
Route::put('/admin/prof/edit/{id}', [ProfesseurController::class, 'edit'])->name('prof.edit');
Route::post('/prof/profil', [adminController::class, 'profetadmin'])->name('admin.auth');

//Routes pour l'admin

Route::post('/admin', [adminController::class, 'profetadmin'])->name('admin.auth');
Route::get('/admin/allEtudiants', [adminController::class, 'getallEtudiants'])->name('etudiant.getall');
Route::get('/admin/allProfs', [adminController::class, 'getallProfs'])->name('prof.getall');
Route::get('/affectation', [AdminController::class, 'getAffecationPage'])->name('admin.affectation');


