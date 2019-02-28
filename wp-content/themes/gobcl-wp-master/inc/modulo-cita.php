<?php
	$cita_destacada = gobcl_get_option('_gobcl_cita_destacada');
?>
<div id="cita-destacada">
	<div class="bicolor">
		<span class="azul"></span>
		<span class="rojo"></span>
	</div>
	<div class="left">
		<div class="texto">
			<span class="nombre"><?php echo $cita_destacada[0]['autor_cita'] ?></span>
			<span class="descripcion"><?php echo $cita_destacada[0]['cargo_autor_cita'] ?></span>
			<!-- <span class="usuario"><a href="#">@alvaroelizalde</a></span> -->
		</div>
	</div>
	<div class="right">
		<div class="texto">
			<?php echo $cita_destacada[0]['texto_cita'] ?>
		</div>
		<span class="fecha">

			<?php echo ($cita_destacada[0]['url_cita'] ? '<a href="'. $cita_destacada[0]['url_cita'] .'">' : '') ?>
				<?php echo $cita_destacada[0]['info_cita'] ?>
				<?php echo ($cita_destacada[0]['url_cita'] ? '</a>' : '') ?>
		</span>
	</div>
	<div class="clearfix"></div>
</div>