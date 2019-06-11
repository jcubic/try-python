<?php // -*- mode: web -*-
header("X-Powered-By: ");
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Try Python - Interactive Python Interpreter</title>
    <meta name="Description" content="Try python directly in you browser with this interactive interpreter appliction."/>
    <meta name="Keywords" content="python ajax web2.0 interpreter browser terminal JSON-RPC"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta name="author" content="Jakub T. Jankiewicz - jcubic&#64;jcubic.pl"/>

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="JQuery Terminal Emulator Plugin"/>
    <meta property="og:description" content="Try python directly in you browser with interactive interpreter appliction."/>
    <meta property="og:url" content="http://trypython.jubic.pl/"/>
    <meta property="og:site_name" content="Interactive Python Interpreter"/>
    <meta property="og:image" content="http://trypython.jcubic.pl/css/python.png"/>

    <meta name="twitter:image" content="http://trypython.jcubic.pl/css/python.png"/>
    <meta name="twitter:image:alt" content="Python logo"/>
    <meta name="twitter:title" content="Interactive Python Interpreter"/>
    <meta name="twitter:description" content="Try python directly in you browser with interactive interpreter appliction."/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@jcubic"/>
    <meta name="twitter:creator" content="@jcubic"/>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="https://rawgit.com/jcubic/jquery.terminal/devel/css/jquery.terminal.css" rel="stylesheet"/>
    <link href="css/trypython.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
</style>
</head>
<body onload="brython()" >
  <section>
    <header><img src="css/python.png"/><h1>Try Python</h1></header>
    <div id="terminal"></div>
    <p>This is interactive online interpreter for <a href="https://www.python.org">Python</a> Programming language. It use <a href="https://terminal.jcubic.pl">JQuery terminal Emulator Plugin</a>, <a href="https://brython.info/">Brython</a> and <a href="https://prismjs.com/">Prims.js</a>. Python is dynamic, high level, object oriented programming language that you can now try directly from your browser.</p>
    <footer>Copyright &copy; 2011-<?php echo date('Y'); ?> <a href="https://jcubic.pl/jakub-jankiewicz">Jakub T. Jankiewicz</a></footer>
  </section>
  <!--
  <div id="wrapper">
    <div id="shadow"></div>
  </div>
  -->
  <? if ($_SERVER["HTTP_HOST"] != "localhost"): ?>
  <aside>
    <a id="html5" href="https://www.w3.org/html/logo/">
      <img src="https://www.w3.org/html/logo/badge/html5-badge-v-css3-graphics-semantics.png" width="38" height="170" alt="HTML5 Powered with CSS3 / Styling, Graphics, 3D &amp; Effects, and Semantics" title="HTML5 Powered with CSS3 / Styling, Graphics, 3D &amp; Effects, and Semantics">
</a>
    <div id="share">
      <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://trypython.jcubic.pl" data-text="Check out this #AJAX Interactive #Python interpreter #web2.0" data-count="vertical" data-via="jcubic">Tweet</a>
      <script src="https://platform.twitter.com/widgets.js" async="true"></script>
      <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ftrypython.jcubic.pl&amp;layout=box_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;locale=en_US" scrolling="no" frameborder="0" style="border:none; margin-right:-2px; overflow:hidden; width:55px; height:65px;" allowTransparency="true"></iframe>
    </div>
  </aside>
  <? endif; ?>
  <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script>
var pydicator = (function(element) {
    var run;
    function animate() {
        element.animate({'rotate': 360}, 1000, function() {
            if (run) {
                animate();
            }
        });
    }
    return {
        start: function() {
            run = true;
            animate();
        },
        stop: function() {
            run = false;
            element.stop().css('rotate', 0);
        }
    };
})($('header img'));
pydicator.start();
  </script>
  <? if ($_SERVER["HTTP_HOST"] == "localhost"): ?>
  <script src="../terminal/js/jquery.terminal-src.js"></script>
  <? else: ?>
  <script src="https://unpkg.com/jquery.terminal/js/jquery.terminal.min.js"></script>
  <? endif; ?>
  <link href="https://unpkg.com/prismjs@1.8.1/themes/prism.css" rel="stylesheet"/>
  <script src="https://unpkg.com/prismjs@1.8.1/prism.js"></script>
  <script src="https://cdn.jcubic.pl/terminal.prism.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/brython/3.7.3/brython.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/brython/3.7.3/brython_stdlib.js"></script>
  <script type="text/python" src="main.py"></script>
  <script src="js/main.js"></script>
  <a href="https://github.com/jcubic/try-python" style="position: absolute; top: 0; left: 0; z-index:1000"><img style="border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_darkblue_121621.png" alt="Fork Try Python on GitHub"></a>
  <? if ($_SERVER["HTTP_HOST"] != "localhost" && !isset($_GET['track'])): ?>
    <!-- Piwik -->
    <script type="text/javascript">
     if (location.host == 'trypyhton.jcubic.pl') {
         var _paq = _paq || [];
         _paq.push(['trackPageView']);
         _paq.push(['enableLinkTracking']);
         (function() {
             var u=(("https:" == document.location.protocol) ? "https" : "http") + "://piwik.jcubic.pl/";
             _paq.push(['setTrackerUrl', u+'piwik.php']);
             _paq.push(['setSiteId', 1]);
             var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
             g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
         })();
     }
    </script>
    <noscript><p><img src="https://piwik.jcubic.pl/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
    <? endif; ?>
</body>
</html>
