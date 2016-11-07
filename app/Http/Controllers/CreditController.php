<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sentinel;
use App\creditlog;
use App\log;
use App\Credit;
use App\User;

class CreditController extends Controller
{
    //Control about adding credit etc.
    public function addcredit(Request $request){
    	$log = new creditlog;
    	$log->amount = $request->amount;
    	$log->user_id = Sentinel::getUser()->id;
    	$log->time = $request->time;
        $log->bank = $request->bank;
    	$log->save();
        $request->session()->flash('status', 'complete');
        return redirect()->back();
    }
    public function approvecredit($id){
        $log = creditlog::find($id);
        $log->confirmed = true;
        //$log->by = approve by who. Need Implement
        $log->save();
        $credit = Credit::where('user_id', $log->user_id)->first();
        $credit->credit += $log->credit;
        $credit->save();
        
    }
    public function studentcredit(){
        $user = User::find(Sentinel::getUser()->id);
        return view('student-addcredit')->with('User', $user);
    }
    public function earning(){
        $user = User::find(Sentinel::getUser()->id);
        return view('tutor-credit')->with('Data', $user);
    }
}
