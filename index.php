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
  <script src="https://unpkg.com/prismjs/components/prism-python.min.js"></script>
  <script src="https://unpkg.com/jquery.terminal@2.6.3/js/prism.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/brython/3.7.3/brython.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/brython/3.7.3/brython_stdlib.js"></script>
  <script type="text/python" src="main.py"></script>
  <script src="js/main.js"></script>
  <a href="https://github.com/jcubic/try-python" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; left: 0; transform: scale(-1, 1);" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style></a>
  <? if ($_SERVER["HTTP_HOST"] != "localhost" && !isset($_GET['track'])): ?>
    <!-- Start Open Web Analytics Tracker -->
    <script type="text/javascript">
    //<![CDATA[
    var owa_baseUrl = 'https://stats.jcubic.pl/';
    var owa_cmds = owa_cmds || [];
    owa_cmds.push(['setSiteId', 'bfb5ca8188943efeafe48d9492e56974']);
    owa_cmds.push(['trackPageView']);
    owa_cmds.push(['trackClicks']);

    (function() {
        var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
        owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
        _owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
        var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
    }());
    //]]>
    </script>
    <!-- End Open Web Analytics Code -->
  <? endif; ?>
</body>
</html>
