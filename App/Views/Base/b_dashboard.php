<!DOCTYPE html>
<html lang="en">

    <?php include 'App/Views/Base/b_head.php'; ?>

    <body class="content-menu pace-done content-menu-close">
        <!-- CONTENT WRAPPER -->
        <div id="app">
            <?php include 'App/Views/Base/b_navbar.php'; ?>

            <div class="content-wrapper">


                <div class="content container-fluid">
                    <section class="page-content container-fluid">
                        <header class="text-center m-b-30 m-t-30">
                            <h1>Olá, o que você está precisando?</h1>
                        </header>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                                <form>
                                    <div class="search-wrapper page-search">
                                        <button class="search-button-submit" type="submit"><i class="icon dripicons-search"></i></button>
                                        <input type="text" class="search-input" placeholder="Digite para localizar...">
                                    </div>
                                </form>
                                <p class="text-center m-t-50">
                                    Ou veja nossos detaques abaixo
                                </p>
                            </div>
                        </div>


                    </section>
                    <section class="page-content container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                <div class="card card-menu">
                                    <div class="card-header">Categorias</div>
                                    <div class="card-body p-10">
                                        <ul class="nav metismenu">
                                            <li class="nav-dropdown">
                                                <a class="has-arrow" href="#" aria-expanded="false"><span>Careais</span></a>
                                                <ul class="collapse nav-sub" aria-expanded="false">
                                                    <li><a href="javascript:void(0)"><span>Dresses</span></a></li>
                                                    <li class=""><a href="javascript:void(0)"><span>Active Wear</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Coats &amp; Jackets</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Shoes</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-dropdown">
                                                <a class="has-arrow" href="#" aria-expanded="false"><span>Frutas</span></a>
                                                <ul class="collapse nav-sub" aria-expanded="false">
                                                    <li><a href="javascript:void(0)"><span>Jeans</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Shirts</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Shorts</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Sneakers</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-dropdown">
                                                <a class="has-arrow" href="#" aria-expanded="false"><span>Hortaliças</span></a>
                                                <ul class="collapse nav-sub" aria-expanded="false">
                                                    <li><a href="javascript:void(0)"><span>Bedding Sets</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Rugs</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Smart Home</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Speakers &amp; Home Audio</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Wall Decor &amp; Mirrors</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-dropdown">
                                                <a class="has-arrow" href="#" aria-expanded="false"><span>Legumes</span></a>
                                                <ul class="collapse nav-sub" aria-expanded="false">
                                                    <li><a href="javascript:void(0)"><span>Bedding Sets</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Rugs</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Smart Home</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Speakers &amp; Home Audio</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Wall Decor &amp; Mirrors</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-dropdown">
                                                <a class="has-arrow" href="#" aria-expanded="false"><span>Outros</span></a>
                                                <ul class="collapse nav-sub" aria-expanded="false">
                                                    <li><a href="javascript:void(0)"><span>Bedding Sets</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Rugs</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Smart Home</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Speakers &amp; Home Audio</span></a></li>
                                                    <li><a href="javascript:void(0)"><span>Wall Decor &amp; Mirrors</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Preço</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="slider-range" class="slider slider-primary"></div>
                                            </div>
                                        </div>
                                        <div class="row slider-labels">
                                            <div class="col-sm-6 caption m-t-15">
                                                <span id="slider-range-value1"></span>
                                            </div>
                                            <div class="col-sm-6 text-right caption  m-t-15">
                                                <span id="slider-range-value2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Subcategorias</div>
                                    <div class="card-body">
                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="regular_xs">
                                            <label class="custom-control-label" for="regular_xs">Regular XS</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="regular_s">
                                            <label class="custom-control-label" for="regular_s">Regular S</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="regular_m">
                                            <label class="custom-control-label" for="regular_m">Regular M</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="regular_l">
                                            <label class="custom-control-label" for="regular_l">Regular L</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="regular_xl">
                                            <label class="custom-control-label" for="regular_xl">Regular XL</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="tall_m">
                                            <label class="custom-control-label" for="tall_m">Tall M</label>
                                        </div>

                                        <div class="custom-control checkbox-primary custom-checkbox m-b-5">
                                            <input type="checkbox" class="custom-control-input " id="tall_l">
                                            <label class="custom-control-label" for="tall_l">Tall L</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-8 col-xl-9 col-xxl-10">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-basket"></i></a></li>

                                            </ul>
                                            <a href="javascript:void(0)">
                                                <img class="card-img-top m-t-30" src="Public/Images/apple_png.png" alt="">
                                            </a>
                                            <div class="card-body p-10">
                                                <div id="product-id_10" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5 m-b-5">Maça nacional</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">R$ 4.00 ~ 4.65 / Kg</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="Public/Images/banana.png" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_25" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Close, Mini, Maxi</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$25.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-left">
                                                <li><span class="badge badge-accent">NEW</span></li>
                                            </ul>
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-57.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_57" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Lake Sunset</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$18.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-42.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_42" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Outta Time</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$22.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-left">
                                                <li><span class="badge badge-accent">NEW</span></li>
                                            </ul>
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <a href="javascript:void(0)">
                                                <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-38.jpeg" alt="">
                                            </a>
                                            <div class="card-body p-10">
                                                <div id="product-id_38" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5 m-b-5">Sleep When You're Dead</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$35.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-32.jpg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_32" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">AMPERSANDS</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$25.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-11.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_11" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Water Life</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$18.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-100.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_100" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Alignment</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$22.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <a href="javascript:void(0)">
                                                <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-101.jpeg" alt="">
                                            </a>
                                            <div class="card-body p-10">
                                                <div id="product-id_101" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5 m-b-5">Minimal Sunset</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$35.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-102.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_102" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">With Purpose</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$25.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-103.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_103" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">The Zone</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$18.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                        <div class="card text-center p-20">
                                            <ul class="actions top-left">
                                                <li><span class="badge badge-accent">NEW</span></li>
                                            </ul>
                                            <ul class="actions top-right">
                                                <li><a href="javascript:void(0)"><i class="icon dripicons-heart"></i></a></li>
                                            </ul>
                                            <img class="card-img-top m-t-30" src="UIKit/dist/assets/img/ecom/product-104.jpeg" alt="">
                                            <div class="card-body p-10">
                                                <div id="product-id_104" class="m-auto"></div>
                                                <h5 class="card-title p-t-20 m-b-5">Mollusca Cephalopoda</h5>
                                                <p class="card-text"><span class="text-muted m-r-5">$22.00</span></p>
                                                <button type="button" class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target=".modal-xl">VER OFERTAS</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
                <!-- SIDEBAR QUICK PANNEL WRAPPER -->
                <aside class="sidebar sidebar-right">
                    <div class="sidebar-content">
                        <div class="tab-panel m-b-30" id="sidebar-tabs">
                            <ul class="nav nav-tabs primary-tabs">
                                <li class="nav-item" role="presentation"><a href="#sidebar-settings" class="nav-link active show" data-toggle="tab" aria-expanded="true">Settings</a></li>
                                <li class="nav-item" role="presentation"><a href="#sidebar-contact" class="nav-link" data-toggle="tab" aria-expanded="true">Contacts</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fadeIn active" id="sidebar-settings">
                                    <div class="sidebar-settings-wrapper">
                                        <h5 class="m-t-30 m-b-20">Colors with dark sidebar</h5>
                                        <div class="row m-0">
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-a.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-a.css">
                                                        <input type="radio" name="setting-theme" checked="checked">
                                                        <span class="icon-check dark"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-a"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-b.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-b.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-b"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-c.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-c.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-c"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-d.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-d.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-d"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-e.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-e.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-e"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-f.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-f.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-f"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-g.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-g.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-g"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-h.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-h.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-h"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="m-t-30 m-b-20">Colors with light sidebar</h5>
                                        <div class="row m-0">
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-i.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-i.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-menu-dark"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-j.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-j.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-j"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-k.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-k.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-k"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-l.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-l.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-l"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-m.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-m.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-m"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-n.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-n.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-n"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-o.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-o.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-o"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-p.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-p.css">
                                                        <input type="radio" name="setting-theme" />
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-p"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="m-t-30 m-b-20">Layouts</h5>
                                        <ul class="list-reset">
                                            <li>
                                                <div class="custom-control custom-radio radio-primary form-check">
                                                    <input type="radio" id="layoutStatic" name="layoutMode" class="custom-control-input" checked="checked" value="">
                                                    <label class="custom-control-label" for="layoutStatic">Static Layout</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio radio-primary form-check">
                                                    <input type="radio" id="layoutFixed" name="layoutMode" class="custom-control-input" value="layout-fixed">
                                                    <label class="custom-control-label" for="layoutFixed">Fixed Layout</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sidebar-contact">
                                    <!--START SEARCH WRAPPER -->
                                    <div class="search-wrapper m-b-30">
                                        <button type="submit" class="search-button-submit"><i class="icon dripicons-search site-search-icon"></i></button>
                                        <input type="text" class="form-control search-input no-focus-border" placeholder="Search contacts...">
                                        <a href="javascript:void(0)" class="close-search-button" data-q-action="close-site-search">
                                            <i class="icon dripicons-cross site-search-close-icon"></i>
                                        </a>
                                    </div>
                                    <!--END START SEARCH WRAPPER -->
                                    <!--START RIGHT SIDEBAR CONTACT LIST -->
                                    <div class="qt-scroll" data-scroll="minimal-dark">
                                        <div class="list-view-group-header">a</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/01.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Abby Pugh</div>
                                                    <div class="list-group-item-text">New York, NY</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/06.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Allison Selleck</div>
                                                    <div class="list-group-item-text">Seattle, WA</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">b</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/07.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Bently Hinton</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/11.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Brad Friedman </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/02.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Boston Nather</div>
                                                    <div class="list-group-item-text">New York, NY</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/16.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Brayan Bunnell</div>
                                                    <div class="list-group-item-text">Seattle, WA</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">c</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/08.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Carter Titchen</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/13.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Carla Fraser </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">d</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/03.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">David Petrie</div>
                                                    <div class="list-group-item-text">New York, NY</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">e</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/12.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Ellie Sweetser</div>
                                                    <div class="list-group-item-text">Seattle, WA</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/09.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Eric Eskridge</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">f</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/04.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Farrah Yulikova</div>
                                                    <div class="list-group-item-text">New York, NY</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/05.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Florence Buren</div>
                                                    <div class="list-group-item-text">Seattle, WA</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/14.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Francesca Koehn </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">g</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/10.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Glynn Slade</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">h</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/14.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Haley Molaroni </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">i</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/07.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Isaac Seldin</div>
                                                    <div class="list-group-item-text">New York, NY</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/13.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Ivy Dancelli</div>
                                                    <div class="list-group-item-text">Seattle, WA</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">j</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/18.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Jax Scharf</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/17.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Jen Pritsinas </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">m</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/20.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Marco Heginbotham</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/21.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Marisa Gelber </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">p</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/22.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Penny Withka</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/23.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Pixie Clayborne </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">s</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/25.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Sheldon Luntz</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/26.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Sam Kendall </div>
                                                    <div class="list-group-item-text">Palo Alto, Ca</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="list-view-group-header">z</div>
                                        <ul class="list-group p-0">
                                            <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                                                <span class="float-left"><img src="UIKit/dist/assets/img/avatars/27.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>
                                                <i class="badge mini success status"></i>
                                                <div class="list-group-item-body">
                                                    <div class="list-group-item-heading">Zack Mohanram</div>
                                                    <div class="list-group-item-text">Denver, CO</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--END RIGHT SIDEBAR CONTACT LIST -->
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- END SIDEBAR QUICK PANNEL WRAPPER -->
            </div>
        </div>
        <!-- END CONTENT WRAPPER -->
        <!-- START VER OFERTAS MODAL -->
        <div class="modal fade modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <div class="text-center">
                                        <figure>
                                            <img class="w-400" src="UIKit/dist/assets/img/ecom/product-66.jpeg" alt="">
                                        </figure>
                                        <ul class="list-reset list-inline-block">
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-65.jpeg" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-66.jpeg" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img class="w-100" src="UIKit/dist/assets/img/ecom/product-67.jpeg" alt=""></a></li>
                                        </ul>
                                    </div>
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
