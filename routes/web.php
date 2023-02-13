<?php

use App\Models\Type;
use App\Models\User;

use App\Models\Reset;
use App\Models\Course;
use App\Models\Module;
use App\Models\Category;
use App\Models\Progress;
use App\Services\CourseUserService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MainController;

use App\Http\Controllers\TestController;

use App\Http\Controllers\ResetController;
use App\Http\Controllers\CourseController;




use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\VideosController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Admin\DocController;
use App\Http\Controllers\MyCoursesController;
use App\Http\Controllers\Admin\DocsController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\IntramuralController;
use App\Http\Controllers\ModuleDataController;
use App\Http\Controllers\Admin\MailsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\IntramuralsController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\TrainingFormController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\EditTestController;
use App\Http\Controllers\TrainingAnswerController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\AddLectureController;
use App\Http\Controllers\Admin\EditCourseController;
use App\Http\Controllers\Admin\EditVideosController;
use App\Http\Controllers\Admin\DeleteVideoController;
use App\Http\Controllers\Admin\EditModulesController;
use App\Http\Controllers\ResetVerificationController;
use App\Http\Controllers\Admin\CreateCourseController;
use App\Http\Controllers\Admin\CreateModuleController;
use App\Http\Controllers\Admin\DeleteCourseController;
use App\Http\Controllers\Admin\DeleteModuleController;
use App\Http\Controllers\Admin\EditLecturesController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\SignupVerificationController;
use App\Http\Controllers\Admin\DeleteLectureController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\EditIntramuralController;
use App\Http\Controllers\Admin\DeleteCourseDocController;
use App\Http\Controllers\Admin\DeleteTestPhotoController;
use App\Http\Controllers\Admin\StatisticCourseController;
use App\Http\Controllers\Admin\CreateIntramuralController;
use App\Http\Controllers\Admin\DeleteIntramuralController;
use App\Http\Controllers\Admin\StatisticRegionsController;
use App\Http\Controllers\Admin\DeleteCourseAvatarController;
use App\Http\Controllers\Admin\IntramuralsCatalogController;
use App\Http\Controllers\Admin\DeleteIntramuralDocController;
use App\Http\Controllers\Admin\DeleteIntramuralAvatarController;


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

