<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table = 'scores';
    protected $allowedFields = ['nome', 'email', 'telefone', 'game', 'pontuacao', 'data', 'todosdias', 'atual'];

    public function insertScore($data)
    {
        return $this->insert($data);
    }

    public function getPosition($game, $pontuacao, $data)
    {
        // Obter a posição do jogador no jogo
        $startOfDay = $data . ' 00:00:00';
        $endOfDay = $data . ' 23:59:59';
        $position = $this->db->table($this->table)
            ->where('game', $game)
            ->where('data >=', $startOfDay)
            ->where('data <=', $endOfDay)
            ->where('atual', '1')
            ->where('pontuacao >', $pontuacao)
            ->countAllResults() + 1;

        return $position;
    }

    public function getTop10($game, $data)
    {
        // Obter o top 10 para o jogo e data específicos
        $startOfDay = $data . ' 00:00:00';
        $endOfDay = $data . ' 23:59:59';

        $top10 = $this->db->table($this->table)
            ->select('nome, email, telefone, todosdias, data, game, pontuacao')
            ->where('game', $game)
            ->where('data >=', $startOfDay)
            ->where('data <=', $endOfDay)
            ->where('atual', '1')
            ->orderBy('pontuacao', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        foreach ($top10 as $key => &$player) {
            $player['posicao'] = $this->getPosition($game, $player['pontuacao'], $data);
        }

        return $top10;
    }

    public function existingScore($email, $game, $data)
    {
        //Verificar se o jogador ja tem pontuação no game
        $dataOriginal = $data;
        $time = Time::createFromFormat('Y-m-d H:i:s', $dataOriginal);
        $data = $time->toDateString();
        $startOfDay = $data . ' 00:00:00';
        $endOfDay = $data . ' 23:59:59';
        $score = $this
            ->select('*')
            ->where('email', $email)
            ->where('game', $game)
            ->where('data >=', $startOfDay)
            ->where('data <=', $endOfDay)
            ->where('atual', '1')
            ->first();
        return $score;
    }

    public function getScore()
    {
        $score = $this->db->table($this->table)
            ->select('nome, email, telefone, todosdias, data, game, pontuacao')
            ->where('atual', '1')
            ->orderBy('game', 'ASC')
            ->orderBy('pontuacao', 'DESC')
            ->get()
            ->getResultArray();

        foreach ($score as $key => &$player) {
            $dataOriginal = $player['data'];
            $time = Time::createFromFormat('Y-m-d H:i:s', $dataOriginal);
            $dataFormatada = $time->toDateString();
            $player['posicao'] = $this->getPosition($player['game'], $player['pontuacao'], $dataFormatada);
        }

        return $score;
    }
}
