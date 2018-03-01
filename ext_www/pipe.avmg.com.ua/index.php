<?
preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получаем массив $matches с соответствиями
$langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
foreach ($langs as $n => $v)
    $langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
arsort($langs); // Сортируем по убыванию q
$default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)

if(in_array($default_lang, ["ua-ua","ru-ru","by-by","az-az","am-am","by-by","kz-kz","kg-kg","md-md","tj-tj","tm-tm","uz-uz"])) {
    header("Location:http://pipe.avmg.com.ua/ua/");
}
else {
    header("Location:http://pipe.avmg.com.ua/en/");
}

?>





<?/*
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Pipe");
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/?>

