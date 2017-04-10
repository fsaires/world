 <br>

<?php if(isset($pais)):?>
<div class="alert alert-success" role="alert"><b>Countries / Pa&iacute;s:</b> <?= h($pais->painome); ?></div>
<?php endif; ?>

<?php if(isset($estado)):?>
<div class="alert alert-warning" role="alert"><b>States / Estados:</b> <?= h($estado->estnome); ?></div>
<?php endif; ?>
	
<?php if(isset($cidade)): ?>
<div class="alert alert-info" role="alert"><b>Cities / Cidades:</b> <?= h($cidade->cidnome); ?></div>
<?php endif; ?>