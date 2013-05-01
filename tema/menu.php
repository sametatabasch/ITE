<?php
/*
 * Sayfalardaki Menü tasarımı ve ayarlaması Bu sayfadan yapılacak
 */
?>
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="brand">GençBilişim UZEM</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="./"><?php _e('Ana Sayfa') ?></a></li>
                    <li><a href="#about"><?php _e('Hakkında') ?></a></li>
                    <li><a href="#contact"><?php _e('İletişim') ?></a></li>
                </ul>
                <form class="navbar-search form-search pull-right">
                    <div class="input-append">
                        <input type="text" class="span2 search-query">
                            <button class="btn btn-inverse" type="submit"><?php _e('Ara')?></button>
                    </div>
                </form>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>