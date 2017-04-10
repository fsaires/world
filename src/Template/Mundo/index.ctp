<br>

<div class="container">
	<div class="panel panel-primary">
	     <div class="panel-heading"><h2>World ::: Countries - States - Cities</h2></div>
	     <table class="table">
	        <tr>
	            <td>
					<div class="row">
					    <div class="col-xs-10">
					    	<?= $this->Html->image('world.jpg', ['alt' => 'World', 'width'=>'600', 'height'=>'300','class'=>'img-responsive']); ?>
					    	<?= $this->Form->create($mundo,['url' => ['controller' => 'Mundo', 'action' => 'showDados']]); ?>
					        <?= $this->Form->input('paiid', ['options'=>$paises,'empty'=>'Selecione o Pa&iacute;s','label'=>'Countries / Pa&iacute;s:', 'escape'=>false, 'onchange'=>'atualizaEstado();']); ?>
					        <?= $this->Form->input('estid', ['options'=>$estados,'empty'=>'Selecione o Estado','label'=>'States / Estados:', 'escape'=>false, 'onchange'=>'atualizaCidade();']); ?>
					        <?= $this->Form->input('cidid', ['options'=>$cidades,'empty'=>'Selecione a Cidade','label'=>'Cities / Cidades:', 'escape'=>false]); ?>
						    <?= $this->Form->button('Enviar',['class'=>'btn btn-primary pull-right','type'=>'button','onclick'=>'showDados();']); ?>
					    	<?= $this->Form->end(); ?>
						</div>
					</div>	            	
	            </td>
	            <td>
					<div class="row">
						<div class="col-xs-10">
							<div class="page-header">
								<h2>Results / Resultados</h2>
							</div>
							<div id="divDados"></div>
						</div>
					</div>	            	
	            </td>
	        </tr>
	     </table>
	</div>
</div>
