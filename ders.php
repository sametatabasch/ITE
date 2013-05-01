<?php
/*
 * Ders anlatımı uygulama falan filan hepsi bu sayfada
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include_once 'config.php';
?>
<html>
    <?php include 'tema/head.php'; ?>
    <body>
        <div class="container-fluid">
            <!--Header-->
            <?php include 'tema/header.php'; ?>
            <!--/Header-->
            <!-- Menü-->
            <?php include 'tema/menu.php'; ?>
            <!-- /Menü-->
            <div class="row-fluid">
                <!-- Sidebar-->
                <?php include 'tema/sidebar.php'; ?>
                <!-- /Sidebar-->
                <div class="span10 well">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="dersTabMenu">
                            <li class="active"><a data-toggle="tab" href="#konuAnlatimi"><?php _e('Konu Anlatımı') ?></a></li>
                            <li class=""><a data-toggle="tab" href="#ornekler"><?php _e('Örnekler') ?></a></li>
                            <li class=""><a data-toggle="tab" href="#oyun"><?php _e('Oyun') ?></a></li>
                            <li class=""><a data-toggle="tab" href="#kazanimlar"><?php _e('Kazanımlar') ?></a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div id="konuAnlatimi" class="tab-pane fade active in">
                                <p>

                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in diam orci, eget rutrum erat. Integer ac quam arcu. Ut tortor eros, sagittis at adipiscing et, egestas nec massa. Integer pretium sem eget ipsum placerat fringilla. Nulla facilisi. Mauris eros urna, dignissim a facilisis id, sollicitudin ut dolor. Morbi eu tellus sit amet purus semper interdum id fermentum mauris. Sed orci sem, tristique vitae lobortis ut, egestas quis tortor. Cras nec dui nec eros molestie pretium.

                                    Nullam placerat, elit id pretium fermentum, dui diam viverra odio, ut molestie purus ligula eu leo. Etiam sodales dolor enim. Fusce facilisis, felis eu hendrerit posuere, velit justo interdum magna, nec imperdiet est justo et enim. Proin adipiscing venenatis commodo. Vivamus tincidunt elit sit amet turpis varius commodo interdum turpis adipiscing. Vivamus arcu velit, pretium quis posuere laoreet, fringilla a lorem. Vivamus vehicula vestibulum dolor dapibus feugiat. Phasellus ut justo elit, vel vestibulum lectus. Pellentesque auctor iaculis neque non aliquet. Phasellus malesuada malesuada ornare. Integer ultricies dignissim velit ac ullamcorper.

                                    Vivamus iaculis consectetur pharetra. Sed iaculis commodo tincidunt. Curabitur aliquet, ligula a vulputate porttitor, quam dolor lobortis sapien, eget bibendum est tortor ac nulla. Donec venenatis purus vitae nisl dictum commodo. Morbi eu pretium erat. Integer feugiat, mi et feugiat blandit, nulla odio porta odio, sit amet elementum libero felis ac arcu. Aliquam sagittis, est a sodales vehicula, nisi metus ultricies justo, gravida feugiat lacus orci nec arcu. Phasellus mollis varius pharetra. Aliquam hendrerit malesuada lorem in euismod.

                                    Quisque gravida, tellus vulputate placerat tempor, lacus mauris feugiat eros, quis dapibus nisl massa ut lorem. In suscipit ante sit amet lectus posuere posuere. Mauris ut blandit felis. Integer ligula massa, cursus eget accumsan et, egestas ac metus. Donec accumsan viverra sagittis. Suspendisse et iaculis tortor. Integer tellus lectus, auctor id faucibus tincidunt, consectetur sed leo. Nam at ligula lorem, quis dapibus magna. Maecenas eros libero, ultricies at pulvinar sed, sodales eget ligula. Proin bibendum urna sit amet ipsum dapibus convallis. Fusce in eros id dolor bibendum sagittis et sit amet dui.

                                    Vestibulum nisl metus, aliquam nec iaculis ac, sagittis eu neque. Suspendisse ut tellus sit amet orci commodo malesuada non nec mi. Vivamus vitae mauris et orci volutpat faucibus. Vivamus eu lorem sit amet tellus malesuada aliquam et eget neque. Morbi tortor nunc, euismod eget placerat fringilla, imperdiet quis lorem. Cras magna lorem, laoreet quis volutpat id, convallis in purus. Phasellus pharetra dolor eu metus suscipit commodo. Ut eu tellus pretium felis rutrum pretium non quis erat. Vestibulum ullamcorper posuere augue, a sollicitudin tellus tristique et. Ut pellentesque tortor eu nulla volutpat cursus. 
                                </p>
                            </div>
                            <div id="ornekler" class="tab-pane fade">
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                            </div>
                            <div id="oyun" class="tab-pane fade">
                                <p class="media">
                                    <img class="media-object" data-src="./dersicerik/1/asitbazphtren.swf">
                                    <object height="481" width="665" data="./dersicerik/1/asitbazphtren.swf" type="application/x-shockwave-flash">
                                        <param value="./dersicerik/1/pH_test.swf" name="movie"/>
                                        <param value="transparent" name="wmode"/>
                                        <param value="high" name="quality"/>
                                        <param value="sameDomain" name="allowScriptAccess"/>
                                        <div align="center">
                                            <font color="#555555" style="font-size: 8pt">You Need to have Flash Player installed.</font>
                                        </div>
                                        <br/>
                                        <br/>
                                    </object>
                                </p>
                                <p class="media">
                                    <img class="media-object" data-src="./dersicerik/1/pH_test.swf">
                                    <object height="481" width="665" data="./dersicerik/1/pH_test.swf" type="application/x-shockwave-flash">
                                        <param value="./dersicerik/1/pH_test.swf" name="movie"/>
                                        <param value="transparent" name="wmode"/>
                                        <param value="high" name="quality"/>
                                        <param value="sameDomain" name="allowScriptAccess"/>
                                        <div align="center">
                                            <font color="#555555" style="font-size: 8pt">You Need to have Flash Player installed.</font>
                                        </div>
                                        <br/>
                                        <br/>
                                    </object>
                                </p>
                            </div>
                            <div id="kazanimlar" class="tab-pane fade">
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './tema/footer.php'; ?>
        </div>
        <?php include './tema/scriptler.php'; ?>
    </body>
</html>
