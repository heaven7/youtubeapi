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
 * Assignment
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Youtubeapi_Domain_Model_Assignment extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * user
	 * @var integer
	 */
	protected $user;
	
	/**
	 * feed
	 * @var integer
	 */
	protected $feed;
	
	/**
	 * video
	 * @var integer
	 */
	protected $video;
	
	/**
	 * comment
	 * @var integer
	 */
	protected $comment;
	
	
	
	/**
	 * Setter for user
	 *
	 * @param integer $user user
	 * @return void
	 */
	public function setUser($user) {
		$this->user = $user;
	}

	/**
	 * Getter for user
	 *
	 * @return integer user
	 */
	public function getUser() {
		return $this->user;
	}
	
	/**
	 * Setter for feed
	 *
	 * @param integer $feed feed
	 * @return void
	 */
	public function setFeed($feed) {
		$this->feed = $feed;
	}

	/**
	 * Getter for feed
	 *
	 * @return integer feed
	 */
	public function getFeed() {
		return $this->feed;
	}
	
	/**
	 * Setter for video
	 *
	 * @param integer $video video
	 * @return void
	 */
	public function setVideo($video) {
		$this->video = $video;
	}

	/**
	 * Getter for video
	 *
	 * @return integer video
	 */
	public function getVideo() {
		return $this->video;
	}
	
	/**
	 * Setter for comment
	 *
	 * @param integer $comment comment
	 * @return void
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * Getter for comment
	 *
	 * @return integer comment
	 */
	public function getComment() {
		return $this->comment;
	}
	
}
?>