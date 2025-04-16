<!-- Здесь информация о фильме Георгия Данелии "Я шагаю по Москве" -->
<?php
    $is_info = $url == "/i_shagau_po_moskve/info";
    $is_image = $url == "/i_shagau_po_moskve/image";
?>
<p>Здесь информация о фильме Георгия Данелии "Я шагаю по Москве"</p>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { echo "active"; } ?>" href="/i_shagau_po_moskve/image">
        Картинка
    </a>
  </li>
  <li>
    <a class="nav-link <?php if ($is_info) { echo "active"; } ?>" href="/i_shagau_po_moskve/info">
        Описание
    </a>
  </li>
</ul>
<br>
<?php
    if ($is_info) {
        require ("../views/i_shagau_po_moskve_info.php");
    }
    else if ($is_image){
        require ("../views/i_shagau_po_moskve_image.php");
    }
    else {
        echo "Выбедите, что хотите посмотреть: картинку или описание";
    }
?>
