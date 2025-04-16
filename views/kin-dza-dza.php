<!-- Здесь информация о фильме Георгия Данелии "Кин-дза-дза" -->
<?php
  $is_info = $url == "/kin-dza-dza/info";
  $is_image = $url == "/kin-dza-dza/image";
?>
<p>Здесь информация о фильме Георгия Данелии "Кин-дза-дза"</p>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { echo "active"; } ?>" href="/kin-dza-dza/image">
        Картинка
    </a>
  </li>
  <li>
    <a class="nav-link <?php if ($is_info) { echo "active"; } ?>" href="/kin-dza-dza/info">
        Описание
    </a>
  </li>
</ul>
<br>
<?php
  if ($is_info) {
    require ("../views/kin-dza-dza_info.php");
  }
  else if ($is_image){
    require ("../views/kin-dza-dza_image.php");
  }
  else {
    echo "Выбедите, что хотите посмотреть: картинку или описание";
  }
?>



