<?php
	include_once('clases/producto.php');
	include_once('clases/carrito.php');
	$product = new Product();
	$cart = new Cart();
	if(isset($_GET['action'])){
		switch ($_GET['action']){
			case 'add':
				$cart->add_item($_GET['code'], $_GET['amount']);
			break;
			case 'remove':
				$cart->remove_item($_GET['code']);
			break;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Productos existentes!</title>
	<script type="text/javascript" src="js/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<header class="count-isses">
		<a href="/sistema_recomendation">Intelligent Parking</a>
		<style>
			.count-isses{
				font-size: 27px;
				text-align: center;
				font-family: cambria;
			}
		</style>
	</header>

	<div class="content">
		<table border="1px" cellpadding="5px" width="100%">
			<thead class="cartHeader" display="off">
				<tr>
					<th colspan="6">Mi Carrito Virtual, obten tus beneficios</th>
				</tr>
				<tr>
					<th colspan="3">Total pagar: <?=$cart->get_total_payment();?></th>
					<th colspan="3">Total escogidos: <?=$cart->get_total_items();?></th>
				</tr>
			</thead>
			<tbody class="cartBody">
				<tr>
					<th>Código</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Opción</th>
				</tr>
				<?=$cart->get_items();?>
			</tbody>
		</table>
		<br><br>
		<table border="1px" cellpadding="5px" width="100%">
			<thead class="productsHeader">
				<tr>
					<th colspan="6">Lista de los productos existentes!</th>
				</tr>
				<tr>
					<th>Código</th>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Opción</th>
				</tr>
			</thead>
			<tbody class="productsBody">
				<?=$product->get_products();?>
			</tbody>
		</table>
	</div>

	<span>Regresa a menú de Inicio <a class="btn-regresar-atras" href="/sistema_recomendation">Click aquí</a></span>
		<style>
			.btn-regresar-atras{
				text-decoration: none;
		    padding: 2px;
		    font-weight: 200;
		    font-size: 20px;
		    color: #ffffff;
		    background-color: #1883ba;
		    border-radius: 6px;
		    border: 2px solid #0016b0;
			}
			.btn-regresar-atras:hover{
				color: #1883ba;
    		background-color: #ffffff;
			}
		</style>

</body>
</html>
