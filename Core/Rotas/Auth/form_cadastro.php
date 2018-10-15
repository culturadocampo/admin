<form id="form_cadastro" class="sign-in-form  animated jackInTheBox">
    <div class="card">
        <div class="card-body">
            <a href="index.html" class="brand text-center d-block m-b-20">
                <img src="UIKit/dist/assets/img/qt-logo@2x.png" alt="QuantumPro Logo" />
            </a>
            <h5 class="sign-in-heading text-center m-b-20" style="font-weight: bold!important; font-size: 24px;">Criar uma conta</h5>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Seu nome</label>
                <input name="nome" type="text" id="inputName" class="form-control" placeholder="Nome completo" required="">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" required="">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Usuário</label>
                <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Crie um usuário" required="">
            </div>
            <div class="form-group">
                <input name="senha" type="password" class="form-control" id="exampleInputHelp3" placeholder="Crie uma senha">
                <small class="form-text text-muted text-center">Ao menos 6 caracteres, sem espaços.</small>

            </div>
            <div class="form-group">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirme sua senha" required="">
            </div>
            <div class="checkbox m-b-10 m-t-15">
                <div class="custom-control custom-checkbox checkbox-primary form-check">
                    <input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
                    <label class="custom-control-label" for="stateCheck1">I accept the <a href="javascript:void(0)">terms and conditions</a></label>
                </div>
            </div>
            <button id="submit_cadastro" class="btn btn-primary btn-block" type="button">Criar minha conta</button>

            <p class="text-muted m-t-25 m-b-0 p-0 text-center">Já possui uma conta?<a href="login"> Entre agora</a></p>
        </div>
    </div>
</form>


<script>
    $(document).ready(function () {
        $('#submit_cadastro').on('click', function () {
            var formData = $("#form_cadastro").serialize();
            $.ajax({
                type: "post",
                url: "executa-cadastro-usuario",
                data: formData,
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {

                    } else {
                        swal({
                            type: 'warning',
                            title: 'Alerta',
                            text: response.message
                        });
                    }
                },
                error: function (error) {
                    swal({
                        type: 'error',
                        title: 'Resposta inesperada',
                        text: 'Entre em contato com o supoorte (COD: L001)'
                    });
                }
            });
        });
    });
</script>