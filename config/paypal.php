<?php
return array(
/** set your paypal credential **/
'client_id' =>'AV_yPfMBPs0EnUUr6kCr_EwkmMs5SP9r_ApO1nme7qSTdefWcrhMubYkyZ8rJJgcswFYNcj8JDxmgTt8',
'secret' => 'ELqoiq6DZzLYJ8RSIjiRzE0hb5Wet9vWtekH8WfBr03I8swyHBTA6z431uKy_Ha9SnS7NX_-i8-P0vq3',
/**
* SDK configuration 
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
	),
);

















