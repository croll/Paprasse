<?php  //  -*- mode:php; tab-width:2; c-basic-offset:2; -*-

namespace mod\paprasse;

class Main {
  public static function hook_mod_paprasse_init($hookname, $userdata, $matches) {
 		// check perm 
		if (!\mod\user\Main::userHasRight('Manage paprasse')) {
			return false;
		}
		//get lang 
		$lang=\mod\lang\Main::getCurrentLang();
		// get function params
		$sysname=$matches[1]; 
		// get page 
		$page = new \mod\webpage\Main();
		// assign data to the smarty template 
		$page->smarty->assign('lang', $lang);
                // as this function to be available both for http and ajax request set both layout options 
		//return $matches;
		if ($flags & \mod\regroute\Main::flag_xmlhttprequest) {
			$page->smarty->fetch('paprasse/layout');
                } else {
                        $page->setLayout('paprasse/layout');
                        $page->display();
                } 	
  }

}
