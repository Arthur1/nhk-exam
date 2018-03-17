<?php if(isset($error)): ?>
<h3 class="red-text">エラー</h3>
<?= Html::ul((array) $error, ['class' => 'red-text']); ?>
<?php endif; ?>
<?php if ($statuses['result'][$statuses['progress']]): ?>
<h1>正解</h1>
<?php else: ?>
<h1>不正解</h1>
<?php endif; ?>
<h2>解答</h2>
<p><?= $quiz_data['answer']; ?></p>
<h2>解説</h2>
<p><?= nl2br($quiz_data['comment']); ?></p>

<?= Form::open(); ?>
<div class="row">
	<?php if ($statuses['progress'] + 1 >= count($statuses['question_ids'])): ?>
	<div class="col s12 input-field"><?= Form::submit('submit', '成績を見る', ['class' => 'btn']); ?></div>
	<?php else: ?>
	<div class="col s12 input-field"><?= Form::submit('submit', '次の問題へ', ['class' => 'btn']); ?></div>
	<div class="col s12 input-field"><?= Form::submit('submit', '終了する', ['class' => 'btn']); ?></div>
	<?php endif; ?>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>