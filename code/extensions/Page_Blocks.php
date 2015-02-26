<?php

class BlocksExtension extends DataExtension {
	static $many_many = array(
		'Blocks' => 'Block'
	);

	static $many_many_extraFields = array(
		'Blocks' => array(
			'Sort' => 'Int'
		)
	);

	function updateCMSFields(FieldList $fields) {
		
		$config = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponent(new GridFieldAddExistingSearchButton())
			->addComponent(new GridFieldAddNewMultiClass())
			->addComponent(new GridFieldOrderableRows('Sort'));

		$fields->addFieldToTab('Root.Blocks', $grid = GridField::create('Blocks', 'Manage Blocks', $this->owner->Blocks(), $config));
	}

	function SortedBlocks() {
		return $this->owner->Blocks()->sort('Sort', 'ASC');
	}
}