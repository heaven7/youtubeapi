<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_youtubeapi_domain_model_video'] = array(
	'ctrl' => $TCA['tx_youtubeapi_domain_model_video']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,author,description,vid,keywords,category,assignment,related'
	),
	'types' => array(
		'1' => array('showitem' => 'title,author,description,vid,keywords,category,assignment,related')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_youtubeapi_domain_model_video',
				'foreign_table_where' => 'AND tx_youtubeapi_domain_model_video.uid=###REC_FIELD_l18n_parent### AND tx_youtubeapi_domain_model_video.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'author' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.author',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.description',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'vid' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.vid',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'keywords' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.keywords',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'category' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.category',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'assignment' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.assignment',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_youtubeapi_domain_model_assignment',
				'foreign_field' => 'video',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
				),
			)
		),
		'related' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:youtubeapi/Resources/Private/Language/locallang_db.xml:tx_youtubeapi_domain_model_video.related',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_youtubeapi_domain_model_video',
				'foreign_field' => 'video',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
				),
			)
		),
		'video' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
	),
);
?>