<?php

namespace App\Repositories;

use App\Models\Country;
//use Your Model

/**
 * Class CountryRepository.
 */
class CountryRepository extends CoreRepository
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
        return Country::class;
    }

    public function getCityHelp($name)
    {   
        return $this->startConditions()->select('loc_name_canonical')->where('loc_name_canonical', 'LIKE', "%{$name->city}%")->paginate(15);
    }
}
