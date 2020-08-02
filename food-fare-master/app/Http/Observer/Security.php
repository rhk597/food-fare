<?php

namespace App\Http\Observer;

use App\Http\Observer\Login;
use App\Management;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Security implements SplObserver
{



    function update(SplSubject $SplSubject)
    {


        $status = $SplSubject->getStatus();


        switch ($status[0]) {

            case 1:
               
                User::where('email',$status[1])->update([
                    'security_status'=> 2
                ]);
                $SplSubject->setResponse(1);
                break;

            case 2:
                $SplSubject->setResponse('Incorrect password');

                User::where('email',$status[1])->update([
                    'security_status'=> 3
                ]);
                break;


            case 3:

                $SplSubject->setResponse('Second Wrong Attempt.');
                
                User::where('email',$status[1])->update([
                    'security_status'=> 4
                ]);
                break;

            case 4:
                $SplSubject->setResponse('Third Wrong Attempt and your account is blocked');
               User::where('email',$status[1])->update([
                    'security_status'=> 6
                ]);
                break;


            case 5:
                $SplSubject->setResponse('Incorrect username');
                break;

            case 6:
                $SplSubject->setResponse('Account Blocked');
                break;
        }
    }
}
