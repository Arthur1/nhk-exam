<?php
use \Model\Quiz;
use \Model\Result;

class Controller_Quiz extends Controller_Template
{
	private $session = [];

	private $statuses = [];

	private $quiz_data = [];

	public function before()
	{
		parent::before();
	}

	public function get_index()
	{
		$this->template->title = 'モード選択';
		$this->template->contents = View::forge('quiz/index');
	}

	public function post_index()
	{
		$this->get_index();
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
			return;
		}
		Session::set_flash('mode', Input::post('mode'));
		switch (Input::post('mode'))
		{
			case 'テストモード':
				Session::set_flash('question_ids', Quiz::get_random_ids(10));
				$this->init_statuses();
				break;
			case 'とことんモード':
				Session::set_flash('question_ids', Quiz::get_random_ids());
				$this->init_statuses();
				break;
			case '苦手克服モード':
				Session::set_flash('question_ids', 0);
				$this->init_statuses();
				break;
		}
	}

	public function get_q()
	{
		$this->template->title = '問題';
		$this->template->contents = View::forge('quiz/q');
		$this->get_statuses();
		$quiz_id = Arr::get($this->statuses, 'question_ids.'.Arr::get($this->statuses, 'progress'));
		if ($quiz_id === null)
		{
			Response::redirect('quiz/mode');
		}
		$this->quiz_data = Quiz::get_data($quiz_id);
		$answer_list[] = $this->quiz_data['answer'];
		for ($i = 1; $i <= 3; $i++)
		{
			if (! empty(Arr::get($this->quiz_data, 'dummy'.$i)))
			{
				$answer_list[] = Arr::get($this->quiz_data, 'dummy'.$i);
			}
		}
		shuffle($answer_list);
		$this->template->contents->answer_list = $answer_list;
		$this->template->contents->quiz_data = $this->quiz_data;
		$this->template->contents->statuses = $this->statuses;
	}

	public function post_q()
	{
		$this->get_q();
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
			return;
		}
		$is_correct = $this->quiz_data['answer'] === Input::post('answer');
		Result::save(Auth::get_screen_name(), $this->quiz_data['id'], $is_correct);
		array_push($this->statuses['result'], $is_correct);
		Session::set_flash('result', $this->statuses['result']);
		Response::redirect('quiz/a');
	}

	public function get_a()
	{
		$this->template->title = '解答';
		$this->template->contents = View::forge('quiz/a');
		$this->get_statuses();
		$quiz_id = Arr::get($this->statuses, 'question_ids.'.Arr::get($this->statuses, 'progress'));
		if ($quiz_id === null)
		{
			Response::redirect('quiz/mode');
		}
		$this->quiz_data = Quiz::get_data($quiz_id);
		$this->template->contents->quiz_data = $this->quiz_data;
		$this->template->contents->statuses = $this->statuses;
	}

	public function post_a()
	{
		$this->get_a();
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
			return;
		}
		switch (Input::post('submit'))
		{
			case '次の問題へ':
				Session::set_flash('progress', ++$this->statuses['progress']);
				Response::redirect('quiz/q');
				break;

			case '成績を見る':
			case '終了する':
				Response::redirect('quiz/result');
				break;
		}
	}

	public function action_result()
	{
		$this->template->title = '成績';
		$this->template->contents = View::forge('quiz/result');
		$this->get_statuses();
		$this->template->contents->statuses = $this->statuses;
	}

	private function get_statuses()
	{
		$keys = ['mode', 'progress', 'question_ids', 'result'];
		foreach ($keys as $key)
		{
			$this->statuses[$key] = Session::get_flash($key);
			Session::keep_flash($key);
			if ($this->statuses[$key] === null)
			{
				Response::redirect('quiz');
			}
		}
	}

	private function init_statuses()
	{
		Session::set_flash('progress', 0);
		Session::set_flash('result', []);
		Response::redirect('quiz/q');
	}
}