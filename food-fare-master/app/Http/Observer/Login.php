<?php

namespace App\Http\Observer;

use App\User;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Login implements SplSubject{
    private $status = array();
    private $storage;

    protected $response;

    function __construct()
    {
        $this->storage = new SplObjectStorage();
    }
    function init($email, $password){
        $value_srno = 0;
        $count = 0;
        $result=User::where('email',$email)->first();
      
        if(!empty($result) && isset($result->srno) ){
            $value_srno = $result->srno;
            $count = 1;
        }
        //if status cant find username
        if ($count == 0) {

            $this->setStatus(5, $email);
            $this->notify();
            if ($this->status[0] == 1) {
                return true;
            }
            return false;
        } else {

            //after finding username look for password.

            $count1 = 0; //for checking the username or password
            $result=User::where('srno',$value_srno)->where('password',$password)->first();
            if(!empty($result) && isset($result->srno) ){
                $count1 = 1;
            }
            //cant find correct password
            if ($count1 == 0) {
                $result=User::where('srno',$value_srno)->select('srno','security_status')->first();
               
                $status_val = -1;
                if(!empty($result) && isset($result->srno) ){
                    $count1 = 1;
                    $status_val =$result->security_status;
                }
              
                $this->setStatus($status_val, $email);
                $this->notify();
                if ($this->status[0] == 1) {
                    return true;
                }
                return false;
            } else {
                $result=User::where('srno',$value_srno)->select('srno','security_status')->first();
  
                $status_val = -1;
                if(!empty($result) && isset($result->srno) ){
                    $count1 = 1;
                    $status_val =$result->security_status;
                }
              
                if ($status_val == 6) {

                   
                    $this->setStatus(6, $email);
                    $this->notify();
                    if ($this->status[0] == 1) {
                        return true;
                    }
                    return false;
                } else {
                    $this->setStatus(1, $email);
                    $this->notify();
                    if ($this->status[0] == 1) {
                        return true;
                    }

                    return false;
                }
            }
        }
    }

    private function setStatus($status, $email)
    {
        $this->status = array($status, $email);
    }

    function getStatus()
    {
        return $this->status;
    }
    public function setResponse($status)
    {
        $this->response = $status;
    }

    function getResponse()
    {
        return $this->response;
    }

    function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }

    function notify()
    {

        foreach ($this->storage as $observer) {
            $observer->update($this);
        }
    }
}
