<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Update Produk</h2>	
						<!--Form input barang-->
							<div class="container signup-form" style="margin: 10px;">
							    <form role="form" action="#" method="post" enctype="multipart/form-data" >
							    <?php foreach($data as $datas){ ?>
							        <div class="form-group">
							          	<div class="col-md-2"><label for="kode_produk" >Kode Produk</label></div><!--DISINIIIII	-->
							            <div class="col-md-6">
							                <input type="text" class="form-control" nama="kode_produk" value="<?=$datas->kode_produk?>">
							            </div> 
							            <div class="col-md-12"></div>
							        </div>
							        
							        <div class="form-group">
							         	<div class="col-md-2"><label for="nama_produk">Nama Produk</label></div>
							            <div class="col-md-6">
							                  <input type="text" class="form-control" nama="nama_produk" placeholder="Masukkan Nama Produk">
							            </div>
							            <div class="col-md-12"></div>
							        </div>
							         
							        <div class="form-group">
							            <div class="col-md-2"><label for="kategori">Kategori </label></div>
							                <div class="col-md-6">
							            		<select name="kategori"  class="form-control">
							                    	<option>--Silahkan pilih--</option>
							                    	<option>Pria</option>
							                    	<option>Wanita</option>
							                    	<option>Aksesoris</option>
							                	</select>
							            	</div>
							            <div class="col-md-12"></div>
							        </div>
							          
							        <div class="form-group">
							        	<div class="col-md-2"><label for="harga_produk">Harga Produk </label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" nama="harga_produk" placeholder="Masukkan Harga Produk">
							            </div>
							            <div class="col-md-12"></div>
							        </div>

							        <div padding="3px" class="form-group">
							        	<div class="col-md-2"><label for="uploadimage">Upload Image </label></div>
							            <div class="col-md-6">
							                <input type="file" name="uploadimage" id="uploadimage">
							                <p class="help-block"> Allowed formats: jpeg, jpg, gif, png </p>
							            </div>
							            <div class="col-md-12"></div>
							        </div>
							          
							        <div class="form-group">
							            <div class="col-md-2"><label for="deskripsi">Deskripsi</label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" nama="deskripsi" placeholder="Deskripsi Produk">
							            </div>
							            <div class="col-md-12">
							         </div>

							        <div class="form-group">
							            <div class="col-md-2"><label for="stok">Stok</label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" nama="stok" placeholder="Stok Produk">
							            </div>
							            <div class="col-md-12">
							        </div>
							   		<?php }; ?>	
							            <div class="row">
							              <div class="col-md-6"></div>
							              <div class="col-md-6">
							                <button type="submit" class="btn btn-info">UPDATE</button>
							              </div>
							            </div>
							    </form>
							</div>
							<!--End Form input barang-->
					</div>
				</div>
			</div>
		</div>
</section>