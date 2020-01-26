<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
//use Your Model

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    /**
     * @return string
     *  Return the model
     */

    protected $model;
    

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }


    abstract protected function getModelClass();


    protected function startConditions()
    {
    	return clone $this->model;
    }
}
