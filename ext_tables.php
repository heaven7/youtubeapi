<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Youtube API'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Youtube API');

//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_youtubeapi_domain_model_video', 'EXT:youtubeapi/Resources/Private/Language/locallang_csh_tx_youtubeapi_domain_model_video.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_youtubeapi_domain_model_video');
$TCA['tx_youtubeapi_domain_model_video'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Video.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_youtubeapi_domain_model_video.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_youtubeapi_domain_model_feed', 'EXT:youtubeapi/Resources/Private/Language/locallang_csh_tx_youtubeapi_domain_model_feed.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_youtubeapi_domain_model_feed');
$TCA['tx_youtubeapi_domain_model_feed'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_feed',
		'label' 			=> 'url',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Feed.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_youtubeapi_domain_model_feed.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_youtubeapi_domain_model_user', 'EXT:youtubeapi/Resources/Private/Language/locallang_csh_tx_youtubeapi_domain_model_user.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_youtubeapi_domain_model_user');
$TCA['tx_youtubeapi_domain_model_user'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_user',
		'label' 			=> 'username',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/User.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_youtubeapi_domain_model_user.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_youtubeapi_domain_model_comment', 'EXT:youtubeapi/Resources/Private/Language/locallang_csh_tx_youtubeapi_domain_model_comment.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_youtubeapi_domain_model_comment');
$TCA['tx_youtubeapi_domain_model_comment'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_comment',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Comment.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_youtubeapi_domain_model_comment.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_youtubeapi_domain_model_assignment', 'EXT:youtubeapi/Resources/Private/Language/locallang_csh_tx_youtubeapi_domain_model_assignment.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_youtubeapi_domain_model_assignment');
$TCA['tx_youtubeapi_domain_model_assignment'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_assignment',
		'label' 			=> 'user',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Assignment.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_youtubeapi_domain_model_assignment.gif'
	)
);

// Adding FlexForm
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

?>