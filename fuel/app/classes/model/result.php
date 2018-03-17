<?php
namespace Model;

class Result extends \Model
{
	public static function save($user_id, $quiz_id, $is_correct)
	{
		$query = \DB::insert('results')
					->set([
						'user_id' => $user_id,
						'quiz_id' => $quiz_id,
						'is_correct' => $is_correct,
						'timestamp' => time(),
					]);
		$query->execute();
	}
}