<?php
class Model_Portfolio extends Model
{
	public function get_data()
	{	
		return array(
			array(
				'Year' => '2018',
				'Site' => 'http://***',
				'Description' => 'Небольшой рекламный сайт.'
			),
			array(
				'Year' => '2019',
				'Site' => 'http://***',
				'Description' => 'Сайт-магазин.'
			),
		);
	}
}