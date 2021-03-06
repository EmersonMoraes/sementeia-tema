
<?php get_header(); ?>
	
<?php if(is_page('movimentos-de-resistencia')): ?>	
	<img class=back_esq src=/wp-content/themes/sementeia-tema/images/mov_resis_esq.png />
	<img class=back_dir src=/wp-content/themes/sementeia-tema/images/mov_resis_dir.png />
<?php endif;
if(is_page('sementes')): ?>	
	<img class=back_esq src=/wp-content/themes/sementeia-tema/images/sementes_esq.png />
	<img class=back_dir src=/wp-content/themes/sementeia-tema/images/sementes_dir.png />
<?php endif ?>	


<div class="content">

	<?php

	if(is_page('sementes')){
		echo '<div class="conteudo-categorias">';
		get_sidebar();
		echo '</div>';
	}
	?>


	<div class="conteudo">
		<?php 
			if(is_page('sementeia')||is_page('sementes')){

					$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' =>'image') );
					if (empty($attachments)) {
						$p = get_page_by_path('circle-images','ARRAY_A');
						$attachments = get_children( array('post_parent' => $p['ID'], 'post_type' => 'attachment', 'post_mime_type' =>'image') );
					}

					$n = rand(0,count($attachments)-1);
					$k = array_keys($attachments);
					$imageUrl = wp_get_attachment_image_src($attachments[$k[$n]]->ID, 'medium');
					$imageLink = get_attachment_link($attachments[$k[$n]]->ID);

			?>
			<div class="circle-image">
				<a href="<?php echo $imageLink; ?>">
					<img src="<?php echo $imageUrl[0]; ?>" />
				</a>
			</div>
				<?php
			}
		?>
					<div class=credits>
						<?php if (isset($attachments)) echo $attachments[$k[$n]]->post_excerpt; ?>
					</div>
				
		<div class="conteudo-titulo"> <div class="titulo"> </div> </div>

		<div class="conteudo-texto">
			<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						the_content();
					}
				}
			?>	

		</div>
		<div class=clear></div>
		
	</div>
	

</div>	 

<?php
	if(is_page('sementeia') || is_page('sementes')){ 
		get_footer();
	};
?>
