<form id="form_login" class="sign-in-form">
    <div class="card">
        <div class="card-body">
            <a href="index.html" class="brand text-center d-block m-b-20">
                <img src="UIKit/dist/assets/img/qt-logo@2x.png" alt="QuantumPro Logo" />
            </a>
            <h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="usuario" class="form-control" placeholder="Email address" required="">
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="senha" class="form-control" placeholder="Password" required="">
            </div>
            <div class="checkbox m-b-10 m-t-20">
                <div class="custom-control custom-checkbox checkbox-primary form-check">
                    <input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
                    <label class="custom-control-label" for="stateCheck1">	Remember me</label>
                </div>
                <a href="auth.forgot-password.html" class="float-right">Forgot Password?</a>
            </div>
            <button id="submit_login" class="btn btn-primary btn-floating btn-lg btn-block" type="button">Sign In</button>
            <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="#"> Create an account</a></p>
        </div>

    </div>
</form>


<script>
    $(document).ready(function () {
        $('#submit_login').on('click', function () {
            var formData = $("#form_login").serialize();
            $.ajax({
                type: "post",
                url: "do-login",
                data: formData,
                dataType: "json",
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        alert("Ok!");
                    } else {
                        swal({
                            type: 'error',
                            title: response.message,
                            text: 'Verifique e tente novamente'
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