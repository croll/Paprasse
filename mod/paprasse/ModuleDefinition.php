<?php  //  -*- mode:php; tab-width:2; c-basic-offset:2; -*-

namespace mod\paprasse;

class ModuleDefinition extends \core\ModuleDefinition {

	function __construct() {
		$this->description = 'Simple ajax realtime ERP';
		$this->name = 'paprasse';
		$this->version = '1.0';
		$this->dependencies = array('webpage');
		parent::__construct();
	}

	function install() {
		parent::install();

    // do things here by default (after parent::install)
		// set default route
		\mod\regroute\Main::registerRoute($this->id, '#^/paprasse/([a-z0-9_-]*)$#', 'mod_paprasse_init', \mod\regroute\Main::flag_html | \mod\regroute\Main::flag_xmlhttprequest);
		
		// create rights 
    		\mod\user\Main::addRight('Manage paprasse', 'Allow user to administer paprasse ERP');
		//assign rights to default groups 
		\mod\user\Main::assignRight('Manage paprasse', 'Admin');


	}

	function uninstall() {
    // do things here by default (before parent::uninstall)
		\mod\user\Main::delRight('Manage paprasse');
		// delete route
		\mod\regroute\Main::unregister($this->id);
		parent::uninstall();
	}
}
