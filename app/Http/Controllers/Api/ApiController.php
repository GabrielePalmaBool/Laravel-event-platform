<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

class ApiController extends Controller
{
    public function LogUser(Request $request)
    
    {
            $data = $request->all();

            //$user_email = $data['email'];
            $user_email = 1;


            $user = User :: find($user_email);

            return response()->json([
                'status' => 'success',
                'events' => $user
            ]);

    }

    public function getEvents(){

        $events = Event :: all();
        return response()->json([
            'status' => 'success',
            'events' => $events
        ]);
    }
}
