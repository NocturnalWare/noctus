<nav class="navbar navbar-default navbar-fixed-top">
  
  <div class="container-fluid"  style="background-color:#000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="http://www.eternallynocturnal.com" style=""><img height="130%" src="http://54.149.181.47/images/mainenheader.png" /></a>
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
        <li>
          <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manage
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
            <li></li>
            <li class="btn btn-lg">Products</li>
            <li class="btn btn-lg">Contacts</li>
            <li class="btn btn-lg">Venues</li>
            <li class="btn btn-lg">Orders</li>
            <li class="btn btn-lg">Bands</li>
            <li class="btn btn-lg">Shipping</li>
            <li class="btn btn-lg">Shows</li>
              <a href="{{route('products.index')}}" style="color:#fff"><li class="btn btn-lg">Go to Storefront</li></a>
          </ul>
        </li>
        <li>
          <a style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" href="../../../noctus/public/auth/logout">
              <b>Logout</b>
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
