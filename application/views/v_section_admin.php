<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php foreach($products as $product){ ?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('upload/'.$product->gambar) ?>" alt="" width="268" height="249" />
											<h2>Rp. <?=$product->harga_produk?></h2>
											<p><?=$product->nama_produk?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?=$product->harga_produk?></h2>
												<p><?=$product->nama_produk?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
							</div>
						</div>

						<?php }; ?>						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>