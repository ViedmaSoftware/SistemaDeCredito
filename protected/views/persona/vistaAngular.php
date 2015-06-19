
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>




<div ng-app="myApp" ng-controller="myCtrl">

First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
<span>Full Name: {{firstName + " " + lastName}}</span>

<button ng-click="alerta(firstName)">accion</button>

<select>
    <option ng-repeat="opcion in opciones" value="{{opcion}}">{{opcion}}</option>
</select>
</div>

<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
    $http.get("index.php?r=persona/opciones").then(function(response){
        //$scope.opciones = response.data;
    });
    $scope.firstName= "John";
    $scope.lastName= "Doe";
    $scope.opciones=opciones;
    $scope.alerta= function (valor){
        alert(valor)
    };
});
</script>