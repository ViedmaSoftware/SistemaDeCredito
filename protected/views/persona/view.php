<?php
/* @var $this PersonaController */
/* @var $model Persona */
?>

<?php
$this->breadcrumbs=array(
	'Persona'=>array('index'),
	$model->nombre.' '.$model->apellido=>array('view&id='.$model->id),
);

$this->menu=array(
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Modificar Persona', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Persona', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Adminitrar Persona', 'url'=>array('admin')),
	array('label'=>'Agregar Datos Laborales', 'url'=>array('#')),
	array('label'=>'Agregar otra direccion', 'url'=>array("#"), 'linkOptions'=>array('data-toggle'=>'modal', 'data-target'=>"#myModal")),
);
?>

<h1>Detalles de #<?php echo $model->nombre.' '.$model->apellido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nro_documento',
		'apellido',
		'nombre',
                array('label'=>'Fecha de nacimiento','name'=>'xnacimiento'),
		'sexo',
                array('name'=>'id_tipo_documento','value'=>$model->idTipoDocumento->sigla),
                array('name'=>'id_estado_civil','value'=>$model->idEstadoCivil->detalle),
                array(
                    'name'=>'Telefono Fijo',
                    'value'=>$model->contactos[0]->telefono_fijo,
                ),
                
	),
)); ?>

<?php 

/*Ficha de Direcciones*/

echo "<table class='table table-striped' id='tablaDirecciones'>";
echo "<thead>
        <tr>
           <th>Localidad</th>
           <th>Direccion</th>
           <th>Departamento</th>
           <th>Piso</th>
           <th>Escalera</th>
           <th>Tipo Dirección</th>
           <th></th>
       </tr>
      </thead>
      <tbody>";
foreach ($model->personaDireccions as $personaDireccion) {
    
      echo" <tr>
                <td id='localidad'>{$personaDireccion->idDireccion->idLocalidad->nombre}</td>
                <td id='direccion'>{$personaDireccion->idDireccion->nombre} {$personaDireccion->idDireccion->nrocalle} </td>
                <td id='altura'>{$personaDireccion->idDireccion->departamento}</td>
                <td id='altura'>{$personaDireccion->idDireccion->piso}</td>
                <td id='altura'>{$personaDireccion->idDireccion->escalera}</td>
                <td id='tipoDireccion'>{$personaDireccion->idDireccion->idTipoDireccion->detalle}</td>
                
            </tr>";
        
}
echo "</tbody>
     </table>";


/*Fincha de Contactos*/
echo "<table class='table table-striped'>";
echo "<thead>
        <tr>
           <th>Teléfono fijo</th>
           <th>Celular</th>
           <th>Laboral</th>
        </tr>
      </thead>
      <tbody>";
foreach ($model->contactos as $contacto) {
    
      echo" <tr>
                <td>{$contacto->telefono_fijo}</td>
                <td>{$contacto->telefono_movil}</td>
                <td>{$contacto->telefono_laboral}</td>
            </tr>";
        
}
echo "</tbody>
     </table>";

?>

<!-- Modal Formulario Direccion -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Fomulario Direccion</h4>
      </div>
      <div class="modal-body">
         <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'direccion-form',
        'action'=>'/SistemaDeCredito/index.php?r=direccion/createModal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        )); ?>

        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($Direccion); ?>
            
            <?php echo "<input type='hidden' name='Direccion[id_persona]' value='$model->id'>"; ?>
        
            <?php echo $form->textFieldControlGroup($Direccion,'nombre',array('span'=>5,'maxlength'=>35)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'nrocalle',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'escalera',array('span'=>5,'maxlength'=>5,'type'=>'hidden')); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'piso',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'departamento',array('span'=>5,'maxlength'=>5)); ?>
            
            <?php echo $form->dropDownListControlGroup($Direccion, 'id_tipo_direccion', 
                                                CHtml::listData(TipoDireccion::model()->findAll(),'id', 'detalle'),
                                                 array('empty' => 'Seleccionar')
                                             ); ?>
            
            <?php echo $form->dropDownListControlGroup($Direccion, 'id_localidad', 
                                                CHtml::listData(Localidad::model()->findAll(),'id', 'nombre'),
                                                 array('empty' => 'Seleccionar')
                                             ); ?>

        

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar Dirección</button>
        
      </div>
        <?php $this->endWidget(); ?>
    </div>
  </div>
</div>

