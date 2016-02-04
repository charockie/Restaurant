<footer id=F"footer" class="dark-zone">

    <div id="fmodules" class="wrap">

        <div class="module fmodule col-module col-module-first">
            <div>
                <h3>Class taciti</h3>
                <p>In convallis, velit eu egestas lacinia, ante leo posuere nibh, eu egestas nibh mauris quis lorem. Nullam id ipsum nisl, vitae aliquet mi.</p>
            </div>
        </div>

        <div class="module fmodule col-module">

            <div>
                <h3>Recent Articles</h3>
                <ul class="article-list-mod latestnews">
                    <li>
                        <a href="#">Cras commodo sapien</a>
                        <details class="details">Wed 02 February 2011</details>
                    </li>

                    <li>
                        <a href="#">Morbi leo lorem</a>
                        <details class="details">Wed 02 February 2011</details>
                    </li>
                    <li>
                        <a href="#">Nunc mauris sapien</a>
                        <details class="details">Wed 02 February 2011</details>

                    </li>
                </ul>
            </div>
        </div>

        <div class="module fmodule col-module">
            <div>
                <h3>Vivamus faucibus</h3>
                <nav class="clearfix">

                    <ul class="menu">
                        <li><a href="#">Getting Started</a></li>
                        <li><a href="#">Using Joomla!</a></li>
                        <li><a href="#">The Joomla! Project</a></li>
                        <li><a href="#">The Joomla! Community</a></li>
                    </ul>
                </nav>

            </div>
        </div>

        <div class="module fmodule col-module col-module-last">
            <div>
                <h3>We accept all cards</h3>
                <p><img src="/public/demo_images/credit-cards.png" class="left" style="margin: 0 15px 15px 0;" />
                    No cash? No problem! You won't have to wash dishes.</p>
            </div>

        </div>

        <div class="clear"></div>
    </div><!-- end fmodules -->

    <div id="footer-info">
        <div class="wrap relative">

            <div class="footer-left left">

                <p>Our social networks:</p>
                <ul class="social-links fade clearfix">

                    <li class="facebook"><a class="icon32 facebook_32" href="#"></a></li>
                    <li class="twitter"><a class="icon32 twitter_32" href="#"></a></li>
                    <li class="youtube"><a class="icon32 youtube_32" href="#"></a></li>
                </ul>

            </div>

            <div class="footer-right right">
                <p>Made by <a href="">Demente Design</a>.<br />

                    Available for purchase on <a href="">ThemeForest</a>.</p>
            </div>

        </div>
    </div><!-- end footer-info -->

</footer><!-- end footer -->


<script src="/public/static/js/jquery.colorbox-min.js"></script>
<script src="/public/static/js/jquery.validity.pack.js"></script>

<script src="/public/static/js/jquery.nivo.slider.pack.js"></script>

<script>
    jQuery(function(){
        captions();
        zebratables();
        hoverTables();
        pullquote();

        jQuery("a[rel*='lightbox']").colorbox({
            'opacity' : .5
        });

        jQuery.validity.setup({ outputMode:"modal" });

        var form = jQuery('form.form-validate');
        if( form.length > 0 ){
            // A general validation for forms
            form.validity(function(){
                jQuery('input.required').require();
                jQuery('textarea.required').require();
                jQuery('input[type="email"]').require().match('email');
                jQuery('input.required[type="url"]').require().match('url');
                jQuery('input[type="password"]').equal();
            });
        };
        userLinks();
        fades();
        inputValues();
    });

    jQuery(window).load(function(){

        jQuery('#slider').nivoSlider({
            effect : 			'fade',
            animSpeed : 		500, 	// Slide transition speed
            pauseTime : 		3000, 	// How long each slide will show
            captionOpacity : 	0.8, 	// Universal caption opacity
            prevText : 			'', 	// Prev directionNav text
            nextText : 			'', 	// Next directionNav text
            controlNav : 		false 	// 1,2,3... navigation
        });
    });
</script>

</body>
</html>