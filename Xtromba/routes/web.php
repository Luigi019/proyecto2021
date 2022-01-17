<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    RoleController,
    HomeController,
    UserController,
    AdminController,
    TeacherController as AdminTeacherController,
    TagController,
    StudentController,
    RequestToTeacherController,
    CourseController as AdminCourseController,
    LessonController as AdminLessonController,
    CityController,
    ExperienceController as AdminExperienceController,
    TransactionController,
    BaseController,
    PageController as AdminPageController
};

use App\Http\Controllers\{
    ContactController,
    CommentController,
    CourseController,
    InvoiceController,
    SubscriptionController,
    LessonController,
    ExperienceController,
    Stream,
    ProfileController,
    TeacherController,
    PaymentController,
    ModalController,
    VoteController
};

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

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/', 'as' => 'public.', 'middleware' => ['auth']], function () {
    Route::get('/', [CourseController::class, 'index'])->name('home.page');
    Route::get('get-data-modal', [ModalController::class, 'getData'])->name('get-data-modal');

    Route::get('generate', [InvoiceController::class, 'generate'])->name('generate-pdf');

    Route::group(['prefix' => 'courses'], function ($route) {
        Route::get('{course}', [CourseController::class, "details"])->name("courses.details");
        Route::get('download/{lesson}' , [LessonController::class , 'download'])->name('download.lesson');
        Route::get('/{course?}/{lesson}', [LessonController::class, 'show'])->name('course.lessons.show');
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/subcription/{type}/{data:id}', [SubscriptionController::class, 'cancelOrResume'])->name('subscription.cancelOrResume');
    });

    Route::group(['prefix' => 'lessons'], function ($route) {
        Route::get('/', [LessonController::class, 'index'])->name('lessons.index');
        Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    });

    Route::get('support/contact', [ContactController::class, "supportIndex"])->name("supportContactForm");
    Route::post("contact", [ContactController::class, "supportContact"])->name("supportsupportContact");
    Route::post("contact/to/teacher/{user}", [ContactController::class, "studentToTeacher"])->name("studentToTeacher");
    Route::group(['middleware' => [
        'auth',
        'can:teacher.request'
    ]], function ($route) {
        Route::get('requestto/teacher/contact', [ContactController::class, "teacherIndex"])->name("teacherContactForm");
        Route::post("requestto/teacher", [ContactController::class, "teacherContact"])->name("teacherContact");
    });

    Route::group(['prefix' => 'page'], function ($route) {
        Route::get('/{page}',  [App\Http\Controllers\PageController::class, "detail"])->name("pages.detail");
    });

    Route::group(['prefix' => 'experience'], function ($route) {
        Route::get('/videos', [ExperienceController::class, 'index'])->name('experience.index');
    });

    Route::group(['prefix' => 'streaming', 'as' => 'streaming.'], function ($route) {
        Route::get('/{lesson?}', [Stream::class, 'show'])->name('stream.show');
    });

    Route::group(['prefix' => 'user/'], function ($route) {
        Route::get('my-experiences/{user}', [ProfileController::class, 'myExperiences'])->name('user.myExperiences')->middleware('equal.user');
        Route::get('my-courses/{user}', [ProfileController::class, 'myCoursesProfile'])->name('user.myCourses')->middleware('equal.user');
        Route::get('my-transactions/{user}', [ProfileController::class, 'myTransactions'])->name('user.myTransactions')->middleware('equal.user');
        Route::get('show-lesson-calendar', [LessonController::class, 'getAllLesson'])->name('lesson.getall');
        Route::get('lesson-purchased', [LessonController::class, 'lessonPurchased'])->name('lesson.lessonpurchased');
        Route::get('/{user}', [ProfileController::class, 'index'])->name('user.index');
        Route::resource('/lesson', LessonController::class)->names('lesson');
        Route::get('my-lessons', [LessonController::class, 'myLessons'])->name('lesson.my-lessons');
        Route::post('my-lessons/{id}', [LessonController::class, 'editmyLessons'])->name('my-lessons.edit');
        Route::post('store-new-lesson', [LessonController::class, 'storeNewLessonInstructorCalendar'])->name('lesson.storeinstructorlesson');
        Route::post('edit-my-lesson', [LessonController::class, 'editmyLessons'])->name('mylessons.edit');
        Route::post('delete-my-lesson', [LessonController::class, 'deleteMyLesson'])->name('mylessons.delete');
        Route::put('update-data-user/{user}', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('update-pw-user/{user}', [ProfileController::class, 'changePassword'])->name('profile.change.password');
        Route::get('download/{transaction}', [ProfileController::class, 'downloadInvoice'])->name('download-invoice');
    });
    Route::get('show-personal-lesson', [LessonController::class, 'getLessonByUser'])->name('lesson.lessonbyuser');
    Route::resource('/teacher', TeacherController::class)->names('teacher');

    Route::group(['prefix' => 'payment/', 'as' => 'payment.', 'middleware' => ['auth']], function ($route) {

        Route::get('/checkout/course/{course}', [PaymentController::class, 'paymentCourse'])->name('checkout.course');
        Route::get('/checkout/{collect:id}', [PaymentController::class, 'index'])->middleware('accessExperience')->name('checkout');
        Route::get('/checkout/lesson/{lesson}', [PaymentController::class, 'paymentLesson'])->name('checkout.lesson');

        Route::get('store-payment', [PaymentController::class, 'store'])->name('payment.store');
    });
});

Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => [
    'auth',
    'can:admin.home'
]], function ($route) {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class);
    Route::resource('/admins', AdminController::class);
    Route::resource('/teachers', AdminTeacherController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/requestToTeacher', RequestToTeacherController::class)->except(['update', 'show', 'create', 'destroy', 'edit']);
    Route::get('/request/to/teacher/{user}', [RequestToTeacherController::class, 'update'])->name('requestToTeacher.update');
    Route::resource('/courses', AdminCourseController::class);
    Route::resource('/lessons', AdminLessonController::class);
    Route::resource('/cities', CityController::class);
    Route::resource('/pages', AdminPageController::class);
    Route::resource('/experience', AdminExperienceController::class);
    Route::get('/create/{course}/lessons', [AdminLessonController::class, 'create'])->name('lesson.create.course');
    Route::get('/asignrole/{user}', [UserController::class, 'asignRole'])->name('asignrole');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/delete-event/{event}', [AdminCourseController::class, 'deleteEvent'])->name('delete.event');
    Route::post('/asignedrole/{user}', [UserController::class, 'asignedRole'])->name('asignedrole');
    Route::resource('/pages', App\Http\Controllers\Admin\PageController::class);


    Route::get('delete-product', [BaseController::class, 'destroy'])->name('delete.product');
    Route::resource('/roles', RoleController::class);
});

Route::group(['prefix' => 'ajax'], function ($route) {
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function ($route) {
        Route::post('/delete-file', [BaseController::class, 'destroyFile'])->name('delete.img.course');

        Route::get('/delete-resource', [BaseController::class, 'destroy'])->name('delete.resource');

        Route::get('/edit-resource', [BaseController::class, 'editable'])->name('edit.resource');
    });

    Route::group(['prefix' => 'public', 'as' => 'public.ajax.'], function ($route) {
        Route::post('/comments', [CommentController::class, "registerComment"])->name('comments');
        Route::post("/votar", [VoteController::class, "RatedIndex"])->name("RatedIndex");
        Route::get("/get-vote", [VoteController::class, "getVote"])->name("getVote");
    });
});

