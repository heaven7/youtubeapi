<?php

class Tx_Youtubeapi_ViewHelpers_PageBrowserViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
  
  /**
  * @param integer $totalResults
  * @param integer $numberOfPages
  * @param string $prefixId  
  * @return string The paginator  
  */
  public function render($numberOfPages,$prefixId,$pageParameterName = 'page') {
    
    // Get default configuration
    $conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_pagebrowse_pi1.'];
    // Modify this configuration
    $conf += array(
    'pageParameterName' => $prefixId . '|'.$pageParameterName,
    'numberOfPages' => intval($numberOfPages)
    );
    // Get page browser
    $cObj = t3lib_div::makeInstance('tslib_cObj');
    $cObj->start(array(), '');
    return $cObj->cObjGetSingle('USER', $conf);
  }
    
}

?>