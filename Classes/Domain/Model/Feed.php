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
 * Youtube Feed
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Youtubeapi_Domain_Model_Feed extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * url
	 * @var string
	 */
	protected $url;
	
	
	
	/**
	 * Setter for url
	 *
	 * @param string $url url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Getter for url
	 *
	 * @return string url
	 */
	public function getUrl() {
		return $this->url;
	}
	
}
?>