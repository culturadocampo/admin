
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Vincular Produtos
                </h3>
            </div>
        </div>
    </div>
    <form id="form_vinculo" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
        <div id="vincula_produtos" class="m-portlet__body">	

        </div>
        <br>    
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="m--align-right col-md-12" style="position: initial;">
                        <button id="salvar_vinculo" type="button" class="btn btn-success">Salvar </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function load_form() {
        $("#vincula_produtos").load("form/vincula/produto", {}, function () {
            unblockPage();
        });
    }
    
    function salvar_vinculo(){
        hideNotify();
        blockPage();
        var formData = $("#form_vinculo").serialize();
        
        $.ajax({
            type: "post",
            url: "insert/produto/filiado",
            data: formData,
            success: function (response) {
                lerResposta(response, load_form);
            }
        });
    }

    $(document).ready(function () {  
        blockPage();
        load_form();
        
        $("#salvar_vinculo").on("click", function () {
            salvar_vinculo();
        });
    });
</script>