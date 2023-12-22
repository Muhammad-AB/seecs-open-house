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
