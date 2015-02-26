<?php 

class ExchangeBlock extends Block {
	
	static $db = array(
		'Base' => 'Text',
		'Currencies' => 'Text',
		'cache' => 'Text'
	);

	static $singular_name = "Exchange Block";

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Main', array(

			TextField::create('Base', 'Base Currency r.g. "GBP"'),
			TextField::create('Currencies','Formated like so... "GBP,USD,EUR"')

			));

		return $fields;
	}

	function getExchangeRates() {

		$cache = SS_Cache::factory('exchange');
	
		$url = "http://openexchangerates.org/api/latest.json?app_id=8b5c087339514119a37233ffdb457885";	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		

		$response = Convert::json2array($response);

		$rates = $response["rates"];
		$timestamp = $response["timestamp"];
		$base = $response["base"];

		$rate_list = new ArrayList();

		foreach($rates as $k=>$v) {
			$rate_list->push(new ArrayData(array(
				'Currency' => $k,
				'ExchangeRate' => $v
			)));
		}

		$converter = $rate_list->filter('Currency', $this->Base)->First()->ExchangeRate;

		$convert = 1 / $converter;

		$converted_rate_list = new ArrayList();

	
		foreach($rates as $k=>$v) {

			if ($k == $this->Base){
				$temp = $this->Base;
			}else{
				$temp = $k;
			}

			$converted_rate_list->push(new ArrayData(array(
				

				'Currency' => $temp,
				'ExchangeRate' => round($v * $convert, 3)
			)));
		}

		$currency_filter = explode( ',', $this->Currencies);

		if (count($currency_filter) > 1){
			$converted_rate_list = $converted_rate_list->filter('Currency', $currency_filter);
		}

		$ExchangeGroup = new ArrayData(array(
			"Timestamp" => date("j M Y", $timestamp),
			"Rates" => $converted_rate_list
		));

		

		return $ExchangeGroup;

		//self::$response_cache = $ExchangeGroup;
		

		//return self::$response_cache;
		
	}

}
