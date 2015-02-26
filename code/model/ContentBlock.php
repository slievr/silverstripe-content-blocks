<?php

class ContentBlock extends Block {
	static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText'
	);

	static $singular_name = "Content Block";


	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Title'),
			HTMLEditorField::create('Content')
		));

		return $fields;
	}
}