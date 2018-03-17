<?php
namespace Model;

class Quiz extends \Model
{
	public static function get_random_ids($limit = null)
	{
		$query = \DB::select('id')
					->from('quizzes')
					->order_by(\DB::expr('RAND()'));
		if ($limit !== null)
		{
			$query->limit($limit);
		}
		$data = $query->execute()->as_array();
		return array_column($data, 'id');
	}

	public static function get_data($id)
	{
		$query = \DB::select()
					->from('quizzes')
					->where('id', '=', $id);
		$data = $query->execute()->as_array();
		return \Arr::get($data, 0);
	}
}