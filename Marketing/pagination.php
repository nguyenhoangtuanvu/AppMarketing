<?php
if($current_page > 3) {
    $firstPage = 1;
?>
    <a class="second-footer__count-paging" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $firstPage ?>">1</a>
<?php 
}
for($num = 1; $num <= $totalPage; $num++) {
    if($num != $current_page) {
        if($num > $current_page - 2 && $num < $current_page + 2) {
?>
            <a class="second-footer__count-paging" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $num ?>"><?= $num ?></a>
<?php
        }
    }else {
?>
            <a class="second-footer__count-paging current-page" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $num ?>"><?= $num ?></a>
<?php
        }
}
if($current_page < $totalPage - 3) {
    $endPage = $totalPage;
?>  
    <a class="second-footer__count-paging" href="?per_page=<?= $item_per_page ?>&currant_page=<?= $endPage ?>">Cuối</a>
<?php 
}
?>