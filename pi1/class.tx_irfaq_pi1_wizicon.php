<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2004 - 2006 Ingo Renner (typo3@ingo-renner.com)
 *  (c) 2006        Netcreators (extensions@netcreators.com)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Class that adds the wizard icon.
 *
 * @author    Netcreators <extensions@netcreators.com>
 */
class tx_irfaq_pi1_wizicon
{
    function proc($wizardItems)
    {
        $languageService = $this->getLanguageService();
        $localLang = $this->getLocalLang();
        $wizardItems['plugins_tx_irfaq_pi1'] = array(
            'icon' => ExtensionManagementUtility::extRelPath('irfaq') . 'res/ce_wiz.gif',
            'title' => $languageService->getLLL('pi1_title_irfaq', $localLang),
            'description' => $languageService->getLLL('pi1_plus_wiz_description_irfaq', $localLang),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=irfaq_pi1'
        );

        return $wizardItems;
    }

    /**
     * Get parsed localization array
     *
     * @return    array    The LOCAL_LANG array
     */
    public function getLocalLang()
    {
        $llFile = ExtensionManagementUtility::extPath('irfaq') . 'lang/locallang.xml';
        $parser = new \TYPO3\CMS\Core\Localization\Parser\LocallangXmlParser();
        return $parser->getParsedData($llFile, $this->getLanguageService()->lang);
    }

    /**
     * @return \TYPO3\CMS\Lang\LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }
}