<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Christian Grlica <christian@heavenseven.net>, heavenseven
*  			
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

/**
 * Controller for the Video object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_Youtubeapi_Controller_VideoController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_Youtubeapi_Domain_Repository_Query
	 */
	protected $query;

	/**
	 * @var Tx_Youtubeapi_Domain_Repository_VideoRepository
	 */
	protected $videoRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
	
    // load Zend GData
    $clientLibraryPath = t3lib_extMgm::extPath('youtubeapi') . '/Library/zendgdata/';
    $oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath);
    
    require_once 'Zend/Loader.php'; // the Zend dir must be in your include_path
    Zend_Loader::loadClass('Zend_Gdata_YouTube');
    Zend_Loader::loadClass('Zend_Gdata_AuthSub');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    
    // load oAuth
    require_once t3lib_extMgm::extPath('youtubeapi') . '/Library/oauth/OAuth.php';
	
		$this->videoRepository = t3lib_div::makeInstance('Tx_Youtubeapi_Domain_Repository_VideoRepository');

  }
  
	/**
	 * List action for this controller. Displays latest videos
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video The video
	 * @return string
	 */
	public function indexAction() {
    $this->videoRepository->setQuery($this->settings);
    $queryUrl = $this->videoRepository->getQueryUrl();
		$videos = $this->videoRepository->getVideos();
		$this->view->assign('videos', $videos);
		$this->view->assign('query', $queryUrl);
		if($this->settings['singlePageOnListPage']) {
		  $comments = $this->videoRepository->getComments($videos[0][vid]);
		  $this->view->assign('comments', $comments);
      $this->response->addAdditionalHeaderData('
        <style>
          .tx-youtubeapi-video-list {
      			float:left;	
      			width:50%;
      			padding:0.5em;
      		}
      		
      		.tx-youtubeapi-video-single {
      			padding:0.5em;
      		}
      		
      		.tx-pagebrowse-pi1 {
            clear: both;
          }
        </style>');
    }
    
		$this->view->assign('settings', $this->settings);
	}

	/**
	 * Action that displays a single Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video The Video to display
	 */
	public function showAction(Tx_Youtubeapi_Domain_Model_Video $video) {
		$this->view->assign('video', $video);
	}

	/**
	 * Displays a form for creating a new Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $newVideo A fresh Video object taken as a basis for the rendering
	 * @dontvalidate $newVideo
	 */
	public function newAction(Tx_Youtubeapi_Domain_Model_Video $newVideo = NULL) {
		$this->view->assign('newVideo', $newVideo);
	}

	/**
	 * Creates a new Video and forwards to the index action.
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $newVideo A fresh Video object which has not yet been added to the repository
	 */
	public function createAction(Tx_Youtubeapi_Domain_Model_Video $newVideo) {
		$this->videoRepository->add($newVideo);
		$this->flashMessageContainer->add('Your new Video was created.');
		$this->redirect('index');
	}

	/**
	 * Displays a form to edit an existing Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video The Video to display
	 * @dontvalidate $video
	 */
	public function editAction(Tx_Youtubeapi_Domain_Model_Video $video) {
		$this->view->assign('video', $video);
	}

	/**
	 * Updates an existing Video and forwards to the index action afterwards.
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video The Video to display
	 */
	public function updateAction(Tx_Youtubeapi_Domain_Model_Video $video) {
		$this->videoRepository->update($video);
		$this->flashMessageContainer->add('Your Video was updated.');
		$this->redirect('index');
	}

	/**
	 * Deletes an existing Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video The Video to be deleted
	 */
	public function deleteAction(Tx_Youtubeapi_Domain_Model_Video $video) {
		$this->videoRepository->remove($video);
		$this->flashMessageContainer->add('Your Video was removed.');
		$this->redirect('index');
	}
	

	
	/**
	 * list action
	 *
	 * @return string The rendered list action
	 */
	public function listAction() {
	}
	
}
?>