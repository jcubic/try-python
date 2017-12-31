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
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <!--<script src="js/browser.js"></script>-->
    <!--<script src="http://terminal.jcubic.pl/js/jquery.mousewheel-min.js"></script>-->
    <? if ($_SERVER["HTTP_HOST"] == "localhost"): ?>
    <script src="../terminal/js/jquery.terminal-src.js"></script>
    <? else: ?>
    <script src="https://rawgit.com/jcubic/jquery.terminal/devel/js/jquery.terminal.js"></script>
    <? endif; ?>
    <link href="https://unpkg.com/prismjs@1.8.1/themes/prism.css" rel="stylesheet"/>
    <script src="https://unpkg.com/prismjs@1.8.1/prism.js"></script>
    <script src="https://cdn.jcubic.pl/terminal.prism.js"></script>
    <script src="https://cdn.rawgit.com/brython-dev/brython/master/www/src/brython.js"></script>
    <script src="https://cdn.rawgit.com/brython-dev/brython/master/www/src/brython_stdlib.js"></script>
    <link href="https://rawgit.com/jcubic/jquery.terminal/devel/css/jquery.terminal.css" rel="stylesheet"/>
    <link href="css/trypython.css" rel="stylesheet"/>
    <script type="text/python" src="main.py"></script>
    <script src="js/main.js"></script>
</head>
<body onload="brython()" >
  <section>
    <header><img src="css/python.png"/><h1>Try Python</h1></header>
    <div id="terminal"></div>
    <p>This is interactive online interpreter for <a href="http://www.python.org">Python</a> Programming language. It use <a href="http://terminal.jcubic.pl">JQuery terminal Emulator Plugin</a>, <a href="https://brython.info/">Brython</a> and <a href="http://prismjs.com/">Prims.js</a>. Python is dynamic, high level, object oriented programming language that you can now try directly from your browser.</p>
    <footer>Copyright &copy; <?php echo date('Y'); ?> <a href="http://jcubic.pl/jakub-jankiewicz">Jakub Jankiewicz</a></footer>
  </section>
  <!--
  <div id="wrapper">
    <div id="shadow"></div>
  </div>
  -->
  <? if ($_SERVER["HTTP_HOST"] != "localhost"): ?>
  <aside>
    <a id="html5" href="http://www.w3.org/html/logo/">
      <img src="http://www.w3.org/html/logo/badge/html5-badge-v-css3-graphics-semantics.png" width="38" height="170" alt="HTML5 Powered with CSS3 / Styling, Graphics, 3D &amp; Effects, and Semantics" title="HTML5 Powered with CSS3 / Styling, Graphics, 3D &amp; Effects, and Semantics">
</a>
    <div id="share">
      <div class="googleplus-button"><g:plusone size="tall"></g:plusone></div>
      <script src="https://apis.google.com/js/plusone.js"></script>
      <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://trypython.jcubic.pl" data-text="Check out this #AJAX Interactive #Python interpreter #web2.0" data-count="vertical" data-via="jcubic">Tweet</a>
      <script src="http://platform.twitter.com/widgets.js" async="true"></script>
      <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ftrypython.jcubic.pl&amp;layout=box_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;locale=en_US" scrolling="no" frameborder="0" style="border:none; margin-right:-2px; overflow:hidden; width:55px; height:65px;" allowTransparency="true"></iframe>
    </div>
  </aside>
  <? endif; ?>
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
    <noscript><p><img src="http://piwik.jcubic.pl/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
    <? endif; ?>
</body>
</html>
