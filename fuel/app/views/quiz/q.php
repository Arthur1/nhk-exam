<?php if (isset($error)): ?>
<h3 class="red-text">エラー</h3>
<?= Html::ul((array) $error, ['class' => 'red-text']); ?>
<?php endif; ?>
<h1>第<?= $statuses['progress'] + 1; ?>問</h1>
<p>
	<?= nl2br($quiz_data['question']); ?>
</p>
<?= Form::open(); ?>
<div class="row">
	<?php if (count($answer_list) <= 2): ?>
	<div class="col s12 input-field">
		<?= Form::submit('answer', '○', ['class' => 'btn']); ?>
	</div>
	<div class="col s12 input-field">
		<?= Form::submit('answer', '✕', ['class' => 'btn']); ?>
	</div>
	<?php else: ?>
	<?php foreach ($answer_list as $answer): ?>
	<div class="col s12 input-field">
		<?= Form::submit('answer', $answer, ['class' => 'btn']); ?>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>