<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EnergyEfficiencyController;
use App\Http\Controllers\EnergyEfficiencyProductController;
use App\Http\Controllers\EnergyEfficiencyTypeController;
use App\Http\Controllers\FrameTypeController;
use App\Http\Controllers\FrontEvaluationController;
use App\Http\Controllers\HeatDemandController;
use App\Http\Controllers\ImprovementEvaluationController;
use App\Http\Controllers\ImprovementPackageController;
use App\Http\Controllers\InherentTechnicalRiskController;
use App\Http\Controllers\IntendedOutcomeController;
use App\Http\Controllers\InteractionMatrixEntityController;
use App\Http\Controllers\MeasureTypeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RetrofitAssessmentAuditController;
use App\Http\Controllers\RetrofitRoleController;
use App\Http\Controllers\InteractionMatrixController;
use App\Http\Controllers\LocationFactorController;
use App\Http\Controllers\RoofTypeController;
use App\Http\Controllers\Users;
use App\Http\Controllers\VentilationController;
use App\Http\Controllers\WallTypeController;
use App\Http\Controllers\WindowFactorController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('signout', [AuthController::class, 'signout']);

Route::post('auth', [AuthController::class, 'authenticate']);

Route::get('/', [Dashboard::class, 'index'])->middleware('auth');
Route::get('users', [Users::class, 'index'])->middleware('auth');
Route::get('users/create', [Users::class, 'create'])->middleware('auth');
Route::get('users/edit/{id}', [Users::class, 'edit'])->middleware('auth');
Route::get('users/show/{id}', [Users::class, 'show'])->middleware('auth');

Route::post('users/store', [Users::class, 'store'])->middleware('auth');
Route::post('users/delete', [Users::class, 'delete'])->middleware('auth');
Route::post('users/update/{id}', [Users::class, 'update'])->middleware('auth');

// MesureType
Route::get('measuretypes', [MeasureTypeController::class, 'index'])->middleware('auth');
Route::get('measuretypes/create', [MeasureTypeController::class, 'create'])->middleware('auth');
Route::get('measuretypes/edit/{id}', [MeasureTypeController::class, 'edit'])->middleware('auth');

Route::post('measuretypes/delete', [MeasureTypeController::class, 'delete'])->middleware('auth');
Route::post('measuretypes/store', [MeasureTypeController::class, 'store'])->middleware('auth');
Route::post('measuretypes/update/{id}', [MeasureTypeController::class, 'update'])->middleware('auth');

// Evaluations
Route::get('evaluations', [ImprovementEvaluationController::class, 'index'])->middleware('auth');
Route::get('evaluations/{id}/create', [ImprovementEvaluationController::class, 'create'])->middleware('auth');
Route::get('evaluations/edit/{id}', [ImprovementEvaluationController::class, 'edit'])->middleware('auth');

Route::post('evaluations/delete', [ImprovementEvaluationController::class, 'delete'])->middleware('auth');
Route::post('evaluations/store', [ImprovementEvaluationController::class, 'store'])->middleware('auth');
Route::post('evaluations/update/{id}', [ImprovementEvaluationController::class, 'update'])->middleware('auth');

Route::get('packages/{id}', [ImprovementPackageController::class, 'index'])->middleware('auth');
Route::get('packages/create/{id}', [ImprovementPackageController::class, 'create_package'])->middleware('auth');
Route::get('packages/edit_package/{id}', [ImprovementPackageController::class, 'edit_package'])->middleware('auth');
Route::get('packages/createrow/{id}', [ImprovementPackageController::class, 'create_row'])->middleware('auth');
Route::get('packages/deleterow/{id}', [ImprovementPackageController::class, 'delete_row'])->middleware('auth');


Route::post('packages/delete', [ImprovementPackageController::class, 'delete'])->middleware('auth');
Route::post('packages/store/{id}', [ImprovementPackageController::class, 'store_package'])->middleware('auth');
Route::post('packages/storerow/{id}', [ImprovementPackageController::class, 'store_row'])->middleware('auth');
Route::post('packages/updaterow/{id}', [ImprovementPackageController::class, 'update_row'])->middleware('auth');
Route::post('packages/update_package/{id}', [ImprovementPackageController::class, 'update_package'])->middleware('auth');

