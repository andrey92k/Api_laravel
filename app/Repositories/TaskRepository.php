<?php

namespace App\Repositories;

use App\Models\Task;
//use Your Model

/**
 * Class TaskRepository.
 */
class TaskRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Task::class;
    }

    public function CreateTasksResults($results)
    {

        foreach ($results['organic'] as $result) {
        
            $this->startConditions()->create([
                'task_id'=> $result['task_id'],
                'post_site'=> $result['post_site'],
                'result_datetime'=> $result['result_datetime'],
                'result_position'=> $result['result_position'],
                'result_url'=> $result['result_url'],
                'result_title'=> $result['result_title'],
                'result_snippet_extra'=> $result['result_snippet_extra'],
                'result_snippet'=> $result['result_snippet'],
                'results_count'=> $result['results_count'],
                'result_extra'=> $result['result_extra'],
                'result_spell'=> $result['result_spell'],
                'result_spell_type'=> $result['result_spell_type'],
                'result_se_check_url'=> $result['result_se_check_url'],

            ]);
        }
    }

    public function getAllWithTasks() 
    {

        return $this->startConditions()->all();
    }

    public function getResultTask($id) 
    {
        return $this->startConditions()::find($id)->where('id', $id)->first();
    }

    public function deleteTaskResult($id)
    {
        return $this->startConditions()->findOrFail($id)->delete();
    }

    

}
