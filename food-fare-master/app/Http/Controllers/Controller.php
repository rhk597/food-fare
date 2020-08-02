<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function successResponse($data){       
        return response()->json([
            "error" => false,
            "data" => $data
        ],200);
    }

    /**
     * @param string $errorMsg
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($errorMsg,$code = 406){        
        return response()->json([
            "error"     =>  true,
            "cause"     =>  $errorMsg
        ],$code);
    }

    /**
     * @param mixed $validator     
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationError($validator){        
        $errorMessage = "";
        foreach($validator->errors()->toArray() as $error){                   
            $errorMessage.= $error[0].",";
        }
        $errorMessage = preg_replace("/,$/", '', $errorMessage);                
        return $errorMessage;
    }
}
