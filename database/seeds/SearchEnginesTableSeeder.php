<?php

use Illuminate\Database\Seeder;
use App\Services\RestClientService;

class SearchEnginesTableSeeder extends Seeder
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
    		$se_get_result = $client->get('v2/cmn_se/' . env('API_DATAFORSEO_COUNTRY_ISI_CODE'));

    		$se_array = [];

    		foreach ($se_get_result['results'] as $result) {
    			$se_array[] = [
    				'se_id'					=> $result['se_id'],
    				'se_name'				=> $result['se_name'],
    				'se_country_name'		=> $result['se_country_name'],
    				'se_language'			=> $result['se_language'],
    			];
       		}
        	\DB::table('search_engines')->insert($se_array);
    	//do something with se
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
