<?php

	Class Extension_Switch extends Extension{



		/*------------------------------------------------------------------------------------------------*/
		/*  Delegates  */
		/*------------------------------------------------------------------------------------------------*/

		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/backend/',
					'delegate' => 'InitaliseAdminPageHead',
					'callback' => 'dInitaliseAdminPageHead'
				)
			);
		}

		public function dInitaliseAdminPageHead(){
			$callback = Administration::instance()->getPageCallback();

			$context = in_array($callback['context']['page'], array('new', 'edit')) ? 'single' : 'index';

			// append assets
			if( $context == 'single' ){
				Administration::instance()->Page->addStylesheetToHead(URL.'/extensions/switch/assets/switch.bootstrap-switch.css', "screen");
				Administration::instance()->Page->addStylesheetToHead(URL.'/extensions/switch/assets/switch.publish_single.css', "screen");
				Administration::instance()->Page->addScriptToHead(URL.'/extensions/switch/assets/switch.bootstrap-switch.js', null, false);
				Administration::instance()->Page->addScriptToHead(URL.'/extensions/switch/assets/switch.publish_single.js', null, false);
			}
		}
	
	}
