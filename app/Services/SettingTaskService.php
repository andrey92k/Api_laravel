<?php 

use App\Repositories\TaskRepository;
use App\Services\RestClientService;


namespace App\Services;

class SettingTaskService
{

    public function SettingRankTask($request)
    {
    	$api_url = env('API_DATAFORSEO_URL');
    	try {
    		$client = new RestClientService($api_url, null, env('API_DATAFORSEO_LOGIN'), env('API_DATAFORSEO_PASSWORD')); 
    	} catch (RestClientExceptionService $e) {
    		echo "\n";
    		print "HTTP code: {$e->getHttpCode()}\n";
    		print "Error code: {$e->getCode()}\n";
    		print "Message: {$e->getMessage()}\n";
    		print  $e->getTraceAsString();
    		echo "\n";
    		exit();
    	}
    	$post_array = array();
		$my_unq_id = mt_rand(0, 30000000); 
		$post_array[$my_unq_id] = array(
			"priority" => 1,
			"site" => $request->site,
			"se_name" => $request->lang_name,
			"se_language" => $request->lang,
			"loc_name_canonical" => $request->city,
			"key" => mb_convert_encoding($request->key, "UTF-8")
		);
	
		$my_unq_id = mt_rand(0, 30000000); 
		if (count($post_array) > 0) {
			try {
		     
				$task_post_result = $client->post('/v2/rnk_tasks_post', array('data' => $post_array));
				$post_array = array();
				
				// print_r($task_post_result);

			} catch (RestClientException $e) {
				echo "\n";
				print "HTTP code: {$e->getHttpCode()}\n";
				print "Error code: {$e->getCode()}\n";
				print "Message: {$e->getMessage()}\n";
				print  $e->getTraceAsString();
				echo "\n";
			}
		}
		$client = null;
		return $task_post_result;
    }

    public function GetgRankTask(){
    	$api_url = mb_substr(env('API_DATAFORSEO_URL'), 0, -1);
    	try {
    		$client = new RestClientService($api_url, null, env('API_DATAFORSEO_LOGIN'), env('API_DATAFORSEO_PASSWORD')); 
    	} catch (RestClientException $e) {
    		echo "\n";
    		print "HTTP code: {$e->getHttpCode()}\n";
    		print "Error code: {$e->getCode()}\n";
    		print "Message: {$e->getMessage()}\n";
    		print  $e->getTraceAsString();
    		echo "\n";
    	}

    
    		try {
    			$task_get_result = $client->get('v2/rnk_tasks_get');

    		} catch (RestClientException $e) {
    			echo "\n";
    			print "HTTP code: {$e->getHttpCode()}\n";
    			print "Error code: {$e->getCode()}\n";
    			print "Message: {$e->getMessage()}\n";
    			print  $e->getTraceAsString();
    			echo "\n";
    		}
    		

    	
		$client = null;
		return $task_get_result;
	}
}
