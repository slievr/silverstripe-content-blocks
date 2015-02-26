<?php

class Page_ControllerExtension extends DataExtension{

	private static $allowed_actions = array(
		'index'
	);

	public function index() {

		if($this->owner->SortedBlocks()->count() > 0){

			$i = 1; 

			foreach($this->owner->SortedBlocks() as $block){

				if(strpos($this->owner->Content, '[Block-'.$block->ID.']') !== false) {
													
					$insertedContent = $block->RenderWith($block->ClassName);

					$this->owner->Content = str_replace('[Block-'.$block->ID.']', $insertedContent, $this->owner->Content);
				}

			}

		}

		return array();
	}

}