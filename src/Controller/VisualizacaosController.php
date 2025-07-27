<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Fornecedor;
use Cake\ORM\Exception\PersistenceFailedException;
use http\Message;
use function PHPUnit\Framework\isNull;

class VisualizacaosController extends AppController{

    public function visualManutencao()
    {
        $response = null;
        $statusCode = 200;

        if ($this->request->is('post')) {
            $manutencaos = $this->fetchTable('Manutencaos');
            if (empty($this->request->getData()['id'])) {
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id";
                $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
            } else {
                $id = $this->request->getData('id');
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id WHERE m.id = :id";
                $response = $GLOBALS['connection']->execute($sql, ['id' => $id])->fetchAll('assoc');
            }
            return $this->response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withStatus($statusCode)
                ->withType('application/json')
                ->withStringBody(json_encode($response));
        }
    }

    public function historicoVeiculo()
    {
        $response = null;
        $statusCode = 200;

        if ($this->request->is('post')) {
            $placa = $this->request->getData('placa');
            if (empty($placa)) {
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,v.ano,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id";
                $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
            } else {
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,v.ano,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id WHERE v.placa = :placa";
                $response = $GLOBALS['connection']->execute($sql, ['placa' => $placa])->fetchAll('assoc');
            }
            return $this->response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withStatus($statusCode)
                ->withType('application/json')
                ->withStringBody(json_encode($response));
        }
    }

    public function pecasTrocadas()
    {
        $response = null;
        $statusCode = 200;

        if ($this->request->is('post')) {
            $placa = $this->request->getData('placa');
            if (empty($placa)) {
                $sql = "SELECT m.id AS manutencao_id, p.nome, p.valor FROM manutencaos m JOIN manupecas mp ON m.id = mp.manutencao_id JOIN pecas p ON mp.peca_id = p.id";
                $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
            } else {
                $sql = "SELECT m.id AS manutencao_id, p.nome, p.valor FROM manutencaos m JOIN manupecas mp ON m.id = mp.manutencao_id JOIN pecas p ON mp.peca_id = p.id JOIN veiculos v ON m.veiculo_id = v.id WHERE v.placa = :placa ORDER BY m.data DESC";
                $response = $GLOBALS['connection']->execute($sql, ['placa' => $placa])->fetchAll('assoc');
            }
            return $this->response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withStatus($statusCode)
                ->withType('application/json')
                ->withStringBody(json_encode($response));
        }
    }

    //------------------------------------------------------------------------------

    public function buscarfornecedor() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM fornecedors WHERE fornecedors.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM fornecedors ORDER BY fornecedors.nome ASC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function buscarveiculo() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM veiculos WHERE veiculos.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM veiculos ORDER BY veiculos.placa ASC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function buscarpeca() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM pecas WHERE pecas.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM pecas ORDER BY pecas.nome ASC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function buscarservico() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM servicos WHERE servicos.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM servicos ORDER BY servicos.nome ASC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function buscarfabricante() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM fabricantes WHERE fabricantes.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM fabricantes ORDER BY fabricantes.nome ASC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function buscarmanutencao() {
        $response = null;
        $statusCode = 200;
        $id = $this->request->getData('id')[0] ?? null;
        if ($this->request->is('post') && !empty($id)) {
            $sql = 'SELECT * FROM manutencaos WHERE manutencaos.id = ' . $id;
        } else {
            $sql = 'SELECT * FROM manutencaos ORDER BY manutencaos.data DESC';
        }
        $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }
}

    

    

