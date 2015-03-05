<?php

return [

	'default' => 'saman',

	'gateways' =>
	[

		'saman' =>
		[
			'driver'      => 'Saman',
			'terminalId'  => '10151012',
			'requestUrl'  => 'https://sep.shaparak.ir/Payments/InitPayment.asmx?wsdl',
			'paymentUrl'  => 'https://sep.shaparak.ir/Payment.aspx',
			'redirectUrl' => 'root',
		],

	],
];