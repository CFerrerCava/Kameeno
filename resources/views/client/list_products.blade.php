@extends('layouts.design')
@section('title') Productos PollitoFast @endsection


@section('content')
<section id="page-title" class="page-title page-title-layout6 text-center bg-overlay bg-overlay-2 bg-parallax">
    <div class="bg-img"><img src="assets/images/backgrounds/14.jpg" alt="background"></div>
    <svg class="pagetitle__divider-shape" xmlns="http://www.w3.org/2000/svg" width="22" height="61"
      viewBox="0 0 22 61">
      <path
        d="M799,769h2v61h-2V769Zm8,24.8a0.969,0.969,0,0,0-1.911,0,3.012,3.012,0,0,1-.883,2.16,4.486,4.486,0,0,0,0,6.136,3.083,3.083,0,0,1,0,4.32,4.486,4.486,0,0,0,0,6.136,3.088,3.088,0,0,1,0,4.325,4.5,4.5,0,0,0,0,6.142,3.014,3.014,0,0,1,.884,2.163,0.969,0.969,0,0,0,1.911,0,4.414,4.414,0,0,0-1.213-3.07,3.091,3.091,0,0,1,0-4.328,4.491,4.491,0,0,0,0-6.14,3.08,3.08,0,0,1,0-4.319,4.488,4.488,0,0,0,0-6.137,3.081,3.081,0,0,1,0-4.32A4.407,4.407,0,0,0,807,793.8Zm0-20a0.969,0.969,0,0,0-1.911,0,3.014,3.014,0,0,1-.883,2.16,4.486,4.486,0,0,0,0,6.136,3.083,3.083,0,0,1,0,4.32,4.488,4.488,0,0,0,0,6.137,3.087,3.087,0,0,1,0,4.324,4.5,4.5,0,0,0,0,6.142,3.014,3.014,0,0,1,.884,2.163,0.969,0.969,0,0,0,1.911,0,4.414,4.414,0,0,0-1.213-3.07,3.089,3.089,0,0,1,0-4.327,4.491,4.491,0,0,0,0-6.14,3.081,3.081,0,0,1,0-4.32,4.488,4.488,0,0,0,0-6.137,3.081,3.081,0,0,1,0-4.32A4.409,4.409,0,0,0,807,773.8ZM793,793.8a0.969,0.969,0,0,1,1.911,0,3.012,3.012,0,0,0,.883,2.16,4.486,4.486,0,0,1,0,6.136,3.083,3.083,0,0,0,0,4.32,4.486,4.486,0,0,1,0,6.136,3.088,3.088,0,0,0,0,4.325,4.5,4.5,0,0,1,0,6.142,3.014,3.014,0,0,0-.884,2.163,0.969,0.969,0,0,1-1.911,0,4.414,4.414,0,0,1,1.213-3.07,3.091,3.091,0,0,0,0-4.328,4.491,4.491,0,0,1,0-6.14,3.08,3.08,0,0,0,0-4.319,4.488,4.488,0,0,1,0-6.137,3.081,3.081,0,0,0,0-4.32A4.407,4.407,0,0,1,793,793.8Zm0-20a0.969,0.969,0,0,1,1.911,0,3.014,3.014,0,0,0,.883,2.16,4.486,4.486,0,0,1,0,6.136,3.083,3.083,0,0,0,0,4.32,4.488,4.488,0,0,1,0,6.137,3.087,3.087,0,0,0,0,4.324,4.5,4.5,0,0,1,0,6.142,3.014,3.014,0,0,0-.884,2.163,0.969,0.969,0,0,1-1.911,0,4.414,4.414,0,0,1,1.213-3.07,3.089,3.089,0,0,0,0-4.327,4.491,4.491,0,0,1,0-6.14,3.081,3.081,0,0,0,0-4.32,4.488,4.488,0,0,1,0-6.137,3.081,3.081,0,0,0,0-4.32A4.409,4.409,0,0,1,793,773.8Zm-4,5.2h2v41h-2V779Zm20,0h2v41h-2V779Z"
        transform="translate(-789 -769)"></path>
    </svg>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <span class="pagetitle__subheading">Restaurant</span>
          <h1 class="pagetitle__heading">Conchas Abiertas</h1>
          <nav aria-label="breadcrumb">
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.page-title -->

  <!-- ========================
     shop Products
  =========================== -->
  <section id="shop3Products" class="shop shop-grid shop-grid-3col pb-90">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-9">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="filtering-options">
                <div class="filter-option-sorting">
                  <div class="sort-box">
                    <span>Categorias</span>
                    <div class="select-box">
                      <select>
                        <option selected value="Default">Parillas</option>
                        <option value="NewestItems">Pollo a la brasa</option>
                      </select>
                    </div><!-- /.select-box -->
                  </div><!-- /.sort-box -->
                  <div class="sort-box">
                    <span>Ver:</span>
                    <div class="select-box">
                      <select>
                        <option selected="" value="10">10 items / page</option>
                        <option value="25">25 items / page</option>
                        <option value="50">50 items / page</option>
                        <option value="100">100 items / page</option>
                      </select>
                    </div><!-- /.select-box -->
                  </div><!-- /.sort-box -->
                </div><!-- /.filter-option-sorting -->
                <div class="filter-option-view">
                  <span>Listar</span>
                  <a id="gridView" class="active" href="#"><i class="fa fa-th-large"></i></a>
                  <a id="listView" href="#"><i class="fa fa-th-list"></i></a>
                </div><!-- /.filter-option-view -->
              </div><!-- /.filtering-options -->
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
          <div class="row">
            <!-- Product item #1 -->
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="product-item">
                <div class="product__img">
                  <img src="assets/images/shop/grid/1.jpg" alt="Product">
                  <div class="product__hover">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__hover2">Add To Cart</a>
                    </div><!-- /.product__action -->
                  </div><!-- /.product__hover-->
                </div><!-- /.product-img -->
                <div class="product__content">
                  <div class="product__cat">
                    <a href="#">Light</a>
                    <a href="#">Mexican</a>
                    <a href="#">Organic</a>
                  </div>
                  <h4 class="product__title"><a href="#">T-Shirt With a Print</a></h4>
                  <span class="product__price">$18.99</span>
                </div><!-- /.product-content -->
              </div><!-- /.product-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Product item #2 -->
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="product-item">
                <div class="product__img">
                  <img src="assets/images/shop/grid/2.jpg" alt="Product">
                  <div class="product__hover">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__hover2">Add To Cart</a>
                    </div><!-- /.product__action -->
                  </div><!-- /.product__hover-->
                </div><!-- /.product-img -->
                <div class="product__content">
                  <div class="product__cat">
                    <a href="#">Low Carb</a>
                    <a href="#">Fresh</a>
                  </div>
                  <h4 class="product__title"><a href="#">Roast Sea Trout</a></h4>
                  <span class="product__price">$36.99</span>
                </div><!-- /.product-content -->
              </div><!-- /.product-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Product item #3 -->
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="product-item">
                <div class="product__img">
                  <img src="assets/images/shop/grid/3.jpg" alt="Product">
                  <div class="product__hover">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__hover2">Add To Cart</a>
                    </div><!-- /.product__action -->
                  </div><!-- /.product__hover-->
                </div><!-- /.product-img -->
                <div class="product__content">
                  <div class="product__cat">
                    <a href="#">Nut Free</a>
                    <a href="#">Sweet</a>
                    <a href="#">Fresh</a>
                  </div>
                  <h4 class="product__title"><a href="#">Grilled Seafood Paella</a></h4>
                  <span class="product__price">$34.99</span>
                </div><!-- /.product-content -->
              </div><!-- /.product-item -->
            </div><!-- /.col-lg-4 -->

          </div><!-- /.row -->
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </nav><!-- /.pagination-area -->
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.col-lg-9 -->
        <div class="col-sm-12 col-md-12 col-lg-3">
          <aside class="sidebar sidebar-layou2">
            <div class="widget widget-search">
              <h5 class="widget__title">Buscar</h5>
              <div class="widget__content">
                <form class="widget__form-search">
                  <input type="text" class="form-control" placeholder="Escribe restaunt o comida">
                  <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-search -->
            <div class="widget widget-categories">
              <h5 class="widget__title">Categorias</h5>
              <div class="widget-content">
                <ul class="list-unstyled mb-0">
                  <li><a href="#">Parrillas <span>(1)</span></a></li>
                  <li><a href="#">pollos a la brasa <span>(3)</span></a></li>
                </ul>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-categories -->
            <div class="widget widget-poducts">
              <h5 class="widget__title">Favoritos</h5>
              <div class="widget__content">
                <!-- product item #1 -->
                <div class="widget-product-item">
                  <div class="widget__product-img">
                    <a href="#"><img src="assets/images/shop/grid/2.jpg" alt="product"></a>
                  </div><!-- /.product-product-img -->
                  <div class="widget__product-content">
                    <h6 class="widget__product-title"><a href="#">1/2 Pollo a la brasa</a></h6>
                    <span class="widget__product-price">S/. 38.00</span>
                  </div><!-- /.widget-product-content -->
                </div><!-- /.widget-product-item -->
              </div><!-- /.widget-content -->
            </div><!-- /.widget-poducts -->
            <div class="widget widget-filter">
              <h5 class="widget__title"> Filtro de precios</h5>
              <div class="widget__content">
                <div id="rangeSlider"></div>
                <div class="price-output">
                  <label for="rangeSliderResult">Precio: </label>
                  <input type="text" id="rangeSliderResult" readonly>
                  <a class="btn btn__primary btn__link" href="#">Filtrar</a>
                </div>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-filter -->
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-3 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.shop Products -->
@endsection


