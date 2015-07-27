<?php
/**
 * @package SyDES
 *
 * @copyright 2011-2015, ArtyGrand <artygrand.ru>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class VideoController extends DataTable{
	public $name = 'video';
	public $structure = array(
		'title' => array(
			'label' => 'video_title',
			'type' => 'string',
			'def' => 'TEXT NOT NULL',
			'visible' => true,
			'attr' => 'class="form-control"'
		),
		'url' => array(
			'label' => 'video_url',
			'type' => 'string',
			'def' => 'TEXT NOT NULL',
			'visible' => false,
			'attr' => 'class="form-control" required'
		),
		'position' => array(
			'label' => 'position',
			'type' => 'string',
			'def' => 'TEXT NOT NULL',
			'visible' => true,
			'attr' => 'class="form-control"'
		),
	);
}