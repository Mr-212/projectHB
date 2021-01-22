<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\OutstandingItems;
use App\Contracts\Services\ZohoService;
use App\Http\Livewire\Client\ClientItemChecklist;
use App\Http\Livewire\HouseSold;
use App\Http\Livewire\HouseCancelled;
use App\Http\Livewire\HouseDropout;
use App\Http\Controllers\DashBoardController;
use App\Http\Livewire\Portfolio;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\Client\ClientLogComponent;
use App\Http\Controllers\Client\ClientController;
use App\Http\Livewire\Client\AddClientComponent;
use App\Http\Livewire\Property\HouseVacantComponent;
use App\Http\Livewire\Component\ClientPropertyChecklistLogComponent;


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
    if(!\Illuminate\Support\Facades\Auth::user())
        return view('auth.login');
    else
        return redirect('/items/outstanding/before_dd');
});
//Route::post('login', [AuthController::class,'login']);
Route::middleware(['web','auth:sanctum', 'verified','before_request'])->group(function (){

    Route::prefix('system_calls')->middleware(['role:Super Admin'])->group(function(){
//    Route::prefix('system_calls')->group(function(){
//        Route::get('/', [DashBoardController::class,'index'])->name('dashboard');
        Route::get('/do-clear',function (){
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('optimize:clear');
            Artisan::call('optimize');
            Artisan::call('permission:cache-reset');

            dd('clear done');
        });

        Route::get('/do-migration',function (){

            Artisan::call('migrate');
            dd('migration done');
        });

        Route::get('/do-db-seeder',function (){
           //  Artisan::call('db:seed', ['--class' => 'Database\Seeders\UserSeeder']);
             Artisan::call('db:seed', ['--class' => 'Database\Seeders\RolePermissionSeeder']);
             dd('seeder done');
        });
    });

    Route::get('/dashboard', [DashBoardController::class,'index'])->name('dashboard');
    Route::prefix('user')->middleware(['role:Super Admin'])->group(function(){


//        Route::get('/',function (){
//            return view('user.show');
//        });


//        Route::get('/add',function (){
//            return view('user.add');
//        });
    });

    Route::prefix('items')->group(function(){
//        Route::get('/outstanding_before_dd',[ ItemController::class, 'outstanding_before_dd']);
//        Route::get('/outstanding/{type}', OutstandingItemsBeforeDueDiligence::class);
        Route::get('/outstanding/{type}', OutstandingItems::class);
        Route::get('/checklist/property/{property_id}', ClientItemChecklist::class);
//        Route::get('/checklist/client/{client_id}', ClientItemChecklist::class);
        Route::get('/checklist/{client_id}/{property_id?}', ClientItemChecklist::class);
        Route::get('/checklist', ClientItemChecklist::class);
        Route::get('/log/{property_id}', ClientPropertyChecklistLogComponent::class);
        Route::get('/add/client', AddClientComponent::class);
        Route::get('/client/add', ClientItemChecklist::class);

//        Route::prefix('/house')->group(function(){
////        Route::get('/outstanding_before_dd',[ ItemController::class, 'outstanding_before_dd']);
//            Route::get('/sold', HouseSold::class);
//            Route::get('/cancelled', HouseCancelled::class);
//            Route::get('/dropouts', HouseDropout::class);
////        Route::get('/outstanding/{dd}',OutstandingItemsBeforeDd::class);
//        });
//        Route::get('/outstanding/{dd}',OutstandingItemsBeforeDd::class);
    });

//    Route::get('/portfolio',PortfolioTable::class);
    Route::prefix('portfolio')->group(function(){
        Route::get('/', [ClientController::class,'portfolio']);
        Route::get('/{property_id}', ClientItemChecklist::class);
    });
    Route::prefix('/house')->group(function(){
//        Route::get('/outstanding_before_dd',[ ItemController::class, 'outstanding_before_dd']);
//        Route::get('/sold', HouseSold::class);
        Route::get('/sold', [ClientController::class,'get_sold_house']);
        Route::get('/sold/{property_id}', ClientItemChecklist::class);

        Route::get('/cancelled',  [ClientController::class,'get_cancelled_house']);
        Route::get('/cancelled/property/{property_id}', ClientItemChecklist::class);
        Route::get('/cancelled/client/{client_id}', ClientItemChecklist::class);
        Route::get('/cancelled/client/{client_id}/{new_property}', ClientItemChecklist::class);

        Route::get('/dropout', [ClientController::class,'get_dropout_client']);
        Route::get('/dropout/{client_id}/{property_id?}', ClientItemChecklist::class);

        Route::get('/evicted', [ClientController::class,'get_evicted_house']);
        Route::get('/evicted/{property_id}', ClientItemChecklist::class);
//        Route::get('/vacant', [ClientController::class,'get_vacant_house']);
//        Route::get('/vacant', HouseVacantComponent::class);
        Route::get('/vacant', HouseVacantComponent::class);
        Route::get('/vacant/{property_id}', ClientItemChecklist::class);

        Route::get('/move_out', [ClientController::class,'get_move_out_house']);
        Route::get('/move_out/{property_id}', ClientItemChecklist::class);

//        Route::get('/outstanding/{dd}',OutstandingItemsBeforeDd::class);
    });


});

Route::get('test',function (){
    $service = new ZohoService();
    dd($service->getDealByStage());
    //dd($service->getDeals());

});


