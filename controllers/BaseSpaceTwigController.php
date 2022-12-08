<?php

class BaseSpaceTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare(" SELECT DISTINCT type FROM objects ORDER BY 1");
        $types = $query->fetch();
      
        $context['types'] = $types;
	    

        return $context;
    }
}