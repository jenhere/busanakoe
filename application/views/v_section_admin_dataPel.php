<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<h2 class="title text-center">Data Pelanggan</h2>	
					<div class="container">
						<div class="row col-md-9  custyle">
						    <table class="table table-striped custab">
						        <thead>
						        	<tr>
						                <th>Nama</th>
						                <th>No Handphone</th>
						                <th>E-mail</th>
						                
						            </tr>
						        </thead>

						            <?php foreach($products as $product){ ?>
						            <tr>
						                <td><?=$product->nama?></td>
						                <td><?=$product->no_hp?></td>
						                <td><?=$product->email?></td>
						                
						            </tr>
						            <?php }; ?>	

						    </table>
						</div>
					</div>	
				</div>
			</div>
		</div>
</section>