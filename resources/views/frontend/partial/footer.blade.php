<!-- Footer Area -->
<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
  <div class="footer-static-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__widget footer__menu">
            <div class="ft__logo">
              <a href="index.html">
                <img src="{{ asset('public/frontend_assets/images/logo/3.png') }}" alt="logo">
              </a>
              <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p> -->
            </div>
            <div class="footer__content">
              <ul class="social__net social__net--2 d-flex justify-content-center">
                <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                <li><a href="#"><i class="bi bi-google"></i></a></li>
                <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                <li><a href="#"><i class="bi bi-youtube"></i></a></li>
              </ul>
              <ul class="mainmenu d-flex justify-content-center">
                <li><a href="">Trending</a></li>
                <li><a href="">Best Seller</a></li>
                <li><a href="{{ route('products') }}">All Product</a></li>
                <li><a href="">Wishlist</a></li>
                <li><a href="{{route('blogs')}}">Blog</a></li>
                <li><a href="{{ route('contract') }}">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright__wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="copyright">
            <div class="copy__right__inner text-center">
              <p>Copyright <i class="fa fa-copyright"></i> <a href="#">BOOKSTOR</a> All Rights Reserved</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="payment text-right">
            <img src="images/icons/payment.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- //Footer Area -->
<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
  <!-- Modal -->
  <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal__container" role="document">
      <div class="modal-content">
        <div class="modal-header modal__header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="modal-product">
            <!-- Start product images -->
            <div class="product-images">
              <div class="main-image images">
                <img alt="big images" src="images/product/big-img/1.jpg">
              </div>
            </div>
            <!-- end product images -->
            <div class="product-info">
              <h1>Simple Fabric Bags</h1>
              <div class="rating__and__review">
                <ul class="rating">
                  <li><span class="ti-star"></span></li>
                  <li><span class="ti-star"></span></li>
                  <li><span class="ti-star"></span></li>
                  <li><span class="ti-star"></span></li>
                  <li><span class="ti-star"></span></li>
                </ul>
                <div class="review">
                  <a href="#">4 customer reviews</a>
                </div>
              </div>
              <div class="price-box-3">
                <div class="s-price-box">
                  <span class="new-price">$17.20</span>
                  <span class="old-price">$45.00</span>
                </div>
              </div>
              <div class="quick-desc">
                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
              </div>
              <div class="select__color">
                <h2>Select color</h2>
                <ul class="color__list">
                  <li class="red"><a title="Red" href="#">Red</a></li>
                  <li class="gold"><a title="Gold" href="#">Gold</a></li>
                  <li class="orange"><a title="Orange" href="#">Orange</a></li>
                  <li class="orange"><a title="Orange" href="#">Orange</a></li>
                </ul>
              </div>
              <div class="select__size">
                <h2>Select size</h2>
                <ul class="color__list">
                  <li class="l__size"><a title="L" href="#">L</a></li>
                  <li class="m__size"><a title="M" href="#">M</a></li>
                  <li class="s__size"><a title="S" href="#">S</a></li>
                  <li class="xl__size"><a title="XL" href="#">XL</a></li>
                  <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                </ul>
              </div>
              <div class="social-sharing">
                <div class="widget widget_socialsharing_widget">
                  <h3 class="widget-title-modal">Share this product</h3>
                  <ul class="social__net social__net--2 d-flex justify-content-start">
                    <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                    <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                    <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                    <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="addtocart-btn">
                <a href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END QUICKVIEW PRODUCT -->
</div>

<!-- //Main wrapper -->

<!-- JS Files -->
<script src="{{ asset('public/frontend_assets/js/popper.min.js')}}"></script>
<script src="{{ asset('public/frontend_assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend_assets/js/plugins.js')}}"></script>
<script src="{{ asset('public/frontend_assets/js/active.js')}}"></script>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

<script type="text/javascript">
// external js: isotope.pkgd.js


// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.grid-item',
  layoutMode: 'fitRows',
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
      var weight = $( itemElem ).find('.weight').text();
      return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
  }
});

// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};

// bind filter button click
$('#filters').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});

// bind sort button click
$('#sorts').on( 'click', 'button', function() {
  var sortByValue = $(this).attr('data-sort-by');
  $grid.isotope({ sortBy: sortByValue });
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});



</script>

<script type="text/javascript">

function search_product() {
    var category_id = $("#product_category_selector").val();
    var search_keyword = $("#search_keyword").val();
    var csrf_token = '<?php echo csrf_token() ?>';

    console.log(category_id);
    console.log(search_keyword);
    console.log(csrf_token);

    $.ajax({
        url: "{{ route('search.product') }}",
        type: 'GET',
        data: {'category_id':category_id, 'search_keyword':search_keyword},
        dataType: 'json',
        success: function(data) {

          // var html = '';
          // html += '<div class="container">'
          //   html += '<div class="row">'
          //     for (var i = 0; i < data.length; i++) {
          //       html += '<div class="col-md-4">'
          //         html += '<p>'data.id'</p>'
          //       html += '</div>'
          //     }
          //   html += '</div>'
          // html += '</div>'

          $("#product_serch_result").prepend(html);


        }
    });

}

$("#product_category_selector").change(function(){
  $('#select_category_id').val(this.value)
});
</script>

</body>
</html>
