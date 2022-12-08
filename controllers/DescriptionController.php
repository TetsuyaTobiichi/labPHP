<?php

class DescriptionController extends TwigBaseController {
    public $template = "obj.twig"; 

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT description, id FROM objects WHERE id= :my_id");
       
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        
        $data = $query->fetch();

        $context['description'] = $data['description'];
        $context['id'] = $this->params['id'];
        return $context;
    }
}