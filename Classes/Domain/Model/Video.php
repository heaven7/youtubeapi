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
 * Video
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Youtubeapi_Domain_Model_Video extends Tx_Extbase_DomainObject_AbstractEntity {

	
	/**
	 * title
	 * @var string
	 */
	protected $title;
	
	/**
	 * author
	 * @var string
	 */
	protected $author;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	/**
	 * vid
	 * @var string
	 */
	protected $vid;
	
	/**
	 * keywords
	 * @var string
	 */
	protected $keywords;
	
	/**
	 * category
	 * @var string
	 */
	protected $category;
	
	/**
	 * assignment
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Assignment>
	 */
	protected $assignment;
	
	/**
	 * related
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Video>
	 */
	protected $related;
	
	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->assignment = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->related = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Setter for title
	 *
	 * @param string $title title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Getter for title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Setter for author
	 *
	 * @param string $author author
	 * @return void
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * Getter for author
	 *
	 * @return string author
	 */
	public function getAuthor() {
		return $this->author;
	}
	
	/**
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Setter for vid
	 *
	 * @param string $vid vid
	 * @return void
	 */
	public function setVid($vid) {
		$this->vid = $vid;
	}

	/**
	 * Getter for vid
	 *
	 * @return string vid
	 */
	public function getVid() {
		return $this->vid;
	}
	
	/**
	 * Setter for keywords
	 *
	 * @param string $keywords keywords
	 * @return void
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
	 * Getter for keywords
	 *
	 * @return string keywords
	 */
	public function getKeywords() {
		return $this->keywords;
	}
	
	/**
	 * Setter for category
	 *
	 * @param string $category category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * Getter for category
	 *
	 * @return string category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * Setter for assignment
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Assignment> $assignment assignment
	 * @return void
	 */
	public function setAssignment(Tx_Extbase_Persistence_ObjectStorage $assignment) {
		$this->assignment = $assignment;
	}

	/**
	 * Getter for assignment
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Assignment> assignment
	 */
	public function getAssignment() {
		return $this->assignment;
	}
	
	/**
	 * Adds a Assignment
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Assignment The Assignment to be added
	 * @return void
	 */
	public function addAssignment(Tx_Youtubeapi_Domain_Model_Assignment $assignment) {
		$this->assignment->attach($assignment);
	}
	
	/**
	 * Removes a Assignment
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Assignment The Assignment to be removed
	 * @return void
	 */
	public function removeAssignment(Tx_Youtubeapi_Domain_Model_Assignment $assignment) {
		$this->assignment->detach($assignment);
	}
	
	/**
	 * Setter for related
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Video> $related related
	 * @return void
	 */
	public function setRelated(Tx_Extbase_Persistence_ObjectStorage $related) {
		$this->related = $related;
	}

	/**
	 * Getter for related
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Youtubeapi_Domain_Model_Video> related
	 */
	public function getRelated() {
		return $this->related;
	}
	
	/**
	 * Adds a Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video The Video to be added
	 * @return void
	 */
	public function addRelated(Tx_Youtubeapi_Domain_Model_Video $related) {
		$this->related->attach($related);
	}
	
	/**
	 * Removes a Video
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video The Video to be removed
	 * @return void
	 */
	public function removeRelated(Tx_Youtubeapi_Domain_Model_Video $related) {
		$this->related->detach($related);
	}
	
}
?>