<?php if (isset($error)): ?>
<h3 class="red-text">エラー</h3>
<?= Html::ul((array) $error, ['class' => 'red-text']); ?>
<?php endif; ?>
<?= Form::open(); ?>
<div class="row">
	<div class="col s12 input-field"><?= Form::submit('mode', 'テストモード', ['class' => 'btn']); ?></div>
	<div class="col s12 input-field"><?= Form::submit('mode', 'とことんモード', ['class' => 'btn']); ?></div>
	<div class="col s12 input-field"><?= Form::submit('mode', '苦手克服モード', ['class' => 'btn']); ?></div>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>