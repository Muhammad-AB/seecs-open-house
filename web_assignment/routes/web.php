<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return redirect('/');
})->name('login');


Route::get('/logout',  function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route::get('/dashboard', function () {
//     return view('admin_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';


Route::any('/dashboard', function () {
    $user = request()->user();
    $projects = Project::all(); // Adjust this query based on your requirements

    if ($user->role == 'S') {
        return view('student_dashboard', ['projects' => $projects]);
    } else if ($user->role == 'E') {
        return view('eval_dashboard', ['projects' => $projects]);
    } else {
        return view('admin_dashboard', ['projects' => $projects]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/project/{id}', function ($id) {
    $project = Project::find($id);
    return view('eval_project', ['project' => $project]);
})->name('eval.project');


Route::post('/project/{id}', function (Request $request, $id) {
    $project = $project = Project::find($id);

    $project->marks = $request->input('projectMarks');
    $project->save();

    return view('eval_project', ['project' => $project]);
})->name('mark.project');


Route::get('/edit-project/{id?}', function ($id=null) {
    $project = $project = Project::find($id);

    return view('student_edit_project_detail', ['project' => $project]);
})->name('editProjectForm');


Route::any('/admin-edit-project/{id}', function ($id) {
    $project = $project = Project::find($id);
    // $avaiableLocation = ::find($id);

    return view('admin_project_details', ['project' => $project]);
})->name('admin.projectDetails');


// // Admin Routes
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('layouts.admin_dashboard');
//     })->name('admin.dashboard');

//     Route::get('/project/{id?}', function ($id=null) {
//         return view('layouts.admin_project_details', ['id' => $id]);
//     })->name('admin.project.details');
// });

// // Evaluator Routes
// Route::prefix('evaluator')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('layouts.eval_dashboard');
//     })->name('evaluator.dashboard');

//     Route::get('/project/{id?}', function ($id=null) {
//         return view('layouts.eval_view_project', ['id' => $id]);
//     })->name('evaluator.view.details');
// });

// // Student Routes
// Route::prefix('student')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('layouts.student_dashboard');
//     })->name('student.dashboard');

//     Route::get('/project/edit/{id?}', function ($id = null) {
//         return view('layouts.student_edit_project_detail', ['id' => $id]);
//     })->name('student.edit.project.detail');
// });