<?php

class Block extends DataObject {


	static $belongs_many_many = array(
		'Pages' => 'Page'
	);

	static $summary_fields = array(
		'singular_name',
		'Title',
		'ID'
	);

	static $singular_name = "Block";

	function forTemplate() {
		return $this->renderWith("BlockHolder");
	}

	function Layout() {
		return $this->renderWith($this->ClassName);
	}

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Pages', TreeMultiSelectField::create('Pages', 'Appears on pages:', "SiteTree"));

		return $fields;
	}
}