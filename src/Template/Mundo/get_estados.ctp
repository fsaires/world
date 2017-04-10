<?= $this->Form->input('estid', ['options'=>$estados,'empty'=>'Selecione o Estado','label'=>'Estados:', 'escape'=>false, 'onchange'=>'atualizaCidade();']); ?>
