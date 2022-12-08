<?php

class ObjectController extends BaseSpaceTwigController {
    public $template = "__obj.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
     
        $query = $this->pdo->prepare("SELECT description, id FROM objects WHERE id= :my_id");
       
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['description'] = $data['description'];

        return $context;
    }
}