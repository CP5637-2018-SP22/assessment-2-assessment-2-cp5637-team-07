<section data-customizer-section-id="portum_repeatable_section" data-section="0">
	<div class="ewf-section-visible section-slider" >
		<div class="main-slider owl-carousel owl-theme" data-slider-autoplay="true"
		     data-slider-loop="true"
		     data-slider-enable-pager="true">
							<div class="item">
											<img src="https://colorlib.com/portum/wp-content/themes/portum/assets/images/slider-img-01.jpg" alt="" />
										<div class="slider-details">
													<h1>Growing your business</h1>
																			<span>From <strong>ZERO</strong> to <strong>HERO</strong> along with you</span>
											</div>
				</div>
							<div class="item">
											<img src="https://colorlib.com/portum/wp-content/themes/portum/assets/images/slider-img-02.jpg" alt="" />
										<div class="slider-details">
													<h1>Maintainang the business</h1>
																			<span>Take your<strong>TIME</strong> and <strong>grow and grow</strong> your business</span>
											</div>
				</div>
							<div class="item">
											<img src="https://colorlib.com/portum/wp-content/themes/portum/assets/images/slider-img-03.jpg" alt="" />
										<div class="slider-details">
													<h1>Apogee of the business</h1>
																			<span>From <strong>ZERO</strong> to <strong>HERO</strong> along with you</span>
											</div>
				</div>
					</div>
						<ul class="pager-slider clearfix pager-items-03">
										<li class="active">
					<a href="#"><strong>01</strong> Growing your business					</a>
				</li>
											<li>
					<a href="#"><strong>02</strong> Maintainang the business					</a>
				</li>
											<li>
					<a href="#"><strong>03</strong> Apogee of the business					</a>
				</li>
									</ul>
			</div>
</section>




			$image_slider_description = get_bloginfo( 'description', 'display' );
			if ( $image_slider_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $image_slider_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			
			
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'image-slider' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->