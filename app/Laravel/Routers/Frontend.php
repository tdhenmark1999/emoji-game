<?php

$this->group([

	/**
	*
	* Backend routes main config
	*/
	'namespace' => "Frontend", 
	'as' => "frontend.", 
	// 'prefix'	=> "admin",
	// 'middleware' => "", 

	], function(){

		
		$this->get('/', ['as' => "main",'uses' => "MainController@index"]);
		
		$this->get('question/{id?}',['as' => "question", 'uses' => "QuestionController@question"]);
		$this->post('question/{id?}',['uses' => "QuestionController@update"]);
		$this->get('result',['as' => "result", 'uses' => "QuestionController@result"]);

		

		
	
});