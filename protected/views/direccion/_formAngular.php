<?php
/* @var $this DireccionController */
/* @var $model Direccion */
/* @var $form TbActiveForm */
?>

<div class="form-control">
    <input type="text" class='form-control' ng-model="nuevaDireccion.nombre" placeholder="Nombre de la calle">
    <input type="text" ng-model="nuevaDireccion.nrocalle" placeholder="Altura">
    <input type="text" ng-model="nuevaDireccion.escalera" placeholder="Escalera">
    <input type="text" ng-model="nuevaDireccion.piso" placeholder="Piso">
    <input type="text" ng-model="nuevaDireccion.departamento" placeholder="Departamento">
    <input type="text" ng-model="nuevaDireccion.id_tipo_direccion" placeholder="Tipo Direccion">
    <input type="text" ng-model="nuevaDireccion.id_localidad" placeholder="Localidad">
    <input type="hidden" ng-model="nuevaDireccion.id_persona" value="<?php if(isset($model->id)){echo $model->id;}?>">
    
</div><!-- form -->