Route::get('/', [MainController::class, 'main'])->name('main');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
	Route::get('/users', [UsersController::class, 'show'])->name('admin.users');
	Route::get('/user/{id}', [UserController::class, 'show'])->name('admin.user');
	Route::get('/statistic', [StatisticController::class, 'show'])->name('admin.statistic');
	Route::get('/statistic/regions', [StatisticRegionsController::class, 'show'])->name('admin.statistic.regions');
	Route::get('/statistic/course/{id}', [StatisticCourseController::class, 'show'])->name('admin.statistic.course');
	Route::get('/docs', [DocsController::class, 'show'])->name('admin.docs');
	Route::get('/doc/{id}', [DocController::class, 'show'])->name('admin.doc');
	Route::post('/doc/approve/{id}', [DocController::class, 'approve'])->name('admin.approve');
	Route::post('/doc/reject/{id}', [DocController::class, 'reject'])->name('admin.reject');
	Route::post('/doc/reload/{id}', [DocController::class, 'reject'])->name('admin.reload');
	Route::get('/mails', [MailsController::class, 'show'])->name('admin.mails');
	Route::get('/mail/{id}', [MailController::class, 'show'])->name('admin.mail');
	Route::get('/mail/sent/{id}', [MailController::class, 'sent'])->name('admin.mail.sent');
	Route::get('/catalog', [CatalogController::class, 'show'])->name('admin.catalog');
	Route::post('/catalog/handler/{course_id}', [CatalogController::class, 'handler'])->name('admin.catalog.handler');
	Route::get('/add-lecture', [AddLectureController::class, 'show'])->name('admin.add.lecture');
	Route::post('/add-lecture/handler', [AddLectureController::class, 'handler'])->name('admin.add.lecture.handler');
	Route::get('/notifications', [NotificationsController::class, 'show'])->name('admin.notifications');
	Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
	Route::post('/notification/handler{id}', [NotificationController::class, 'handler'])->name('admin.notification.handler');
	
	Route::get('/create/course', [CreateCourseController::class, 'show'])->name('admin.create.course');
	Route::post('/create/course/handler', [CreateCourseController::class, 'handler'])->name('admin.create.course.handler');

	Route::get('/edit/course/{id}', [EditCourseController::class, 'show'])->name('admin.edit.course');
	Route::post('/edit/course/handler/{id}', [EditCourseController::class, 'handler'])->name('admin.edit.course.handler');

	Route::post('/delete/course/handler/{id}', [DeleteCourseController::class, 'handler'])->name('admin.delete.course.handler');
	Route::get('/delete/course/avatar/handler/{id}', [DeleteCourseAvatarController::class, 'handler'])->name('admin.delete.course.avatar.handler');
	Route::get('/delete/course/doc/handler/{status}/{id}', [DeleteCourseDocController::class, 'handler'])->name('admin.delete.course.doc.handler');

	Route::post('/edit/course/handler/{id}', [EditCourseController::class, 'handler'])->name('admin.edit.course.handler');

	Route::get('/edit/modules/{id}', [EditModulesController::class, 'show'])->name('admin.edit.modules');
	Route::post('/edit/modules/handler/{id}', [EditModulesController::class, 'handler'])->name('admin.edit.modules.handler');

	Route::post('/create/module/handler/{id}', [CreateModuleController::class, 'handler'])->name('admin.create.module.handler');

	Route::post('/delete/module/handler/{id}', [DeleteModuleController::class, 'handler'])->name('admin.delete.module.handler');

	Route::get('/edit/module/lectures/{id}', [EditLecturesController::class, 'show'])->middleware('module.edition.is.allowed')->name('admin.edit.module.lectures');
	Route::post('/edit/module/lectures/handler/{id}', [EditLecturesController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.edit.module.lectures.handler');
	Route::post('/delete/lecture/handler/{id}/{key}', [DeleteLectureController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.delete.lecture.handler');

	Route::get('/edit/module/videos/{id}', [EditVideosController::class, 'show'])->middleware('module.edition.is.allowed')->name('admin.edit.module.videos');
	Route::post('/edit/module/videos/handler/{id}', [EditVideosController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.edit.module.videos.handler');
	Route::post('/delete/video/handler/{id}/{key}', [DeleteVideoController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.delete.video.handler');

	Route::get('/edit/module/test/{id}', [EditTestController::class, 'show'])->middleware('module.edition.is.allowed')->name('admin.edit.module.test');
	Route::post('/edit/module/test/handler/{id}', [EditTestController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.edit.module.test.handler');
	Route::get('/delete/test/handler/{id}/{alias}/{key}', [DeleteTestPhotoController::class, 'handler'])->middleware('module.edition.is.allowed')->name('admin.delete.test.handler');

	Route::get('/intramurals/catalog', [IntramuralsCatalogController::class, 'show'])->name('admin.intramurals.catalog');

	Route::get('/create/intramural', [CreateIntramuralController::class, 'show'])->name('admin.create.intramural');
	Route::post('/create/intramural/handler', [CreateIntramuralController::class, 'handler'])->name('admin.create.intramural.handler');

	Route::get('/edit/intramural/{id}', [EditIntramuralController::class, 'show'])->name('admin.edit.intramural');
	Route::post('/edit/intramural/handler/{id}', [EditIntramuralController::class, 'handler'])->name('admin.edit.intramural.handler');

	Route::post('/delete/intramural/handler/{id}', [DeleteIntramuralController::class, 'handler'])->name('admin.delete.intramural.handler');

	Route::get('/delete/intramural/avatar/handler/{id}', [DeleteIntramuralAvatarController::class, 'handler'])->name('admin.delete.intramural.avatar.handler');

	Route::get('/delete/intramural/doc/handler/{id}', [DeleteIntramuralDocController::class, 'handler'])->name('admin.delete.intramural.doc.handler');
});

Route::get('/signup', [SignupController::class, 'form'])->name('signup')->middleware('guest');
Route::post('/signup/handler', [SignupController::class, 'handler'])->name('signup.handler');
Route::get('/signup/verification/{id}/{selector}', [SignupVerificationController::class, 'verification'])->name('signup.verification');


Route::get('/signin', [SigninController::class, 'form'])->name('signin')->middleware('guest');
Route::post('/signin/handler', [SigninController::class, 'handler'])->name('signin.handler');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::prefix('reset')->group(function () {
	Route::get('/', [ResetController::class, 'show'])->name('reset')->middleware('guest');
	Route::post('/handler', [ResetController::class, 'handler'])->name('reset.handler');
	Route::get('/verification/{id}/{selector}', [ResetVerificationController::class, 'verification'])->name('reset.verification');
});

Route::prefix('profile')->middleware(['auth'])->group(function () {
	Route::get('/', [ProfileController::class, 'show'])->name('profile');
	Route::get('/edit', [ProfileEditController::class, 'show'])->name('profile.edit');
	Route::post('/edit/handler/{id}', [ProfileEditController::class, 'handler'])->name('profile.edit.handler');
});


Route::get('/course/{id}', [CourseController::class, 'show'])->middleware(['course.existence', 'no.hidden.course'])->name('course');

Route::get('/my-courses', [MyCoursesController::class, 'show'])->middleware(['auth'])->name('my.courses');

Route::prefix('training')->middleware('auth')->group(function () {
	Route::get('/{id}', [TrainingController::class, 'show'])->middleware('my.course')->name('training');
	Route::post('/informed/{id}', [TrainingController::class, 'informed'])->middleware('my.finish')->name('training.informed');
	Route::get('/form/{id}', [TrainingFormController::class, 'show'])->middleware('my.progress')->name('training.form');
	Route::post('/form/handler/{id}', [TrainingFormController::class, 'handler'])->middleware('my.progress')->name('training.form.handler');
	Route::get('/answer/{id}', [TrainingAnswerController::class, 'show'])->middleware('my.progress')->name('training.answer');
	Route::post('/answer/reload/{id}', [TrainingAnswerController::class, 'reload'])->middleware('my.progress')->name('training.answer.reload');
});


Route::prefix('module')->middleware(['auth', 'my.progress'])->group(function () {
	Route::get('/test/{module_id}/{module_alias}/{progress_id}/{progress_alias}', [TestController::class, 'show'])->name('module.test');
	Route::get('/videos/{module_id}/{module_alias}/{progress_id}/{progress_alias}', [VideosController::class, 'show'])->name('module.videos');
	Route::get('/lectures/{module_id}/{module_alias}/{progress_id}/{progress_alias}', [LecturesController::class, 'show'])->name('module.lectures');
});

Route::get('/intramurals', [IntramuralsController::class, 'show'])->name('intramurals');
Route::get('/intramural/{id}', [IntramuralController::class, 'show'])->name('intramural');

Route::get('/clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
	return "Кэш очищен.";
});


// Route::prefix('test')->group(function () {
// 			Route::get('/give', function() {
// 				CourseUserService::giveAccess(1, 1);
// 				dd('Выполнено');
// 			});
// 			Route::get('/take', function() {
// 				CourseUserService::takeAccessAway(1, 1);
// 				dd('Выполнено');
// 			});

// 			Route::get('/login', function() {
// 						Auth::loginUsingId(1);
//       					return redirect()->route('main');
// 			});
// 			Route::get('/logout', function() {
// 					Auth::logout();
//       				return redirect()->route('main');
// 			});
// 			Route::get('/progress/reload', function() {
// 				$progress = Progress::find(1);
// 				$progress->list = '{
// 					"1": {
// 						"result": "pending",
// 						"percent": 0,
// 						"fraction": {
// 							"top": 0,
// 							"bottom": 3
// 						}
// 					},
// 					"2": {
// 						"result": "pending",
// 						"percent": 0,
// 						"fraction": {
// 							"top": 0,
// 							"bottom": 3
// 						}
// 					},
// 					"3": {
// 						"result": "pending",
// 						"percent": 0,
// 						"fraction": {
// 							"top": 0,
// 							"bottom": 6
// 						}
// 					}
// 				   }';
// 				   $progress->save();
//   return 'Прогресс обновлён!';
// 		});
// });



Route::match(['GET', 'POST'], '/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::match(['GET', 'POST'], '/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::match(['GET', 'POST'], '/payment', [PaymentController::class, 'index'])->name('payment.index');