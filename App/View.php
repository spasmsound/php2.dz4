<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View
{

    /**
     * Трейт MagicTrait
     */
    use MagicTrait;


    /**
     * Метод render. Подготавливает шаблон, но не отображает его
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Метод display. Тот же render, но display выводит шаблон в поток
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);

    }
}