<section>
  <div class="container">
   <div class="row">
    <div class="col-sm-9 padding-right">
     <h2 class="title text-center">Pemesanan</h2> 
     <div class="container">
              <div class="row col-md-10  custyle">
                  <table class="table table-striped custab">
                   <thead>
                  
                       <tr>
                           <th>No. Invoice</th>
                           <th>E-mail</th>
                           <th>Nama</th>
                           <th>Telpon</th>
                           <th>Alamat</th>
                           <th>Metode Pembayaran</th>
                           <th>Total</th>
                           <th class="text-center">Status</th>
                       </tr>
                   </thead>

                   <?php foreach($orders as $order){ ?>
                         <tr>
                             <td><?=$order->no_invoice?></td>
                             <td><?=$order->email?></td>
                             <td><?=$order->nama?></td>
                             <td><?=$order->no_telp?></td>
                             <td><?=$order->alamat?></td>
                             <td><?=$order->metode?></td>
                             <td>Rp. <?=$order->total?></td>
                             <td><?=$order->status?></td>
                             <td class="text-center">
                             <?php if($order->status =='unpaid'){ ?>

                             <a class='btn btn-info btn-xs' href="<?php echo site_url()."/Tampil/do_confirm/".$order->no_invoice;?>"> Confirm</a> 

                             <?php } ?>
                             
                             <a href="" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                         </tr>
                         <?php }; ?> 
                  </table>
              </div>
          </div> 
    </div>
   </div>
  </div>
</section>