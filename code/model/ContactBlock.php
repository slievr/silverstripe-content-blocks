<?php

class ContactBlock extends Block {
	
	static $db = array(
		'Title' => 'Text',
		'Summary' => 'Text'
	);

	static $singular_name = "Contact Block";

	

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Title'),
			TextAreaField::create('Summary')
		));

		return $fields;
	}

	function Form() {

	    $page = Page::get()->First();
	    $ctrl = new Page_Controller($page);
	    return $ctrl->QuickEnquiryForm();

	}

}