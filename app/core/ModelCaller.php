<?php 

class ModelCaller{

public static function model($model){
	if(file_exists('app/models/' . $model . '.php')){
		require_once 'app/models/' . $model . '.php';
		return new $model();

	}
	else{
		return null;
	}
}
}

?>