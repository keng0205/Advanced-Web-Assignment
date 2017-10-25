<?php


use app\components\tenantWidget;
?>

<H1>Tenants</h1>
<?= tenantWidget::widget(['tenants'=>$model]);?>


