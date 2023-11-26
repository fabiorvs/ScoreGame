<?php

namespace App\Controllers;

use App\Models\GameModel;
use CodeIgniter\API\ResponseTrait;

class GameController extends BaseController
{
    use ResponseTrait;

    public function saveScore()
    {

        // Verifica se o token está presente no cabeçalho da requisição
        $token = $this->request->getHeader('Authorization');

        if (empty($token) || $token->getValue() !== 'Bearer ' . config('App')->apiSecret) {
            return $this->failUnauthorized('Token inválido.');
        }

        $json = $this->request->getJSON();

        // Validar e obter dados do JSON
        $nome = $json->nome ?? '';
        $email = $json->email ?? '';
        $telefone = $json->telefone ?? '';
        $todosdias = $json->todosdias ?? '';
        $game = $json->game ?? '';
        $pontuacao = $json->pontuacao ?? 0;

        // Validar os dados conforme necessário

        // Gravar no banco de dados
        $gameModel = new GameModel();
        $data = [
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'todosdias' => $todosdias,
            'game' => $game,
            'pontuacao' => $pontuacao,
            'data' => date('Y-m-d H:i:s'), // Data atual
        ];

        $gameModel->insertScore($data);

        // Obter a posição do jogador
        $position = $gameModel->getPosition($game, $pontuacao, date('Y-m-d'));

        // Obter o top 10 para aquele jogo e data
        $top10 = $gameModel->getTop10($game, date('Y-m-d'));

        // Montar a resposta
        $response = [
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'game' => $game,
            'pontuacao' => $pontuacao,
            'posicao' => $position,
            'top10' => $top10,
        ];

        return $this->respond($response);
    }

    public function getTop10()
{
    // Verifica se o token está presente no cabeçalho da requisição
    $token = $this->request->getHeader('Authorization');

    if (empty($token) || $token->getValue() !== 'Bearer ' . config('App')->apiSecret) {
        return $this->failUnauthorized('Token inválido.');
    }

    $json = $this->request->getJSON();

    // Validação básica para garantir que os campos necessários estejam presentes no JSON
    if (!isset($json->game) || !isset($json->data)) {
        return $this->fail('Os campos game e data são obrigatórios no JSON.');
    }

    $data = date('Y-m-d', strtotime(str_replace('/', '-', $json->data)));
    $gameModel = new GameModel();
    $top10 = $gameModel->getTop10($json->game, $data);
    return $this->respond($top10);
}
}
