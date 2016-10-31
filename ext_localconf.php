<?php
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

$TYPO3_CONF_VARS['EXTCONF']['direct_mail']['renderCType'][] = 'EXT:nwt_direct_mail_plaintext/classes/class.tx_nwtdirectmailplaintext_renderer.php:tx_nwtdirectmailplaintext_renderer';
?>