Route::get('retrofitroles', [RetrofitRoleController::class, 'index'])->middleware('auth');
Route::get('retrofitroles/create', [RetrofitRoleController::class, 'create'])->middleware('auth');
Route::get('retrofitroles/edit/{id}', [RetrofitRoleController::class, 'edit'])->middleware('auth');
Route::get('retrofitroles/show/{id}', [RetrofitRoleController::class, 'show'])->middleware('auth');

Route::post('retrofitroles/store', [RetrofitRoleController::class, 'store'])->middleware('auth');
Route::post('retrofitroles/delete', [RetrofitRoleController::class, 'delete'])->middleware('auth');
Route::post('retrofitroles/update/{id}', [RetrofitRoleController::class, 'update'])->middleware('auth');

Route::get('resources/{id}', [ResourceController::class, 'index'])->middleware('auth');
Route::get('resources/create/{id}', [ResourceController::class, 'create'])->middleware('auth');
Route::post('resources/store/{id}', [ResourceController::class, 'store'])->middleware('auth');

Route::get('resources/edit/{id}', [ResourceController::class, 'edit'])->middleware('auth');
Route::post('resources/update/{id}', [ResourceController::class, 'update'])->middleware('auth');

Route::post('resources/delete', [ResourceController::class, 'delete'])->middleware('auth');

// Evaluations
Route::get('clients', [ClientController::class, 'index'])->middleware('auth');
Route::get('clients/create', [ClientController::class, 'create'])->middleware('auth');
Route::get('clients/edit/{id}', [ClientController::class, 'edit'])->middleware('auth');

Route::post('clients/delete', [ClientController::class, 'delete'])->middleware('auth');
Route::post('clients/store', [ClientController::class, 'store'])->middleware('auth');
Route::post('clients/update/{id}', [ClientController::class, 'update'])->middleware('auth');

Route::get('elevations', [FrontEvaluationController::class, 'index'])->middleware('auth');
Route::get('elevations/create', [FrontEvaluationController::class, 'create'])->middleware('auth');
Route::get('elevations/show/{id}', [FrontEvaluationController::class, 'show'])->middleware('auth');
Route::get('elevations/edit/{id}', [FrontEvaluationController::class, 'edit'])->middleware('auth');

Route::post('elevations/delete', [FrontEvaluationController::class, 'delete'])->middleware('auth');
Route::post('elevations/resources', [FrontEvaluationController::class, 'return_resources'])->middleware('auth');
Route::post('elevations/store', [FrontEvaluationController::class, 'store'])->middleware('auth');
Route::post('elevations/update/{id}', [FrontEvaluationController::class, 'update'])->middleware('auth');


// RAA
Route::get('properties', [PropertyController::class, 'index'])->middleware('auth');
Route::get('properties/create', [PropertyController::class, 'create'])->middleware('auth');
Route::get('properties/edit/{id}', [PropertyController::class, 'edit'])->middleware('auth');
Route::post('properties/store', [PropertyController::class, 'store'])->middleware('auth');
Route::post('properties/delete', [PropertyController::class, 'delete'])->middleware('auth');
Route::post('properties/update/{id}', [PropertyController::class, 'update'])->middleware('auth');

Route::get('properties/types/{id}', [PropertyController::class, 'property_types'])->middleware('auth');
Route::get('properties/types/{id}/create', [PropertyController::class, 'create_type'])->middleware('auth');
Route::get('properties/types/edit/{id}', [PropertyController::class, 'edit_type'])->middleware('auth');

Route::post('properties/types/delete', [PropertyController::class, 'delete_type'])->middleware('auth');
Route::post('properties/types/{id}/store', [PropertyController::class, 'store_type'])->middleware('auth');
Route::post('properties/types/update/{id}', [PropertyController::class, 'update_type'])->middleware('auth');

//RAA
Route::get('elevations/{id}/assessmentaudit', [RetrofitAssessmentAuditController::class, 'index'])->middleware('auth');
Route::get('elevations/{id}/assessmentaudit/create', [RetrofitAssessmentAuditController::class, 'create'])->middleware('auth');

