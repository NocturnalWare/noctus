<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://159.203.77.45/favicon.ico" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://159.203.77.45/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://159.203.77.45/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://159.203.77.45/final.css">
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <script src="http://159.203.77.45/js/bundle.js"></script>
        <title>#StayAwakeToCreate</title>


@yield('facebook-tags')
            
    </head>

<body style="background-color:#000">
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56104944-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- <div id='stars'></div> -->
<!-- <div id='stars2'></div> -->
<!-- <div id='stars3'></div> -->
@include('layouts.publicnav')
@if(Auth::check())
  @include('layouts.adminnav')
@endif
<div class="div-sm-12" style="margin-top:20px;">
  <div id="fb-root"></div>

@yield('content')
</body>



</html>

