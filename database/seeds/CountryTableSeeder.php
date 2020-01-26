<?php

use Illuminate\Database\Seeder;
use App\Services\RestClientService;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	try {
    	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/#api_dashboard
    		$client = new RestClientService(env('API_DATAFORSEO_URL'), null, env('API_DATAFORSEO_LOGIN'), env('API_DATAFORSEO_PASSWORD'));  
    		$loc_get_result = $client->get('v2/cmn_locations/' . env('API_DATAFORSEO_COUNTRY_ISI_CODE'));

    		$loc_array = [];

    		foreach ($loc_get_result['results'] as $result) {
    			if ($result['loc_type'] != 'Postal Code') {
    				$loc_array[] = [
	    				'loc_id'				=> $result['loc_id'],
	    				'loc_name'				=> $result['loc_name'],
	    				'loc_name_canonical'	=> $result['loc_name_canonical'],
    				];
    			}
       		}
        	\DB::table('countries')->insert($loc_array);
   
    	//do something with locations
    	} catch (RestClientExceptionService $e) {
    		echo "\n";
    		print "HTTP code: {$e->getHttpCode()}\n";
    		print "Error code: {$e->getCode()}\n";
    		print "Message: {$e->getMessage()}\n";
    		print  $e->getTraceAsString();
    		echo "\n";
    		exit();
    	}
    	$client = null;
    }
}
