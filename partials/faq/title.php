
<!-- =======================
Inner intro START -->
<section class="pt-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg-success bg-opacity-10 text-center rounded-3 p-4">
					<h1 class="text-success"><?php echo  get_the_title();?></h1>
					<nav class="d-flex justify-content-center" aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-dots mb-0">
								<?php echo Breadcrumb::get_breadcrumb(); ?>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Inner intro END -->