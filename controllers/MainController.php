<?php

class MainController extends BaseSpaceTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();
        
        // подготавливаем запрос SELECT * FROM space_objects
        // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
        $query = $this->pdo->query("SELECT * FROM objects");
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['objects'] = $query->fetchAll();

        return $context;
    }
}