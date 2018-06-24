<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use GuzzleHttp\Client;

//use GuzzleHttp\Exception\RequestException;

// use GuzzleHttp\Psr7\Request;

// require ‘vendor/autoload.php’;


class RestaurantController extends Controller
{
   public function restaurantLocations(){

    $url = 'https://shiftstestapi.firebaseio.com/locations.json';
    $reports = json_decode($this->restAPIClient($url));
    print_r($reports);
    return view('locations')->with('reports', $reports);

   }

   public function restaurantEmployees($id,$dailyOvertimeMultiplier,$dailyOvertimeThreshold,$overtime,$weeklyOvertimeMultiplier,$weeklyOvertimeThreshold){
    $url = 'https://shiftstestapi.firebaseio.com/users.json';
    $reports = array();
    $reports =  (array) json_decode($this->restAPIClient($url));

    print_r($reports);

    return view('employees')->with('reports', $reports);
}

public function timePunches($location,$user,$firstName,$lastName){
    $url = 'https://shiftstestapi.firebaseio.com/timePunches.json';
    $reports = json_decode($this->restAPIClient($url));

    return view('timepunches');
}

public function calculateHours(){

}


   //CURL request
   //https://hackernoon.com/creating-rest-api-in-php-using-guzzle-d6a890499b02
   public function restAPIClient($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
    } 

    //request with Guzzle (not worked, problem when require dependency)
    // $client = new Client();
    // $res = $client->request('GET', 'https://shiftstestapi.firebaseio.com/locations.json', [
    
    //     ‘headers’ => [

    //         ‘Accept’ => ‘application/json’,
            
    //         ‘Content-type’ => ‘application/json’
            
    //         ]

    // ]);
    // echo $res->getStatusCode();
    // echo $res->getHeader('content-type');
    // echo $res->getBody();
}


/*
The next steps would be:
- Calculate how many hours each employee worked by location
- Calculate daily and weekly overtime hours
- Add Bootstrap and do Bonus1
- Bonus 2
*/
