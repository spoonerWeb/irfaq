<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_irfaq_q');

$TCA['tx_irfaq_q'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:irfaq/lang/locallang_db.xml:tx_irfaq_q',
        'label' => 'q',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'fe_group' => 'fe_group',
        ),
        'dividers2tabs' => true,
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'tca/tca_q.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(
                $_EXTKEY
            ) . 'res/icon_tx_irfaq_q.gif',
        'searchFields' => 'q, q_from, a, related_links',
    ),
    'feInterface' => array(
        'fe_admin_fieldList' => 'hidden, fe_group, q, cat, a, related',
    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_irfaq_cat');

$TCA['tx_irfaq_cat'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:irfaq/lang/locallang_db.xml:tx_irfaq_cat',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'fe_group' => 'fe_group',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(
                $_EXTKEY
            ) . 'tca/tca_cat.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(
                $_EXTKEY
            ) . 'res/icon_tx_irfaq_cat.gif',
        'searchFields' => 'title',
    ),
    'feInterface' => array(
        'fe_admin_fieldList' => 'hidden, fe_group, title',
    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_irfaq_expert');

$TCA['tx_irfaq_expert'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:irfaq/lang/locallang_db.xml:tx_irfaq_expert',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'delete' => 'deleted',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(
                $_EXTKEY
            ) . 'tca/tca_expert.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(
                $_EXTKEY
            ) . 'res/icon_tx_irfaq_expert.gif',
        'searchFields' => 'name, email, url',
    ),
    'feInterface' => array(
        'fe_admin_fieldList' => 'name, email, url',
    )
);

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';

//adding sysfolder icon
$TCA['pages']['columns']['module']['config']['items'][$_EXTKEY]['0'] = 'LLL:EXT:irfaq/lang/locallang_db.xml:tx_irfaq.sysfolder';
$TCA['pages']['columns']['module']['config']['items'][$_EXTKEY]['1'] = $_EXTKEY;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'static/ts/', 'IRFAQ default TS');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array('LLL:EXT:irfaq/lang/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY . '_pi1'),
    'list_type'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $_EXTKEY . '_pi1',
    'FILE:EXT:irfaq/flexform/flexform_ds.xml'
);

if (TYPO3_MODE == 'BE') {
    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_irfaq_pi1_wizicon'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(
            $_EXTKEY
        ) . 'pi1/class.tx_irfaq_pi1_wizicon.php';

    \TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
        'pages',
        'contains-irfaq',
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'res/icon_tx_irfaq_sysfolder.gif'
    );
}
