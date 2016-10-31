<?php
/***************************************************************
 *  (c) 2016 networkteam GmbH - all rights reserved
 ***************************************************************/

/**
 * Plaintext rendering hook class for general plugins. The class has to be
 * registered as a hook for tx_directmail_pi1.
 */
class tx_nwtdirectmailplaintext_renderer {

	/**
	 * Renders plaintext for plugin content elements with CType list.
	 * It will use the original plugin configuration to render the plugin
	 * via cObjGetSingle. Additional configuration allows for stdWrap
	 * on generated content and different tag substitutions.
	 *
	 * @param tx_directmail_pi1 $pObj The calling plugin
	 * @param string $content Predefined content
	 *
	 * @return array An array of strings for the lines
	 */
	public function renderPlainText(&$pObj, $content) {
		if ($pObj->cObj->data['list_type'] === 0 || $pObj->cObj->data['list_type'] === '') {
			return array();
		}

		$content = '';

		$conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_nwtdirectmailplaintext.'];

		$pluginCObjName = $GLOBALS['TSFE']->tmpl->setup['tt_content.']['list.']['20.'][$pObj->cObj->data['list_type']];
		$pluginConf = $GLOBALS['TSFE']->tmpl->setup['tt_content.']['list.']['20.'][$pObj->cObj->data['list_type'] . '.'];

		$content = $pObj->cObj->cObjGetSingle($pluginCObjName, $pluginConf);
		if (strlen($conf['listItemPrefix'])) {
			$content = str_replace('<li>', '<li>' . $conf['listItemPrefix'] . ' ', $content);
		}
		if (strlen($conf['breakAfterStartTags'])) {
			$tags = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $conf['breakAfterStartTags'], TRUE);
			foreach ($tags as $tag) {
				$content = str_replace('<' . $tag . '>', '<' . $tag . '><br/>', $content);
			}
		}
		if (strlen($conf['breakAfterEndTags'])) {
			$tags = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $conf['breakAfterEndTags'], TRUE);
			foreach ($tags as $tag) {
				$content = str_replace('</' . $tag . '>', '</' . $tag . '><br/>', $content);
			}
		}
		if (intval($conf['parseBody'])) {
			$content = $pObj->parseBody($content);
		}
		$content = $pObj->cObj->stdWrap($content, $conf['contentWrap.']);
		$lines = $pObj->breakContent($content);
		return array($lines);
	}
}
?>