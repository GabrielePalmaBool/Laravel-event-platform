<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use App\Models\Event;

use App\Models\User;

class ApiController extends Controller
{
    public function LogUser(Request $request)
    
    {
            $http = new Client;

            $response = $http->post("");
    }

    public function getEvents(){

        $events = Event :: all();
        return response()->json([
            'status' => 'success',
            'events' => $events
        ]);
    }
}
