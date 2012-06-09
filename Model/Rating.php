<?php

App::uses('FeedbackAppModel', 'Feedback.Model');
App::uses('Hash', 'Utility');


class Rating extends FeedbackAppModel
{
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array
		(
			'foreign_table' => array
			(
				'notempty' => array
				(
					'rule' => array('notempty'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'foreign_id' => array
			(
				'notempty' => array
				(
					'rule' => array('notempty'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'rating' => array
			(
				'notempty' => array
				(
					'rule' => array('notempty'),
					//'message' => 'Your custom message here',
					'allowEmpty' => false,
					'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'decimal' => array
				(
					'rule' => array('decimal'),
				),
				'minimum' => array
				(
					'rule' => array('comparison', '>=', 0.5),
				),
				'maximum' => array
				(
					'rule' => array('comparison', '<=', 5),
				),
			),
		);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $actsAs = array
		(
			'Feedback.Polymorphic' => array
			(
				'modelField'	=> 'foreign_model',
				'foreignKey'	=> 'foreign_id'
			),
		);
}