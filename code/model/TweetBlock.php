<?php

class TweetBlock extends Block{
	static $db = array(
		'TwitterUser' => 'VarChar(255)'
	);

	static $singular_name = "Tweet Block";


	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Main',TextField::create('TwitterUser'));
		
		return $fields;
	}

	
}
