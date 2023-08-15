<?php

namespace App\Traits;

trait HttpResponse{
    protected function success ($code = 200, $message=null, $data ){
        return response()->json([
           'status' => 'Request Successful',
           'message' => $message,
           'data' => $data
        ], $code);
    }

    protected function error($code, $message=null, $data){
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
