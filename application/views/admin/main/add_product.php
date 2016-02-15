
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1><?php echo $title; ?></h1>


        </div>
        <!-- end page-heading -->

        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="/public/images/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="/public/images/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
            <tr>
                <td id="tbl-border-left"></td>
                <td>
                    <!--  start content-table-inner ...................................................................... START -->
                    <div id="content-table-inner">

                        <!--  start table-content  -->
                        <div id="table-content">

                            <div id="message-green">
                                <?php if(isset($add_sucess)): ?>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
                                        <td class="green-right"><a class="close-green"><img src="/public/images/admin/images/table/icon_close_green.gif"   alt="" /></a></td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                            </div>

                            <div id="message-red">
                                <?php if(strlen(validation_errors()) > 0): ?>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="red-left">Error. <?php echo validation_errors(); echo $image_errors; ?></td>
                                        <td class="red-right"><a class="close-red"><img src="/public/images/admin/images/table/icon_close_red.gif"   alt="" /></a></td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                            </div>

                        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                            <tr>
                                <th class="table-header-check"><a id="toggle-all" ></a> </th>
                                <th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
                                <th class="table-header-repeat line-left minwidth-1"><a href="">Description</a></th>
                                <th class="table-header-repeat line-left"><a href="">Eating</a></th>
                                <th class="table-header-repeat line-left"><a href="">Price</a></th>
                                <th class="table-header-repeat line-left"><a href="">Image</a></th>
                                <th class="table-header-options line-left"><a href="">Options</a></th>
                            </tr>
                            <form id="add_form" action="addproduct" method="post" enctype="multipart/form-data">
                            <tr class="alternate-row">
                                <td><input type="checkbox"/></td>
                                <td><input name="name" type="text" size="14" value="<?php echo set_value('name'); ?>" /></td>
                                <td><textarea name="descr" cols="34" rows="5"><?php if(isset($descr_text)): echo $descr_text; endif; ?></textarea></td>
                                <td><select name="cat">
                                        <?php foreach ($catFood as $cat): ; ?>
                                        <option><?php echo $cat['eating']; ?></option>
                                        <?php endforeach; ?>
                                </select></td>
                                <td><input name="price" type="text" size="8" value="<?php echo set_value('price'); ?>" /></td>
<!--                                --><?php //echo set_value('image'); ?>
                                <td><input name="image" type="file" size="20" /></td>
                                <td class="options-width">
                                    <a href="" title="Edit" class="icon-1 info-tooltip"></a>
                                    <a href="" title="Delete" class="icon-2 info-tooltip"></a>
                                    <a href="" title="New" class="icon-3 info-tooltip"></a>
                                    <a href="" title="xxx" class="icon-4 info-tooltip"></a>
<!--                                    <a title="OK" type="submit" class="icon-5 info-tooltip"></a>-->
                                    <input type="submit" value="ok"/>
                                </td>
                            </tr>
                            </form>

                        </table>
                        <!--  end product-table................................... -->

                        </div>
                        <!--  end table-content  -->

                        <div class="clear"></div>

                    </div>
                    <!--  end content-table-inner ............................................END  -->
                </td>
                <td id="tbl-border-right"></td>
            </tr>
            <tr>
                <th class="sized bottomleft"></th>
                <td id="tbl-border-bottom">&nbsp;</td>
                <th class="sized bottomright"></th>
            </tr>
        </table>
        <div class="clear">&nbsp;</div>

    </div>
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

