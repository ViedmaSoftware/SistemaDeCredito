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
	array('label'=>'Agregar otra direccion', 'url'=>array('#')),
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

<?php /*$this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'fixedHeader' => true,
    'headerOffset' => 40,
    'type' => 'striped',
    'dataProvider' => Contacto::model()->search(),
    'responsiveTable' => true,
    'template' => "{items}",
    'columns'=>array(
		'id',
		'telefono_fijo',
		'telefono_movil',
		'telefono_laboral',
		'correo_electronico',
		'pagina_web',
		/*
		'id_persona',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
));*/

/*Fincha de Direcciones*/
echo "<table class='table table-striped'>";
echo "<thead>
        <tr>
           <th>Localidad</th>
           <th>Direccion</th>
           <th>Tipo Dirección</th>
        </tr>
      </thead>
      <tbody>";
foreach ($model->personaDireccions as $personaDireccion) {
    
      echo" <tr>
                <td>{$personaDireccion->idDireccion->idLocalidad->nombre}</td>
                <td>{$personaDireccion->idDireccion->nombre} {$personaDireccion->idDireccion->nrocalle}</td>
                <td>{$personaDireccion->idDireccion->idTipoDireccion->detalle}</td>
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