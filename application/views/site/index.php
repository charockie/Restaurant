<div class="clear"></div>
<div id="carte">
    <div id="carte-top" class="wrap"></div>
    <div id="content-block" class="wrap">

        <div class="separator top-separator content left"></div>
        <div class="separator top-separator content right"></div>

        <div id="main" class="content">

            <article class="article">


                <h1 class="article-title styled-header"><?php echo $greeting['header']; ?></h1>

                <div class="article-body">
                    <p><a class="thumbnail" href="/public/demo_images/restaurant.jpg" rel="lightbox[77]" title="Restaurant Photo">
                            <img class="left shadow" src="/public/demo_images/restaurant-157x117.jpg" alt="Restaurant Photo" width="157" height="117" /></a>
                        <?php echo $greeting['header_text']; ?></p>

                    <h2><?php echo $greeting['about']; ?></h2>
                    <p><?php echo $greeting['about_text']; ?></p>


                    <p><a class="make-me-btn" href="menu/breakfast">Take a look at our menu!</a></p>
                </div>

            </article>

        </div><!-- end main -->

        <div class="sidebar content">
            <div class="module ">
                <h3>Our specialities</h3>


                <div id="slider" class="nivoSlider">
                    <img src="/public/demo_images/slider/seafood.jpg" title="#caption1" alt="" />
                    <img src="/public/demo_images/slider/sushi.jpg" title="#caption2" alt="" />
                    <a href="menu"><img src="/public/demo_images/slider/spaghetti.jpg" title="#caption3" alt="" /></a>
                    <img src="/public/demo_images/slider/meat.jpg" title="#caption4" alt="" />
                </div>


                <div id="caption1" class="nivo-html-caption">
                    <h4><a href="#">Seafood</a></h4>

                    <p>Ut id adipiscing elit. In ac elit nunc. Duis sit amet velit quis lacus porta lacinia. Sed lobortis</p>
                </div>
                <div id="caption2" class="nivo-html-caption">
                    <h4><a href="#">Sushi</a></h4>
                    <p>Ut id adipiscing elit. In ac elit nunc. Duis sit amet velit quis lacus porta lacinia. Sed lobortis</p>
                </div>
                <div id="caption3" class="nivo-html-caption">

                    <h4><a href="#">Spaghetti</a></h4>
                    <p>Ut id adipiscing elit. In ac elit nunc. Duis sit amet velit quis lacus porta lacinia. Sed lobortis</p>
                </div>
                <div id="caption4" class="nivo-html-caption">
                    <h4><a href="#">Meat</a></h4>
                    <p>Ut id adipiscing elit. In ac elit nunc. Duis sit amet velit quis lacus porta lacinia. Sed lobortis</p>
                </div>

            </div>

            <div class="separator clear"></div>

            <div class="module ">
                <h3><span class="ribbon">Opening hours</span></h3>
                <table>
                    <tbody>
                    <tr>
                        <td>Monday - Friday:</td>

                        <td><strong><?php echo $time['weekdays_from'].' - '.$time['weekdays_to']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Weekends:</td>
                        <td><strong><?php echo $time['weekends_from'].' - '.$time['weekends_to']; ?></strong></td>
                    </tr>
                    </tbody>

                </table>
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
                <form action="menu/search/1" method="get" id="search-form">
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
