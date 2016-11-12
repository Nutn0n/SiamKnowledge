<?php
namespace App;
use App\Profile;
class CronController{

	public function update(){
		$tutor = Profile::where([['status', 'Tutor'], ['teachhours', '<=', 10], ['tutorgrade', 'White']])->update(['tutorgrade'=>'Bronze']);
	}

}
?>