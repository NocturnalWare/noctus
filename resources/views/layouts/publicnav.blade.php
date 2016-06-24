<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container-fluid"  style="background-color:#000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="https://www.eternallynocturnal.com" style=""><img height="190%" src="https://eternallynocturnal.com/images/WEBSITEBANNERTEXT.png" /></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span style="padding:0px"class="icon-bar"></span>
        <span style="padding:0px"class="icon-bar"></span>
        <span style="padding:0px"class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li class="btn btn-sm mobile-nav-button-etnoc"> <a target="_blank" style="color:#fff;font-size:2em" href="https://twitter.com/enclothingco"><i class="fa fa-twitter"></i></li></a>
        <li class="btn btn-sm mobile-nav-button-etnoc"> <a target="_blank" style="color:#fff;font-size:2em" href="https://www.facebook.com/EternallyNocturnal"><i class="fa fa-facebook-official"></i></li></a>
        <li class="btn btn-sm mobile-nav-button-etnoc"> <a target="_blank" style="color:#fff;font-size:2em" href="https://instagram.com/eternally_nocturnal/"><i class="fa fa-instagram"></i></li></a>
        <li class="btn btn-sm mobile-nav-button-etnoc"></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="text-align:center;padding-top:10px;">
        @if(\Session::get('cart_id'))
        <li id="hideCartIcon">
          <a href="{{route('cart.index')}}" style="background-color:#000;color:#fff;" class="nav-button-etnoc btn btn-lg">
              <b>Cart
                @if(\Session::get('cart_quantity'))
                  <span class="badge" style="background-color:#fff;color:#000">{{\Session::get('cart_quantity')}}</span>
                @endif
              </b>
          </a>
        </li>
        @endif
          <li id='showCartIcon' class="hidden">
          <a href="{{route('cart.index')}}" style="background-color:#000;color:#fff;" class="nav-button-etnoc btn btn-lg">
              <b>Cart
                @if(\Session::get('cart_quantity'))
                  <span class="badge ajaxCart" style="background-color:#fff;color:#000">{{\Session::get('cart_quantity')}}</span>
                @endif
              </b>
          </a>
        </li>
        <li>
          <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shop
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
            <a class="row" href="{{route('products.index')}}" style="color:#fff"><li class="col-sm-12 btn btn-lg">Everything</li></a>
            @foreach(\App\ProductCategory::all() as $shop)
              <a class="row" href="{{route('productsort', $shop->name)}}" style="color:#fff"><li class="col-sm-12 btn btn-lg">{{$shop->name}}</li></a>
              <br>
            @endforeach
          </ul>
        </li>

        <li class="btn btn-sm nav-button-etnoc hidden-xs"></li>
        <li class="btn btn-sm nav-button-etnoc hidden-xs hidden">Shows</li>
        <li>
          <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sponsored Bands
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
              <a href="{{route('bands.show', 'adventurer')}}" style="color:#fff"><li class="btn btn-lg">Adventurer</li></a><br>
              <a href="{{route('bands.show', 'storiesuntold')}}" style="color:#fff"><li class="btn btn-lg">Stories Untold</li></a><br>
              <a href="{{route('bands.show', 'theillustrator')}}" style="color:#fff"><li class="btn btn-lg">The Illustrator</li></a><br>
              <a href="{{route('bands.show', 'thebansheepilot')}}" style="color:#fff"><li class="btn btn-lg">The Banshee Pilot</li></a><br>
              <a href="{{route('bands.show', 'shapesandcolors')}}" style="color:#fff"><li class="btn btn-lg">Shapes & Colors</li></a><br>
          </ul>
        </li>
        <li>
          <a href="{{route('blogs.index')}}" style="color:#fff" class="nav-button-etnoc btn btn-lg">
            <b>Spotlight</b>
          </a>

        </li>

        <li>
          <a style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Feedback">
            <b>Contact</b>
          </a>

        </li>

        <li>
          @if(\Auth::check())
          @if(Auth::check())
            @include('layouts.adminnav')
          @endif
          @else
          <a style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Login">
                <b>Login</b>
          </a>
          @endif
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Feedback" tabindex="-1" role="dialog"  aria-labelledby="FeedbackLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#000;">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button></button>
        <h4 class="modal-title" id="FeedbackLabel" style="color:#fff">Send us a message!</h4>
      </div>
      <div class="modal-body" style="background-color:#000;padding:30px">
        <form action="{{route('sendFeedback')}}" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}" style="color:#000000;">
         <div class="row">
            <div class="small-12 large-12 columns">
              <input name="name" placeholder="Your Name" style="color:#000000;">
            </div>

            <div class="small-12 large-12 columns">
              <input name="email" placeholder="An email we can reply to" style="color:#000000;">
            </div>

            <div class="small-12 large-12 columns">
              <textarea name='message' placeholder='Message' style='color:#000000;max-height:150px;width:100%'></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer" style="background-color:#000">
        <button type="submit" class="btn btn-primary">Send Feedback</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:transparent">
      <div class="modal-body" style="background-color:transparent;border-radius:20px;">
        @include('auth.login')
    </div>
  </div>
</div>
</div>