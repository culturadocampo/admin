
<section class="page-content animated ">
    <div class="col-md-12 ">
        <div  id="tabela_rotas">

        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        load_rotas();
        function load_rotas() {
            $("#tabela_rotas").load("sistema/rotas-de-acesso/_tabela_rotas");
        }
    });
</script>