<h1>成績</h1>
<h2>モード</h2>
<?= $statuses['mode']; ?>
<h2>正答率</h2>
<?php
$correct = 0;
foreach ($statuses['result'] as $value)
{
	if ($value === true)
	{
		$correct++;
	}
}
?>
<?= $correct; ?> / <?= count($statuses['result']); ?>問 (<?= $correct / count($statuses['result']) * 100; ?>%)
<div class="row">
	<div class="col s12 input-field">
		<?= Html::anchor('quiz', 'モード選択に戻る', ['class' => 'btn']); ?>
	</div>
</div>