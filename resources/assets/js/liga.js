/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
    'use strict';
    function supportsProperty(p) {
        var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
            i,
            div = document.createElement('div'),
            ret = p in div.style;
        if (!ret) {
            p = p.charAt(0).toUpperCase() + p.substr(1);
            for (i = 0; i < prefixes.length; i += 1) {
                ret = prefixes[i] + p in div.style;
                if (ret) {
                    break;
                }
            }
        }
        return ret;
    }
    var icons;
    if (!supportsProperty('fontFeatureSettings')) {
        icons = {
            'image': '&#xe90d;',
            'picture': '&#xe90d;',
            'images': '&#xe90e;',
            'pictures': '&#xe90e;',
            'clock': '&#xe94e;',
            'time2': '&#xe94e;',
            'clock2': '&#xe94f;',
            'time3': '&#xe94f;',
            'database': '&#xe964;',
            'db': '&#xe964;',
            'spinner10': '&#xe983;',
            'loading11': '&#xe983;',
            'cog': '&#xe994;',
            'gear': '&#xe994;',
            'cogs': '&#xe995;',
            'gears': '&#xe995;',
            'mug': '&#xe9a2;',
            'drink3': '&#xe9a2;',
            'fire': '&#xe9a9;',
            'flame': '&#xe9a9;',
            'bin': '&#xe9ac;',
            'trashcan': '&#xe9ac;',
            'tree': '&#xe9bc;',
            'branches': '&#xe9bc;',
            'cloud-download': '&#xe9c2;',
            'cloud2': '&#xe9c2;',
            'cloud-upload': '&#xe9c3;',
            'cloud3': '&#xe9c3;',
            'blocked': '&#xea0e;',
            'forbidden': '&#xea0e;',
            'cross': '&#xea0f;',
            'cancel': '&#xea0f;',
            'checkmark': '&#xea10;',
            'tick': '&#xea10;',
            'checkmark2': '&#xea11;',
            'tick2': '&#xea11;',
            'play3': '&#xea1c;',
            'player8': '&#xea1c;',
            'embed': '&#xea7f;',
            'code': '&#xea7f;',
            'terminal': '&#xea81;',
            'console': '&#xea81;',
            'tux': '&#xeabd;',
            'brand52': '&#xeabd;',
            'html-five': '&#xeae4;',
            'w3c': '&#xeae4;',
            'html-five2': '&#xeae5;',
            'w3c2': '&#xeae5;',
            'git': '&#xeae7;',
            'brand80': '&#xeae7;',
            'svg': '&#xeae9;',
          '0': 0
        };
        delete icons['0'];
        window.icomoonLiga = function (els) {
            var classes,
                el,
                i,
                innerHTML,
                key;
            els = els || document.getElementsByTagName('*');
            if (!els.length) {
                els = [els];
            }
            for (i = 0; ; i += 1) {
                el = els[i];
                if (!el) {
                    break;
                }
                classes = el.className;
                if (/icon-/.test(classes)) {
                    innerHTML = el.innerHTML;
                    if (innerHTML && innerHTML.length > 1) {
                        for (key in icons) {
                            if (icons.hasOwnProperty(key)) {
                                innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
                            }
                        }
                        el.innerHTML = innerHTML;
                    }
                }
            }
        };
        window.icomoonLiga();
    }
}());