Route::get('elevations/{id}/assessmentaudit/edit', [RetrofitAssessmentAuditController::class, 'edit'])->middleware('auth');

Route::post('elevations/assessmentaudit/property_types', [RetrofitAssessmentAuditController::class, 'property_types'])->middleware('auth');
Route::post('elevations/{id}/assessmentaudit/store', [RetrofitAssessmentAuditController::class, 'store'])->middleware('auth');
Route::post('elevations/{id}/assessmentaudit/update', [RetrofitAssessmentAuditController::class, 'update'])->middleware('auth');
//path
Route::get('elevations/{id}/path/create', [RetrofitAssessmentAuditController::class, 'create_path'])->middleware('auth');
Route::get('elevations/{id}/path/edit/{pid}', [RetrofitAssessmentAuditController::class, 'edit_path'])->middleware('auth');

Route::post('elevations/{id}/path/store', [RetrofitAssessmentAuditController::class, 'store_path'])->middleware('auth');
Route::post('elevations/path/delete', [RetrofitAssessmentAuditController::class, 'delete_path'])->middleware('auth');
Route::post('elevations/{id}/path/update/{pid}', [RetrofitAssessmentAuditController::class, 'update_path'])->middleware('auth');

//non energy issue
Route::get('audits', [RetrofitAssessmentAuditController::class, 'client_list']);
Route::get('elevations/{id}/energy/create', [RetrofitAssessmentAuditController::class, 'create_energy'])->middleware('auth');
Route::get('elevations/{id}/energy/edit/{pid}', [RetrofitAssessmentAuditController::class, 'edit_energy'])->middleware('auth');

Route::post('elevations/{id}/energy/store', [RetrofitAssessmentAuditController::class, 'store_energy'])->middleware('auth');
Route::post('elevations/energy/delete', [RetrofitAssessmentAuditController::class, 'delete_energy'])->middleware('auth');
Route::post('elevations/{id}/energy/update/{pid}', [RetrofitAssessmentAuditController::class, 'update_energy'])->middleware('auth');

//Energy Efficiency Measure
//Products
Route::get('eeproducts', [EnergyEfficiencyProductController::class, 'index']);
Route::post('eeproducts/delete', [EnergyEfficiencyProductController::class, 'delete']);
Route::get('eeproducts/create', [EnergyEfficiencyProductController::class, 'create']);
Route::get('eeproducts/edit/{id}', [EnergyEfficiencyProductController::class, 'edit']);

Route::post('eeproducts/store', [EnergyEfficiencyProductController::class, 'store']);
Route::post('eeproducts/update/{id}', [EnergyEfficiencyProductController::class, 'update']);
//Types
Route::get('eetypes', [EnergyEfficiencyTypeController::class, 'index']);
Route::post('eetypes/delete', [EnergyEfficiencyTypeController::class, 'delete']);
Route::get('eetypes/create', [EnergyEfficiencyTypeController::class, 'create']);
Route::get('eetypes/edit/{id}', [EnergyEfficiencyTypeController::class, 'edit']);

Route::post('eetypes/store', [EnergyEfficiencyTypeController::class, 'store']);
Route::post('eetypes/update/{id}', [EnergyEfficiencyTypeController::class, 'update']);

//Measure
Route::get('energyefficiency', [EnergyEfficiencyController::class, 'client_list']);
Route::post('energyefficiency/delete', [EnergyEfficiencyController::class, 'delete']);
Route::get('energyefficiency/view/{id}', [EnergyEfficiencyController::class, 'index']);
Route::get('energyefficiency/view/{id}/create', [EnergyEfficiencyController::class, 'create']);
Route::get('energyefficiency/view/edit/{id}', [EnergyEfficiencyController::class, 'edit']);

Route::post('energyefficiency/view/{id}/store', [EnergyEfficiencyController::class, 'store']);
Route::post('energyefficiency/view/update/{id}', [EnergyEfficiencyController::class, 'update']);

