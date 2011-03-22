<?php
/***************************************************************
*  Copyright notice
*
*  (c)  TODO - INSERT COPYRIGHT
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
 * Repository for Tx_Youtubeapi_Domain_Model_Video
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Youtubeapi_Domain_Repository_VideoRepository extends Tx_Extbase_Persistence_Repository {

  /**
	 * Get current queryUrl
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $query The query
	 * @return string The query
	 */
	public function getQueryUrl() {
	  
    return $this->query->queryUrl;
	}
	
	/**
	 * Set current query
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $query The query
	 * @return void
	 */
	public function setQuery($settings) {
	  $this->settings = $settings;
    $this->vars = t3lib_div::_GET('tx_youtubeapi_pi1');
    $this->postvars = t3lib_div::_POST('tx_youtubeapi_pi1');
    
    if($this->postvars[search]) {
      $GLOBALS['TSFE']->fe_user->setKey("ses","search",$this->postvars[search]);
      $this->settings['searchTerms'] = $GLOBALS["TSFE"]->fe_user->getKey("ses", "search");
    }
    
    if($this->postvars[maxResults]) {
      $GLOBALS['TSFE']->fe_user->setKey("ses","maxResults",$this->postvars[maxResults]);
    }
    $this->settings['maxResults'] = $GLOBALS["TSFE"]->fe_user->getKey("ses", "maxResults") ? $GLOBALS["TSFE"]->fe_user->getKey("ses", "maxResults") : $this->settings['maxResults'];
    $limit = $this->settings['maxResults'];
    if ($this->vars) {
      $page = (int)$this->vars[page];
  		$start = $page * $limit + 1;
		} else {
      $start = 1;
    }
  	$this->yt = new Zend_Gdata_YouTube();
  	$this->query = $this->yt->newVideoQuery();
    $this->query->orderBy = $this->settings['orderBy'];	
		$this->query->startIndex = $this->vars['start'] ? $this->vars['start'] : (int)$start;
		$this->query->maxResults = (int)$limit;
		print_r($this->settings['channel']);
		
    // Build search (flexform values will be overidden by searchoptions in FE)
    if ($this->postvars[type] == "") {
      $this->query->videoQuery = $this->postvars[search] ? $this->postvars[search] : $this->settings['searchTerm'];
    }
    // searching by keywords
    if($this->settings['keywords'] || $this->postvars[type] == "keyword") {
      $keywords = $this->postvars[search] ? $this->postvars[search] : $this->settings['keywords'];
      $this->query->category =$this->_keyworded($keywords);
    }
    
    // searching by category
    if(($this->settings['category'] || $this->postvars[type] == "category") && !$this->settings['keywords']) {
      $category = $this->postvars[search] ? $this->postvars[search] : $this->settings['category'];
      $this->query->category = $this->_categorized($category);  
    }
    
    // searching by category and keywords
    if(($this->settings['keywords']|| $this->postvars[type] == "keyword") && ($this->settings['category'] || $this->postvars[type] == "category")) {
      if($this->settings['keywords'] && $this->postvars[type] == "category") {
        $keywords = $this->settings['keywords'];
        $category = $this->postvars[search];
      }
      if($this->settings['category'] && $this->postvars[type] == "keyword") {
        $keywords = $this->postvars[search];
        $category = $this->settings['category'];
      }
      $this->query->category = $this->_categorized($category) . "/". $this->_keyworded($keywords);
    }
	}

  /**
	 * getUserUploads
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $userUploads
	 * @return
	 */
	public function getUserUploads($channel) {   
  	$this->yt = new Zend_Gdata_YouTube();
	  $videoFeed = $this->yt->getUserUploads($channel);
	   
    return $this->processFeed($videoFeed);
	}

  /**
	 * search
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $query The query
	 * @return string The query
	 */
	public function search() {
	  $this->query->setVideoQuery($this->searchTerms);

	}
	
	/**
	 * Get Videos
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $videos The Videos
	 * @return Tx_Youtubeapi_Domain_Model_Video $videos The Videos
	 */
	public function getVideos() {
    $videoFeed = $this->yt->getVideoFeed($this->query);
    
    return $this->processFeed($videoFeed);
	}
	
	/**
	 * Process Feed
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $videos The Videos
	 * @return Tx_Youtubeapi_Domain_Model_Video $videos The Videos
	 */
	function processFeed($videoFeed) {
    $this->totalResult = (int)$videoFeed->getTotalResults()->getText();
    $videos['totalResult'] = $this->totalResult;
    $videos['numberOfPages'] =($videos['totalResult'] / $this->settings['maxResults']);
    $count = 0;
    foreach ($videoFeed as $entry) {
      $count++;
      $video = $this->getVideoMetadata($entry);
      $video['count'] = $count;
      $videos[] = $video;
    }
    return $videos;
  }
	
	/**
	 * Get getVideoMetaData
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Video $video Video
	 * @return Tx_Youtubeapi_Domain_Model_Video $video Video
	 */
	function getVideoMetadata($entry) {
    
    $authorUsername = $entry->author[0]->name;
    
    $video = array();
    $video['title'] = (string)$entry->getVideoTitle();
    $video['description'] = (string)$entry->getVideoDescription();
    $video['category'] = (string)$entry->getVideoCategory();
    $video['thumbnail'] = (string)$entry->mediaGroup->thumbnail[0]->url;
    $video['authorUrl'] = 'http://www.youtube.com/profile?user=' . $authorUsername;		  
    $video['author'] = $authorUsername;
    $video['keywords'] = $entry->mediaGroup->keywords;
    $video['duration'] = $this->durationInMinutes($entry->mediaGroup->duration->seconds);
    $video['url'] = $entry->mediaGroup->player[0]->url;
    $video['viewCount'] = $entry->statistics->viewCount;
    $video['rating'] = $entry->rating->average;
    //$video['rating'] = $entry->getVideoRatingInfo();
    $video['numRaters'] = $entry->rating->numRaters;
    $video['flashUrl'] = $this->getFlashUrl($entry);
    $video['vid'] = $entry->getVideoId();
    $video['commentsCount'] = $this->yt->getVideoCommentFeed($video['vid'])->getTotalResults()->getText();
    return $video;
    
  }
  
  /**
	 * Get Comments
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Comment $comments The Comments
	 * @return Tx_Youtubeapi_Domain_Model_Comment $comments The Comments
	 */
	public function getComments($vid) {
    $commentsFeed = $this->yt->getVideoCommentFeed($vid);
    $comments['totalResult'] = (int)$commentsFeed->getTotalResults()->getText();
    $comments['numberOfPages'] =($comments['totalResult'] / $this->settings['maxResults']);
    $count = 0;
		foreach ($commentsFeed as $commentEntry) {
		  $count++;
      $comment = $this->getCommentMetadata($commentEntry);
      $comment['count'] = $count;
      $comments[] = $comment;
    }
    return $comments;
	}
	
	/**
	 * Get getCommentMetaData
	 *
	 * @param Tx_Youtubeapi_Domain_Model_Comment $comments The Comments
	 * @return Tx_Youtubeapi_Domain_Model_Comment $comments The Comments
	 */
	function getCommentMetadata($entry) {
	  $comment = array();
	  $comment['title'] = $entry->title->text;
	  $comment['content'] = $entry->getContent()->getText();
	  $comment['author'] = $entry->author[0]->name->getText();
	  $comment['authorUrl'] = 'http://www.youtube.com/profile?user=' . $comment['author'];		  
	  $comment['published'] = $entry->getPublished()->getText();
	  return $comment;
	}
  
  /**
	 * Get getFlashUrl
	 *
	 * @param flashUrl
	 * @return string flashUrl
	 */
	 
  protected function getFlashUrl($video) {
      foreach ($video->mediaGroup->content as $content) {
          if ($content->type == 'application/x-shockwave-flash') {
              return $content->url;
          }
      }
      return null;
  }
  
  /*
  ** HELPER
  */
  
  function _searchable($terms) {
  
    return ereg_replace('[[:space:]]+', '+', trim($terms));
  
  }
  
  function _categorized($terms) {
  
    $terms = trim($terms);
    $temp = explode(" ", $terms);
    
    for($i = 0; $i < count($temp);$i++) {
      $temp[$i] = ucfirst($temp[$i]);
    }
    return implode("/", $temp);
    
  }
  
  function _keyworded($terms) {
  
    $terms = preg_replace('/[\s,]+/', '/', trim($terms));
    return strtolower($terms);  
    
  }
  
  /**
	 * Get durationInMinutes
	 *
	 * @param durationInMinutes
	 * @return string durationInMinutes
	 */
  
  protected function durationInMinutes($length) {
		
    $min = intval($length / 60);
		$s = $length - ($min * 60);
		return "$min:$s min";
		
  }
}
?>