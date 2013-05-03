<?php
/*
 * Sayfalardaki sidebar tasarımı bu dosyadan yapılacak
 */
?>
<div id="sidebar" class="span2 well well-small">
    <ul class="nav nav-list">
        <li class="nav-header"><?php _e('Profil')?></li>
        <li<?php if(strstr($_SERVER['SCRIPT_NAME'],'duzenle'))  echo ' class="active"';?>><a href="./?duzenle=1"><i class="icon-edit"></i><?php _e('Profilimi Düzenle')?></a></li>
        <li><a href="#"><i class="icon-envelope"></i><?php _e('Mesajlarım')?></a></li>
        <li><a href="./logout.php"><i class="icon-off"></i><?php _e('Çıkış Yap')?></a></li>
        <?php if(strstr($_SERVER['QUERY_STRING'],'ders')):?>
        <li class="nav-header"><i class="icon-book"></i><?php _e('Ders')?></li>
        <li><a href="./ders.php"></i><?php _e('Konu Anlatımı')?></a></li>
        <li><a href="?s=ders&d=Fen ve Teknoloji&u=MADDENİN YAPISI VE ÖZELLİKLERİ&i=sunu"><?php _e('Sunu')?></a></li>
        <li><a href="?s=ders&d=Fen ve Teknoloji&u=MADDENİN YAPISI VE ÖZELLİKLERİ&i=oyun"><?php _e('Oyun')?></a></li>
        <li><a href="?s=ders&d=Fen ve Teknoloji&u=MADDENİN YAPISI VE ÖZELLİKLERİ&i=sozluk"><?php _e('Sözlük')?></a></li>
        <li><a href="?s=ders&d=Fen ve Teknoloji&u=MADDENİN YAPISI VE ÖZELLİKLERİ&i=sinav"><?php _e('Sınav')?></a></li>
        <li><a href="http://uzem.gençbilişim.net/course/view.php?id=10"><i class="icon-comment"></i><?php _e('Forum')?></a></li>
        <?php endif;?>
        <li class="nav-header">Sidebar</li>
        <li<?php if(strstr($_SERVER['SCRIPT_NAME'],'editor.php'))  echo ' class="active"';?>><a href="./editor.php"><i class="icon-edit"></i><?php _e('Editör')?></a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
    </ul>
</div>