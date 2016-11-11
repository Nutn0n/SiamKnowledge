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
        $this->validate($request, [
            'amount'=>'required|numeric',
            'time'=>'required',
            'bank'=>'required',
            ]);
    	$log = new creditlog;
    	$log->amount = $request->amount;
    	$log->user_id = Sentinel::getUser()->id;
    	$log->time = $request->time;
        $log->bank = $request->bank;
    	$log->save();
        $request->session()->flash('status', 'complete');
        return redirect()->back();
    }
    public function approvecredit(Request $request, $id){
        $log = creditlog::find($id);
        $log->confirmed = true;
        $log->save();
        $log->user->credit->credit += $log->amount;
        $log->user->credit->save();
        $request->session()->flash('status', 'เพิ่มเครดิตสำเร็จ');
        \App\log::create(['status' => 'เพิ่มเครดิตให้ user_id: ' . $log->user_id . ' สำเร็จ', 'user_id' => Sentinel::getUser()->id]);
        return back();
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
