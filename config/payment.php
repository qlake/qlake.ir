<?php

return [

	'default' => 'saman',

	'gateways' =>
	[

		'saman' =>
		[
			'driver'      => 'Saman',
			'terminalId'  => '21056352',//21056352-10151012
			'callbackUrl' => 'http://2.182.224.73/qlake/qlake.ir/back',
		],

		'mellat' =>
		[
			'driver'       => 'Mellat',
			'terminalId'   => '802802',
			'userName'     => 'rahahost',
			'userPassword' => 'ra94ha',
			'callbackUrl'  => 'http://2.182.224.73/qlake/qlake.ir/back',
		],

	],
];
