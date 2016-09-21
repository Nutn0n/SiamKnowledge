<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sentinel;
use App\log;
use Credit;

class CreditController extends Controller
{
    //Control about adding credit etc.
    public function addcredit(Request $request){
    	$log = new log;
    	$log->type = 'credit';
    	$log->credit = $request->credit;
    	$log->user_id = Sentinel::getUser()->id;
    	$log->status = 'pending';
    	$log->save();
    }
    public function confirmcredit(){
    	$log = log::where([['user_id', Sentinel::getUser()->id], ['status', 'pending']])->first();
    	$log->status = 'confirm';
    	$log->save();
    }
    public function approvecredit($id){
        $log = log::findById($id);
        $log->status = 'approve';
        //$log->by = approve by who. Need Implement
        
    }
}
