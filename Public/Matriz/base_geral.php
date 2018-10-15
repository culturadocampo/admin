<!DOCTYPE html>
<html lang="en">
    <?php include 'Public/Matriz/Includes/b_head.php'; ?>

    <body class="overlay-menu layout-fixed  animated fadeIn">
        <!-- CONTENT WRAPPER -->
        <div id="app">

            <div class="content-wrapper">
                <?php include 'Public/Matriz/Includes/b_navbar.php'; ?>

                <?php include $conteudo; ?>

                        <?php include 'Public/Matriz/Includes/b_aside.php'; ?>

            </div>
        </div>
        <!-- END CONTENT WRAPPER -->
        <!-- START QUICK VIEW MODAL -->
        <div class="modal fade modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="zmdi zmdi-close"></span>
                        </button>
                    </div>
                    <div class="card no-shadow">
                        <div class="card-body p-t-0">
                            <div class="row">
                                <div class="col-sm-6">
                                    <section class="text-center">
                                        <figure>
                                            <img class="w-400" src="UIKit/dist/assets/img/ecom/product-66.jpeg" alt="">
                                        </figure>
                                        <ul class="list-reset list-inline-block">
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-65.jpeg" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-66.jpeg" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-67.jpeg" alt=""></a></li>
                                        </ul>
                                    </section>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-title font-size-30">Pixel Heart</h2>
                                    <div id="product-id_65" class="m-t-10 m-b-10"></div>
                                    <p class="card-text font-size-18">$35.00</p>
                                    <p class="card-text p-20 bg-light">Everyday carry consectetur ennui est swag, meh ut. Chicharrones roof party ea try-hard celiac sustainable poutine cred. Art party vape thundercats irony, pug man braid raw denim chambray. Gochujang tofu shoreditch meh next level fingerstache farm-to-table
                                        flannel heirloom glossier.
                                    </p>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Size</label>
                                            <select class="form-control w-200" id="exampleFormControlSelect1">
                                                <option value="">Select a size...</option>
                                                <option value="">XS</option>
                                                <option value="">S</option>
                                                <option value="">M	</option>
                                                <option value="">L</option>
                                                <option value=""> XL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Color</label>
                                            <div class="color-pick">
                                                <button type="button" class="swatch swatch-color_gray-200 "></button>
                                                <button type="button" class="swatch swatch-color_danger"></button>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <button type="button" class="btn btn-primary btn-rounded btn-lg w-250 m-b-20"><span>Add to Cart</span> <i class="icon dripicons-cart text-white"></i></button>
                                            <button type="button" class="btn btn-light btn-rounded btn-lg w-250 m-b-20"><span>Add to Wishlist</span> <i class="icon dripicons-heart"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
        <script src="UIKit/dist/assets/vendor/modernizr/modernizr.custom.js"></script>
        <script src="UIKit/dist/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="UIKit/dist/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="UIKit/dist/assets/vendor/js-storage/js.storage.js"></script>
        <script src="UIKit/dist/assets/vendor/js-cookie/src/js.cookie.js"></script>
        <script src="UIKit/dist/assets/vendor/pace/pace.js"></script>
        <script src="UIKit/dist/assets/vendor/metismenu/dist/metisMenu.js"></script>
        <script src="UIKit/dist/assets/vendor/switchery-npm/index.js"></script>
        <script src="UIKit/dist/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
        <script src="UIKit/dist/assets/vendor/wNumb/wNumb.js"></script>
        <script src="UIKit/dist/assets/vendor/noUiSlider/nouislider.min.js"></script>
        <script src="UIKit/dist/assets/vendor/rateYo/jquery.rateyo.min.js"></script>
        <!-- ================== GLOBAL APP SCRIPTS ==================-->
        <script src="UIKit/dist/assets/js/global/app.js"></script>
        <!-- ================== PAGE LEVEL APP SCRIPTS ==================-->
        <script src="UIKit/dist/assets/js/components/ecom-dashboard-slider-init.js"></script>
        <script src="UIKit/dist/assets/js/components/rateYo-init.js"></script>
    </body>

</html>
