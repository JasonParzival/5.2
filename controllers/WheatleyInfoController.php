<?php
require_once "WheatleyController.php"; 

class WheatleyInfoController extends WheatleyController {
    public $template = "base_info.twig";
    public $temp = "Описание";
    public $caption = '"Подожду... подожду один час. <br>
        А потом вернусь и, если найду твое мертвое тело, похороню тебя. <br>
        Правильно? Отлично! Мы команда! Увидимся через час. <br>
        Надеюсь. Если ты не мертва..."<br>';
}