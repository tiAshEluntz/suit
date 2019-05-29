<?php 

class Controller extends ModelCaller
{
	public function view($view,$data=[]){
		if(file_exists('app/views/' . $view .'.php')){
			require 'app/views/' . $view .'.php';
		}

		else
			echo 'Can"t load view ' . $view . ': file not found!';

	}
}
?>