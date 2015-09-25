<nav class="navbar navbar-default">
  <div class="container-fluid"  style="background-color:#000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="https://www.eternallynocturnal.com" style=""><img height="130%" src="https://www.eternallynocturnal.com/images/mainenheader.png" /></a>
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
      <ul class="nav navbar-nav navbar-right" style="text-align:center">
        <li>
          <button style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shop
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" style="background-color:#000;color:#fff" aria-labelledby="dLabel">

          </ul>
        </li>

        <li class="btn btn-sm nav-button-etnoc hidden-xs"></li>
        <li class="btn btn-sm nav-button-etnoc hidden-xs hidden">Shows</li>
        <li class="btn btn-sm nav-button-etnoc hidden-xs hidden">Bands</li>
        <li>
          <button style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Feedback">
            <b>Contact</b>
          </button>

        </li>
        <li>
          <button style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Feedback">
              <b>Cart</b>
          </button>
        </li>
        <li>
          <button style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Login">
              <b>Login</b>
          </button>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Feedback" tabindex="-1" role="dialog" aria-labelledby="FeedbackLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#000">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button></button>
        <h4 class="modal-title" id="FeedbackLabel" style="color:#fff">Send us a message!</h4>
      </div>
      <div class="modal-body" style="background-color:#000">
        <form action="/" method="post">
         <div class="row">
            <div class="small-12 large-12 columns">
              <input name="name" placeholder="Your Name">
            </div>
            
            <div class="small-12 large-12 columns">
              <input name="email" placeholder="An email we can reply to">
            </div>

            <div class="small-12 large-12 columns">
              <textarea name='message' placeholder='Message' style='color:#000000;max-height:150px;'></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer" style="background-color:#000">
        <button type="button" class="btn btn-warning">Send Feedback</button>
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