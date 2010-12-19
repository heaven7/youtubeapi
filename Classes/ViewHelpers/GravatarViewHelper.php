<?php

class Tx_Youtubeapi_ViewHelpers_GravatarViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
  
  /**
  * @param string $emailAddress The email address to resolve the gravatar for
  * @return string the HTML <img>-Tag of the gravatar
  */
  public function render($emailAddress) {
    return '<img src="http://www.gravatar.com/avatar/' . md5($emailAddress) . '" />';
  }
}

?>