<?php
   if(isset($_GET['id']) && !empty($_GET['id'])){
       $id_compra = $_GET['id'];
       $id_compra='1000';
       
       $o_compra = new Compras();
       $compra   = $o_compra->select_compra_especificada($id_compra);
       
        if(!$compra){ ?>
           <div class="alert alert-danger" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Número de tratamento não encontrato !</div>
        </div>
       <?php }
   }else{ ?>
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Número de tratamento não encontrato !</div>
        </div>
<?php  }
   
