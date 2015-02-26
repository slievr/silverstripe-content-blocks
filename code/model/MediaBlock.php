<?php

class MediaBlock extends Block {
	static $db = array(
		'Title' => 'Text',
		'BlockTitle' => 'Text',
		'Content' => 'HTMLText',
		'CTAText' => 'Text'
	);

	static $has_one = array(
		'Image' => 'Image',
		'Link' => 'SiteTree'
	);


	static $singular_name = "Media Block";

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Title'),
			UploadField::create('Image'),
			HTMLEditorField::create('Content'),
			TreeDropdownField::create('LinkID', 'Link to page', 'SiteTree'),
			TextField::create('CTAText')
		));

		return $fields;
	}
}