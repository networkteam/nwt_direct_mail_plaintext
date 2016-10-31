<?php

########################################################################
# Extension Manager/Repository config file for ext "nwt_direct_mail_plaintext".
#
# Auto generated 26-08-2015 13:35
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Direct Mail Plaintext for Plugins',
	'description' => 'Extend Direct Mail plaintext rendering to handle all list content elements (e.g. tt_news plugin on page) by rendering their plugin with customized TypoScript.',
	'category' => 'misc',
	'version' => '1.0.2',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'networkteam GmbH',
	'author_email' => 'typo3@networkteam.com',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-7.6.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);