//Matrix
// Matrix Entities
Route::get('matrixentities', [InteractionMatrixEntityController::class, 'index'])->middleware('auth');
Route::get('matrixentities/create', [InteractionMatrixEntityController::class, 'create'])->middleware('auth');
Route::get('matrixentities/edit/{id}', [InteractionMatrixEntityController::class, 'edit'])->middleware('auth');

Route::post('matrixentities/delete', [InteractionMatrixEntityController::class, 'delete'])->middleware('auth');
Route::post('matrixentities/store', [InteractionMatrixEntityController::class, 'store'])->middleware('auth');
Route::post('matrixentities/update/{id}', [InteractionMatrixEntityController::class, 'update'])->middleware('auth');

Route::get('matrixentitytype/{id}', [InteractionMatrixEntityController::class, 'entity_types'])->middleware('auth');
Route::get('matrixentitytype/create/{id}', [InteractionMatrixEntityController::class, 'create_type'])->middleware('auth');
Route::get('matrixentitytype/edit/{id}', [InteractionMatrixEntityController::class, 'edit_type'])->middleware('auth');

Route::post('matrixentitytype/delete', [InteractionMatrixEntityController::class, 'delete_type'])->middleware('auth');
Route::post('matrixentitytype/store', [InteractionMatrixEntityController::class, 'store_type'])->middleware('auth');
Route::post('matrixentitytype/update/{id}', [InteractionMatrixEntityController::class, 'update_type'])->middleware('auth');

//Interaction matrix
Route::get('interactionmatrix', [InteractionMatrixController::class, 'client_list'])->middleware('auth');
Route::get('interactionmatrix/{id}/matrix', [InteractionMatrixController::class, 'index'])->middleware('auth');

Route::post('interactionmatrix/columncolor', [InteractionMatrixController::class, 'column_color'])->middleware('auth');
Route::post('interactionmatrix/rowactive', [InteractionMatrixController::class, 'row_active'])->middleware('auth');
Route::post('interactionmatrix/riskpath', [InteractionMatrixController::class, 'risk_path'])->middleware('auth');
Route::post('interactionmatrix/total', [InteractionMatrixController::class, 'matrix_total'])->middleware('auth');

//InherentTechnicalRisk

Route::get('inherenttechnicalrisk', [InherentTechnicalRiskController::class, 'client_list'])->middleware('auth');
Route::get('inherenttechnicalrisk/{id}/view', [InherentTechnicalRiskController::class, 'index'])->middleware('auth');

Route::post('inherenttechnicalrisk/measureupdate', [InherentTechnicalRiskController::class, 'measureupdate'])->middleware('auth');
Route::post('inherenttechnicalrisk/dataupdate/{id}', [InherentTechnicalRiskController::class, 'dataupdate'])->middleware('auth');

//ventilation
Route::get('ventilations', [VentilationController::class, 'client_list'])->middleware('auth');
Route::get('ventilations/{id}/ventilation', [VentilationController::class, 'index'])->middleware('auth');
Route::get('ventilations/{id}/strategy', [VentilationController::class, 'strategy'])->middleware('auth');

Route::post('ventilations/ventilationstrategyupdate/{id}', [VentilationController::class, 'ventilation_strategy_update'])->middleware('auth');
Route::post('ventilations/extractionrateupdate/{id}', [VentilationController::class, 'extraction_rate_update'])->middleware('auth');
Route::post('ventilations/doorundercutupdate/{id}', [VentilationController::class, 'door_undercut_update'])->middleware('auth');
Route::post('ventilations/backgroundtrickleupdate/{id}', [VentilationController::class, 'background_trickle_update'])->middleware('auth');
Route::post('ventilations/purgeventilationaddrow/{id}', [VentilationController::class, 'purge_ventilation_add_row'])->middleware('auth');

Route::post('ventilations/purgeventilationupdate/{id}', [VentilationController::class, 'purge_ventilation_update'])->middleware('auth');
Route::post('ventilations/purgeventilationupdaterow/{id}', [VentilationController::class, 'purge_ventilation_update_row'])->middleware('auth');
Route::post('ventilations/internalventilationstrategyupdate/{id}', [VentilationController::class, 'internal_ventilation_strategy_update'])->middleware('auth');


