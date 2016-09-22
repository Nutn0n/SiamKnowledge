<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sentinel;
use App\log;
use App\Credit;
use App\User;

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
        $log = log::find($id);
        $log->status = 'approve';
        //$log->by = approve by who. Need Implement
        $log->save();
        $credit = Credit::where('user_id', $log->user_id)->first();
        $credit->credit = $log->credit;
        $credit->save();
        
    }
}
