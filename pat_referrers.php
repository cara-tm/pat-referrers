<?php
/**
 * @name:         pat_referrers
 * @author:       © 2012 Patrick LEFEVRE, all rights reserved.
 * @author_email: <patrick[dot]lefevre[at]gmail[dot]com>
 * @link:         http://twitter.com/lowel
 * @type:         Public
 * @prefs:        no
 * @order:        5
 * @version:      0.5.0
 * @license:      GPLv2
*/

/**
 * This plugin tags registry
 *
 */
if (class_exists('Textpattern_Tag_Registry')) {
	Txp::get('Textpattern_Tag_Registry')
		->register('pat_referrers');
}

/**
 * Redirect known referrers to specific page
 *
 * @param  array    Tag attributes
 * @return          Header location
 */
function pat_referrers($atts)
{

	extract(lAtts(array(
		'list'		  => '',
		'redirect' 	=> NULL,
		'default' 	=> NULL,
		'external' 	=> NULL,
		'separator' => ',',
		'status' 	  => false,
		'referrer' 	=> serverSet('HTTP_REFERER')
	), $atts));

	// No inbound link: do nothing
	if (empty($referrer)) {
		return;
	}

	// No list attribute sets: display error msg
	if(empty($list)) {
		trigger_error('list_attribute_is_required');
		return;
	}

	// Create an array from list
	$s = do_list($list, $separator);
	// Sanitize inbound link Url
	$host = preg_replace('/^(http(s?)\:\/\/)*+/', '', $referer);

	// Makes distinction between domain...
	if (substr($host, 0, 4) == 'www.') {
		$host = substr($host, 4);
	// ... or sub domain names
	}

	// Redirect to external Url
	if ($external !== NULL) {
		header('Location: '.$external);
		exit;	
	}

	// Main stuff 
	if (in_array($host, $s, TRUE)) {
		// ... with internal redirection
		if ($redirect !== NULL) {
			if($status === false) {
				header('Location: '.$redirect);
			// ... with status
			} else {
				header('Status: 301 Moved Permanently');
				header('Location: '.hu.$redirect);
			}
		exit;
		}
	}

	// Home page redirection
	if ($default !== NULL) {
		header('Location: '.hu.$default);
		exit;
	} else {
		return;
	}

}
