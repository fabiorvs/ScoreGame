<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GameModel;

class ExportController extends BaseController
{
    public function index()
    {
        $gameModel = new GameModel();
        $score = $gameModel->getScore();
        $dados = [
            'score' => $score,
        ];
        // dd($dados);
        return view('exportar', $dados);
    }
}
