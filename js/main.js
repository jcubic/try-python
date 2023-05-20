/*
 * JQuery CSS Rotate property using CSS3 Transformations
 * Copyright (c) 2011 Jakub Jankiewicz  <https://jcubic.pl/me>
 * licensed under the LGPL Version 3 license.
 * http://www.gnu.org/licenses/lgpl.html
 */
(function($) {
    function getTransformProperty(element) {
        var properties = ['transform', 'WebkitTransform',
                          'MozTransform', 'msTransform',
                          'OTransform'];
        var p;
        while (p = properties.shift()) {
            if (element.style[p] !== undefined) {
                return p;
            }
        }
        return false;
    }
    $.cssHooks['rotate'] = {
        get: function(elem, computed, extra){
            var property = getTransformProperty(elem);
            if (property) {
                return elem.style[property].replace(/.*rotate\((.*)deg\).*/, '$1');
            } else {
                return '';
            }
        },
        set: function(elem, value){
            var property = getTransformProperty(elem);
            if (property) {
                value = parseInt(value);
                $(elem).data('rotatation', value);
                if (value == 0) {
                    elem.style[property] = '';
                } else {
                    elem.style[property] = 'rotate(' + value%360 + 'deg)';
                }
            } else {
                return '';
            }
        }
    };
    $.fx.step['rotate'] = function(fx){
        $.cssHooks['rotate'].set(fx.elem, fx.now);
    };
})(jQuery);
//--------------------------------------------------
//END OF Rotate
//--------------------------------------------------
//AVATAR SIGNATURE PLUGIN
//--------------------------------------------------
$.fn.avatar = function(avatar) {
   var self = this;
   var sig = $('<div/>').addClass('sig').
     append($('<img/>').attr({src: avatar, width: 64, height: 64})).
     append('<div class="arrow"/>').appendTo($('body')).fadeOut(0);
   function position() {
      var offset = self.offset();
      sig.css({
        top: offset.top-self.height()-74,
        left: offset.left+self.width()/2-37});
   }
   position();
   this.mouseover(function() {
     position();
     sig.fadeIn(400);
   }).mouseout(function() {
     sig.fadeOut(400);
   });
   return this;
};

// we need to wrap jQuery because None type returned by python
// function throw exception because it's not converted to null
function terminal(interpreter, options) {
    return $('#terminal').terminal(function() {
        interpreter.apply(this, arguments);
    }, options);
}

$.terminal.syntax('python');
//--------------------------------------------------
// MAIN CODE
//--------------------------------------------------
$(function() {
    brython();
    //JSON-RPC ID
    var id = 1;
    if ($.browser.ie) {
        $('header img').attr('src', 'css/python.gif');
    }
    function python(terminal) {
        var pydicator = (function(element) {
            var run = true;
            function animate() {
                element.animate({'rotate': 360}, 1000, function() {
                    if (run) {
                        animate();
                    }
                });
            }
            return {
                start: function() {
                    animate();
                },
                stop: function() {
                    run = false;
                    element.stop().css('rotate', 0);
                }
            };
        })($('header img'));

        function ajax_error(xhr, status) {
            pydicator.stop();
            terminal.resume();
            terminal.error('&#91;AJAX&#93; ' + status + ' server response\n' +
                           xhr.responseText);
            terminal.pop();
        }
        function json_error(error) {
            if (typeof error == 'string') {
                terminal.error(error);
            } else {
                if (error.message) {
                    terminal.echo(error.message);
                }
                if (error.error.traceback) {
                    terminal.echo(error.error.traceback);
                }
            }
        }
        var url = '/cgi-bin/rpc.py';
        //url = 'rpc.cgi';
        function rpc_py(method, params, echo) {
            if (params === undefined) {
                params = [];
            }
            terminal.pause();
            pydicator.start();
            $.jrpc(url, id++, method, params, function(data) {
                terminal.resume();
                if (data.error) {
                    json_error(data.error);
                } else if (data.result) {
                    if (echo === undefined || echo) {
                        terminal.echo(data.result);
                    }
                }
                pydicator.stop();
            }, ajax_error);
        }
        terminal.pause();
        pydicator.start();
        var session_id;
        $.jrpc(url, id++, 'start', [], function(data) {
            terminal.resume();
            if (data.error) {
                pydicator.stop();
                json_error(data.error);
            } else if (data.result) {
                session_id = data.result;
                rpc_py('info', [])
            }
        }, ajax_error);
        return {
            evaluate: function(code) {
                rpc_py('evaluate', [session_id, code]);
            },
            destroy: function() {
                rpc_py('destroy', [session_id]);
            }
        };
    }

    var py; // python rpc
    var python_code = '';
    /*
    $('#terminal').terminal(function(command, term) {
        term.error("Python disabled");
    }, {
        prompt: '>>> ',
        name: 'python',
        greetings: null,
        onBlur: function() { return false; },
        onInit: function(terminal) {
            terminal.echo("Python interpreter needed to be shutdown because of security issues. " +
                          "But the code still work and you can grab the source from github");
            terminal.echo("https://github.com/jcubic/try-python");
            terminal.echo("You can also check Leash Shell https://leash.jcubic.pl that have " +
                          "python command, that run same code.");
        },
        width: 600,
        height: 255
    });*/


    $(window).unload(function() {
        //py.destroy();
    });
    $('footer a').avatar('avatar.png');
});
