<?php

namespace App\Controllers;

// Recursos
use MF\Controller\Action;
use MF\Model\Container;

// Models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {

    public function index() {
/*
        $this->view->dados = [
            'Sofá',
            'Cadeira',
            'Cama'
        ];*/

        // Instância de conexão
        //$conn = Connection::getDb();

        // Instânciar modelo
        //$produto = new Produto($conn);

        $produto = Container::getModel('Produto');

        $produtos = $produto->getProdutos();

        $this->view->dados = $produtos;

        $this->render('index', 'layout1');
    }

    public function sobreNos() {
/*
        $this->view->dados = [
            'Notebook',
            'Smartphone',
            'Video-game'
        ];*/

        // Instância de conexão
        //$conn = Connection::getDb();

        // Instânciar modelo
        //$info = new Info($conn);

        $info = Container::getModel('Info');

        $informacoes = $info->getInfo();

        $this->view->dados = $informacoes;

        $this->render('sobreNos', 'layout1');
    }

}



?>