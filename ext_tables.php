<?php
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY,'static/default/', 'Default plaintext configuration for plugins');
?>