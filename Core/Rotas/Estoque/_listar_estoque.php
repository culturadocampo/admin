<?php

?>

    <!--begin: Datatable -->
    <table class="table table-bordered table-hover table-bordered" id="estoque_table">
        <thead>
            <tr>
                <th class="text-center">Cod. produto</th>
                <th class="text-center">Produto</th>
                <th class="text-center">Quantidade</th>
                <th class="text-center">Valor uni.</th>
                <th class="text-center">Tipo uni.</th>
                <th class="text-center">Ações. </th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td class="text-center">  

                    </td>
                    <td class="text-center">  
                        <p>  </p>
                    </td>
                    <td class="text-center">  
                       <p>  </p>
                    </td>
                    <td class="text-center">  
                        <p> </p>
                    </td>
                    <td class="text-center">  
                       <p>  </p>
                    </td>
                    <td class="text-center">  
                       <p>  </p>
                    </td>
                </tr>
        </tbody>
    </table>
       
<script>
    $(document).ready(function () {
          $('#estoque_table').DataTable({
            "order": [],
            "paging": true,
            pageLength: 30
        });
    });
</script>
