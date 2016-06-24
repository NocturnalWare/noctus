<div id="products-carousel1" class="col-sm-12 col-md-6 carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#products-carousel1" data-slide-to="0" class="active"></li>
    <li data-target="#products-carousel1" data-slide-to="1"></li>
    <li data-target="#products-carousel1" data-slide-to="2"></li>
    <li data-target="#products-carousel1" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div style="background-color:#000">
        <a href="{{route('products.show', '32')}}">
          <div class="well well-sm en-big-well-button">
            <label class="en-label-bl">Devaux Tee 23.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(32)->getMainImage()}}">
          </div>
        </a>
      </div>
    </div>

      <div class="item">
        <div style="background-color:#000">
          <a href="{{route('products.show', '17')}}">
            <div class="well well-sm en-big-well-button">
              <label class="en-label-bl">Geo Owl Tee 19.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(17)->getMainImage()}}">
            </div>
          </a>
        </div>
      </div>

      <div class="item">
        <div style="background-color:#000">
          <a href="{{route('products.show', '34')}}">
            <div class="well well-sm en-big-well-button">
              <label class="en-label-bl">Native Owl ¾ 25.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(34)->getMainImage()}}">
            </div>
          </a>
        </div>
      </div>
    </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#products-carousel1" role="button" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#products-carousel1" role="button" data-slide="next">
    <i class="fa fa-chevron-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>


<div id="products-carousel2" class="col-sm-12 col-md-6 carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#products-carousel2" data-slide-to="0" class="active"></li>
    <li data-target="#products-carousel2" data-slide-to="1"></li>
    <li data-target="#products-carousel2" data-slide-to="2"></li>
    <li data-target="#products-carousel2" data-slide-to="3"></li>
  </ol>
  <!-- Indicators -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <div style="background-color:#000">
          <a href="{{route('products.show', '37')}}">
            <div class="well well-sm en-big-well-button">
              <label class="en-label-bl">Plum Crossbones Beanie 17.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(37)->getMainImage()}}">
            </div>
          </a>
        </div>
      </div>

      <div class="item">
        <div style="background-color:#000">
          <a href="{{route('products.show', '6')}}">
            <div class="well well-sm en-big-well-button">
              <label class="en-label-bl">Stay Awake to Create Baseball Tee 19.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(6)->getMainImage()}}">
            </div>
          </a>
        </div>
      </div>

      <div class="item">
        <div style="background-color:#000">
          <a href="{{route('products.show', '35')}}">
            <div class="well well-sm en-big-well-button">
              <label class="en-label-bl">Native Owl Womens Swoop Neck 29.99</label><br>
                <img class="img-responsive" src="{{\App\Product::find(35)->getMainImage()}}">
            </div>
          </a>
        </div>
        </div>
      </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#products-carousel2" role="button" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#products-carousel2" role="button" data-slide="next">
    <i class="fa fa-chevron-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>