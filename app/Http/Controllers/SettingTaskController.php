<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Repositories\CountryRepository;
use App\Repositories\SearchEngineRepository;
use App\Services\SettingTaskService;
use Illuminate\Http\Request;

class SettingTaskController extends Controller
{

    private $settingTaskService;
    /**
     * @var taskRepository
     */
    private $taskRepository;

    /**
     * taskRepository constructor.
     * @param taskRepository $taskRepository
     */
    /**
     * @var searchEngineRepository
     */
    private $searchEngineRepository;

    /**
     * searchEngineRepository constructor.
     * @param searchEngineRepository $searchEngineRepository
     */
        /**
     * @var countryRepository
     */
    private $countryRepository;

    /**
     * countryRepository constructor.
     * @param countryRepository $countryRepository
     */
    public function __construct(TaskRepository $taskRepository, SearchEngineRepository $searchEngineRepository, CountryRepository $countryRepository, SettingTaskService $settingTaskService)
    {
        $this->taskRepository = $taskRepository;
        $this->searchEngineRepository = $searchEngineRepository;
        $this->countryRepository = $countryRepository;
        $this->settingTaskService = $settingTaskService;
    }


    public function index()
    {
        $allLangues = $this->searchEngineRepository->getLanguesSearchEngines();
        $nameLangues = $this->searchEngineRepository->getNameBaseSearchEngines();
       return view('setting', compact('allLangues','nameLangues'));
    }

    public function GetAjaxLang(Request $request)
    {
       $nameLangues = $this->searchEngineRepository->getNameAjaxSearchEngines($request);
       echo json_encode($nameLangues);
    }

    public function AjaxHelpCity(Request $request)
    {
       $city_help = $this->countryRepository->getCityHelp($request);
       echo json_encode($city_help);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function run(Request $request)
    {
        //dd($request);
        $settig_task_results = $this->settingTaskService->SettingRankTask($request);
        echo json_encode($settig_task_results);
        //$get_task_result = $this->settingTaskService->GetgRankTask($settig_task_results);
       
    }

    public function AjaxUpdateTasks()
    {
        $get_task_result = $this->settingTaskService->GetgRankTask();

        if ($get_task_result['results_count'] > 0) {
            $this->taskRepository->CreateTasksResults($get_task_result['results']);
        }

        echo json_encode($get_task_result['results_count']);
    }
}
