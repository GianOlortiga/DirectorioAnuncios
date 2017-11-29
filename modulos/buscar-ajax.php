<?
$query = mysql_query("SELECT * FROM anuncios LIMIT 10");
	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['titulo'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
		?>	
		
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$("#buscar").autocomplete({
			source: availableTags
		});
	});
	</script>