//WHHD

// window factor
Route::get('windowfactor', [WindowFactorController::class, 'index'])->middleware('auth');
Route::get('windowfactor/create', [WindowFactorController::class, 'create'])->middleware('auth');
Route::get('windowfactor/edit/{id}', [WindowFactorController::class, 'edit'])->middleware('auth');

Route::post('windowfactor/delete', [WindowFactorController::class, 'delete'])->middleware('auth');
Route::post('windowfactor/store', [WindowFactorController::class, 'store'])->middleware('auth');
Route::post('windowfactor/update/{id}', [WindowFactorController::class, 'update'])->middleware('auth');

// Wall factor
Route::get('walluvalue', [WallTypeController::class, 'index'])->middleware('auth');
Route::get('walluvalue/create', [WallTypeController::class, 'create'])->middleware('auth');
Route::get('walluvalue/edit/{id}', [WallTypeController::class, 'edit'])->middleware('auth');

Route::post('walluvalue/delete', [WallTypeController::class, 'delete'])->middleware('auth');
Route::post('walluvalue/store', [WallTypeController::class, 'store'])->middleware('auth');
Route::post('walluvalue/update/{id}', [WallTypeController::class, 'update'])->middleware('auth');

// Wall factor
Route::get('frameuvalue', [FrameTypeController::class, 'index'])->middleware('auth');
Route::get('frameuvalue/create', [FrameTypeController::class, 'create'])->middleware('auth');
Route::get('frameuvalue/edit/{id}', [FrameTypeController::class, 'edit'])->middleware('auth');

Route::post('frameuvalue/delete', [FrameTypeController::class, 'delete'])->middleware('auth');
Route::post('frameuvalue/store', [FrameTypeController::class, 'store'])->middleware('auth');
Route::post('frameuvalue/update/{id}', [FrameTypeController::class, 'update'])->middleware('auth');

// Roof factor
Route::get('roofuvalue', [RoofTypeController::class, 'index'])->middleware('auth');
Route::get('roofuvalue/create', [RoofTypeController::class, 'create'])->middleware('auth');
Route::get('roofuvalue/edit/{id}', [RoofTypeController::class, 'edit'])->middleware('auth');

Route::post('roofuvalue/delete', [RoofTypeController::class, 'delete'])->middleware('auth');
Route::post('roofuvalue/store', [RoofTypeController::class, 'store'])->middleware('auth');
Route::post('roofuvalue/update/{id}', [RoofTypeController::class, 'update'])->middleware('auth');

// Roof factor
Route::get('locationfactor', [LocationFactorController::class, 'index'])->middleware('auth');
Route::get('locationfactor/create', [LocationFactorController::class, 'create'])->middleware('auth');
Route::get('locationfactor/edit/{id}', [LocationFactorController::class, 'edit'])->middleware('auth');

Route::post('locationfactor/delete', [LocationFactorController::class, 'delete'])->middleware('auth');
Route::post('locationfactor/store', [LocationFactorController::class, 'store'])->middleware('auth');
Route::post('locationfactor/update/{id}', [LocationFactorController::class, 'update'])->middleware('auth');


//WHHD
Route::get('whhd', [HeatDemandController::class, 'client_list'])->middleware('auth');
Route::get('whhd/{id}/whhd', [HeatDemandController::class, 'index'])->middleware('auth');
Route::post('whhd/updatewhhd/{id}', [HeatDemandController::class, 'update_whhd'])->middleware('auth');
Route::post('whhd/updateexternalwall/{id}', [HeatDemandController::class, 'update_external_wall'])->middleware('auth');
Route::post('whhd/updatefloorroofheatloss/{id}', [HeatDemandController::class, 'update_floor_roof_heat_loss'])->middleware('auth');

// Intended Outcomes
Route::get('intendedoutcomes', [IntendedOutcomeController::class, 'client_list'])->middleware('auth');
Route::get('intendedoutcomes/{id}/intendedoutcomes', [IntendedOutcomeController::class, 'index'])->middleware('auth');
Route::post('intendedoutcomes/update/{id}', [IntendedOutcomeController::class, 'update'])->middleware('auth');
