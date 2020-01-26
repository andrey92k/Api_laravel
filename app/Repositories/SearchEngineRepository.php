<?php

namespace App\Repositories;

use App\Models\SearchEngine;

//use Your Model

/**
 * Class SearchEngineRepository.
 */
class SearchEngineRepository extends CoreRepository
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
        return SearchEngine::class;
    }

    public function getLanguesSearchEngines()
    {

    	return $this->startConditions()->select('se_language')->distinct()->get();
    }

    public function getNameBaseSearchEngines()
    {

    	return $this->startConditions()->where('se_language', 'English')->get();
    }

    public function getNameAjaxSearchEngines($name)
    {
    	return $this->startConditions()->where('se_language', $name->lang)->get();
    }

}
