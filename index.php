<?php
    require($_SERVER["DOCUMENT_ROOT"]."/models/DB.php");
    require($_SERVER["DOCUMENT_ROOT"]."/controllers/news.php");
    $categList=news::getCategs();
    if (isset($_GET["category"]))
    {
        $newsList=news::getNews($_GET["category"]);
    }
?>
<form method="get">
    выберите категорию
    <select name="category" required>
        <?foreach($categList as $arCat):?>
        <option value="<?=$arCat["id"];?>" selected="selected"><?=$arCat["name"];?></option>
        <?endforeach;?>
    </select>
    <input type="submit">
</form>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>заголовок</td>
            <td>описание</td>
        </tr>
        <? if (isset($_GET["category"])): foreach($newsList as $arNews):?>
            <tr>
                <td><?=$arNews["id"];?></td>
                <td><?=$arNews["head"];?></td>
                <td><?=$arNews["body"];?></td>
            </tr>
        <?endforeach; endif;?>
    </table>
