<h3>$Base Exchange rates</h3>
<% with getExchangeRates %>
			
	<p>Last Updated: <span>$Timestamp</span></p>

	
	
		<% loop Rates %>	
			<p class="exchange">$Currency - $ExchangeRate </p>
		<% end_loop %>
	
	

<% end_with %>