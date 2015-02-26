<?php

class TweetBlock extends Block{
	static $db = array(

	);

	static $singular_name = "Tweet Block";


	function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}

	
}