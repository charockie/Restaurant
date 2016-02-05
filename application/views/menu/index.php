    <script>
        jQuery(function(){

//            hideLoginForm(); !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            jQuery("#content-block").preloader({
                delay: 100
            });

            jQuery('.jquery-menu').enhanceMenu({
                effect: 'slide',
                duration: 200,
                delayIn: 100,
                delayOut: 100
            });

        });
    </script>

<div class="clear"></div>
<div id="carte">
    <div id="carte-top" class="wrap"></div>
    <div id="content-block" class="wrap">

        <div class="separator top-separator content left"></div>
        <div class="separator top-separator content right"></div>

        <div id="main" class="content">

            <div class="dmtmenu dmtmenu-category">

                <h1><?php echo $type_descr['eating'];?></h1>

                <div class="category-desc clearfix">
                    <p><?php echo $type_descr['descr'];?></p>
                </div>

                <table class="fulltable">

                    <?php foreach($food_menu as $menu): ;?>
                    <tr class="dmtmenu-item">
                        <td>
                            <h5><span>
                                    <a rel="lightbox[1]" href="/template/demo_images/<?php echo $menu['image'];?>" title="Mauris ornare">
                                        <img src="/public/images/eye.png" alt="" class="icon" /><?php echo $menu['name'];?></a></span></h5></span></h5>

                            <details class="small">
                                <p><?php echo $menu['description'];?></p>
                            </details>
                        </td>
                        <td class="dmtmenu-price">$<?php echo $menu['price'];?></td>
                    </tr>
                    <?php endforeach; ?>

                </table>

            </div>
            <center><h5><?php echo $links; ?></h5></center>
        </div><!-- end main -->

        <div class="sidebar content">

            <div class="module">
                <h3>Choose a Menu</h3>
                <nav class="clearfix">

                    <div class="cols-2 col-first">
                        <div>
                            <ul class="menu">
                                <li class="active"><a href="/menu/breakfast">Breakfast</a></li>
                                <li><a href="/menu/lunch">Lunch</a></li>
                                <li><a href="/menu/dinner">Dinner</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="cols-2 col-last">
                        <div>
                            <ul class="menu">
                                <li><a href="/menu/desserts">Desserts</a></li>
                                <li><a href="/menu/drinks">Drinks</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>

            <div class="separator clear"></div>

            <div class="module">
                <h3>Chef's recommendation</h3>
                <p><a class="thumbnail" href="/public/demo_images/sushi.jpg" rel="lightbox[0]" title="Maecenas a purus risus">

                        <img class="caption left" src="/public/demo_images/sushi_thumb.jpg" border="0" title="Maecenas a purus risus" width="165" height="109" /></a>
                    Mauris ornare libero in risus ullamcorper dignissim. Suspendisse metus libero,
                    dictum et laoreet hendrerit, dapibus non velit. Integer consectetur euismod sem
                    vitae vestibulum. Nam quis enim non nunc fermentum volutpat at ac nunc.
                    Maecenas a purus risus, sed pretium urna. Duis dui diam, volutpat sit amet vestibulum a,
                    suscipit consectetur mauris. Nam dui eros, cursus vitae ornare elementum,
                    placerat a ligula. Sed ac malesuada lacus. Duis convallis convallis ultricies.
                    Vestibulum ullamcorper, sem eu pellentesque scelerisque.</p>
            </div>

        </div><!-- end sidebar -->


        <div class="clear left content">
            <div class="separator"></div>

            <div class="small carte-footer">
                <p>Te Contei - Av. Bartolomeu Gusm&atilde;o 16 Rio de Janeiro, Brasil - 615 2475</p>
            </div>
        </div>

        <div class="right content">
            <div class="separator"></div>

            <div class="small carte-footer">
                <form action="search/1" method="get" id="search-form">
                    <div class="search-wrap">
                        <input name="searchword" maxlength="50" class="hidevalue search-field inputbox" type="search" size="50" value="Search..." />
                        <input type="submit" value="" class="search-button-image" onclick="this.form.searchword.focus();" />
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end #content-block -->

    <div id="carte-bottom" class="clear wrap"></div>
</div><!-- end #carte -->