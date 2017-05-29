<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Update Produk</h2>	
						<!--Form input barang-->
							<div class="container signup-form" style="margin: 10px;">
							    <form role="form" action="<?php echo site_url('tampil/do_updateproduct')?>" method="post" enctype="multipart/form-data" >
							        <div class="form-group">
							          	<div class="col-md-2"><label for="kode_produk" >Kode Produk</label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" name="kode_produk" value="<?php echo $kode_produk; ?>" readonly>
							            </div> 
							            <div class="col-md-12"></div>
							        </div>
							        
							        <div class="form-group">
							         	<div class="col-md-2"><label for="nama_produk">Nama Produk</label></div>
							            <div class="col-md-6">
							                  <input type="text" class="form-control" name="nama_produk" value="<?php echo $nama_produk; ?>">
							            </div>
							            <div class="col-md-12"></div>
							        </div>
							         
							        <div class="form-group">
							            <div class="col-md-2"><label for="kategori">Kategori </label></div>
							                <div class="col-md-6">
							            		<select name="kategori"  class="form-control">
							                    	<option>--Silahkan pilih--</option>
							                    	<option value="Pria"<?=$kategori == 'Pria' ? ' selected="selected"' : '';?>>Pria</option>
							                    	<option value="Wanita"<?=$kategori == 'Wanita' ? ' selected="selected"' : '';?>>Wanita</option>
							                    	<option value="Aksesoris"<?=$kategori == 'Aksesoris' ? ' selected="selected"' : '';?>>Aksesoris</option>
							                	</select>
							            	</div>
							            <div class="col-md-12"></div>
							        </div>
							          
							        <div class="form-group">
							        	<div class="col-md-2"><label for="harga_produk">Harga Produk </label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" name="harga_produk" value="<?php echo $harga_produk; ?>">
							            </div>
							            <div class="col-md-12"></div>
							        </div>

							        <div padding="3px" class="form-group">
							        	<div class="col-md-2"><label for="uploadimage">Upload Image </label></div>
							            <div class="col-md-6">
							            	<img src="<?php echo base_url('upload/'.$gambar) ?>" alt="" width="268" height="249" />
							                <input type="file" name="uploadimage" id="uploadimage">
							                <p class="help-block"> Allowed formats: jpeg, jpg, gif, png </p>
							            </div>
							            <div class="col-md-12"></div>
							        </div>
							          
							        <div class="form-group">
							            <div class="col-md-2"><label for="deskripsi">Deskripsi</label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>">
							            </div>
							            <div class="col-md-12">
							         </div>

							        <div class="form-group">
							            <div class="col-md-2"><label for="stok">Stok</label></div>
							            <div class="col-md-6">
							                <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
							            </div>
							            <div class="col-md-12">
							        </div>
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