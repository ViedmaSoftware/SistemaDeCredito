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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/angular.min.js"></script>
<div ng-app="myApp" ng-controller="myCtrl">
    
    <table class='table table-striped' id='tablaDirecciones'>
        <thead>
            <tr>
               <th>Localidad</th>
               <th>Direccion</th>
               <th>Departamento</th>
               <th>Piso</th>
               <th>Escalera</th>
               <th>Tipo Dirección</th>
           </tr>
        </thead>
        <tbody>
            <tr ng-repeat="direccion in direcciones">
                <td>{{direccion.id_localidad}}</td>
                <td>{{direccion.nombre+' '+direccion.nrocalle}}</td>
                <td>{{direccion.departamento}}</td>
                <td>{{direccion.piso}}</td>
                <td>{{direccion.escalera}}</td>
                <td>{{direccion.idTipoDireccion.detalle}}</td>
                <td>
                    
                    <button class="btn btn-warning" ng-click="modificarDireccion(direccion)" data-toggle="modal" data-target="#myModal"><i class="icon-pencil"></i></button>
                    <button class="btn btn-warning" ng-click="borrarDireccion(direccion)"><i class="icon-trash"></i></button>
                </td>
            </tr>
        
        </tbody>
     </table>

    
    <!-- Modal Formulario Direccion -->
  <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" ng-click="cancelar()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Fomulario Direccion</h4>
        </div>
        <div class="modal-body">
           
           
            <div class="form-control">
                <input type="text" ng-model="nuevaDireccion.nombre" placeholder="Nombre de la calle">
                <input type="text" ng-model="nuevaDireccion.nrocalle" placeholder="Altura">
                <input type="text" ng-model="nuevaDireccion.escalera" placeholder="Escalera">
                <input type="text" ng-model="nuevaDireccion.piso" placeholder="Piso">
                <input type="text" ng-model="nuevaDireccion.departamento" placeholder="Departamento">
                <input type="text" ng-model="nuevaDireccion.id_tipo_direccion" placeholder="Tipo Direccion">
                <input type="text" ng-model="nuevaDireccion.id_localidad" placeholder="Localidad">
                <input type="hidden" ng-model="nuevaDireccion.id_persona" value="{{nuevaDireccion.id_persona=<?php if(isset($model->id)){echo $model->id;}?>}}">

            </div><!-- form -->
        </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" ng-click="cancelar()" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" ng-show="agregando" ng-click="" data-dismiss="modal">Agregar Dirección</button>
          <button type="button" class="btn btn-success" ng-hide="agregando" ng-click="" data-dismiss="modal">Guardar Modificacion</button>
          
        </div>
      </div>
    </div>
  </div> <!--Cierre del formulario Modal-->
  
</div> <!--Cierre de Angular-->

<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
    $scope.agregando=true;
    $http.get("<?php echo $this->createUrl('obtenerDirecciones',array('id'=>$model->id)); ?>").then(function(response){
        $scope.direcciones = response.data;
    });
    
   
    
    //$scope.nuevaDireccion = {nombre:'',nrocalle:'',escalera:'',piso:'',departamento:'',id_tipo_direccion:'',id_localidad:''};
    //$scope.direcciones = [{nombre:'calleangular',nrocalle:'333',escalera:'',piso:'',departamento:'',id_tipo_direccion:'1',id_localidad:1}];
    
    
    $scope.agregarDireccion = function (){
        //$scope.id_persona=<?php //echo $model->id;?>;
        //$scope.data = [{$scope.nuevaDireccion},{$scope.nuevaDireccion}];
        $http.post("<?php echo $this->createUrl('agregarDireccion'); ?>",$scope.nuevaDireccion).then(function(response){
            $scope.direcciones.push(response.data);
        });
        //alert('agregamos');
        
        
        
    };
    
    $scope.borrarDireccion = function (direccion){
        //alert('borramos');
        $http.post("<?php echo $this->createUrl('borrarDireccion'); ?>",direccion).then(function(response){
            
            $scope.direcciones = $scope.direcciones.filter(function(item){
                return item.id!==direccion.id;
            });
        });
        
        
    };
    
    $scope.modificarDireccion = function (direccion){
        //alert('modificamos');
        $scope.agregando = false;
        angular.copy(direccion,$scope.nuevaDireccion); 
        
    };
    
    $scope.guardarDireccion = function (){
        //$scope.id_persona=<?php //echo $model->id;?>;
        //$scope.data = [{$scope.nuevaDireccion},{$scope.nuevaDireccion}];
        $http.post("<?php echo $this->createUrl('guardarDireccion'); ?>",$scope.nuevaDireccion).then(function(response){
            
            $scope.nuevaDireccion = {};
            angular.forEach($scope.direcciones, function(item){
                if(item.id==response.data.id){
                    angular.copy(response.data,item);
                }
            });
            $scope.agregando = true;
            
           /* $scope.direcciones = $scope.direcciones.filter(function(item){
                return item.id!==response.data.id;
            });
            
            $scope.direcciones.push(response.data);*/
            
            
            //alert('guardamos');
        });
        //alert('agregamos');
        
        
        
    };
    
    $scope.cancelar = function (){
        //alert('cancelamos');
        $scope.agregando = true;
        $scope.nuevaDireccion = {};
        
    };
    
});
</script>
