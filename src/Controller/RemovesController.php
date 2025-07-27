<?php
namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class RemovesController extends AppController
{
    public function removeruser()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $user = $this->Users->get($id);
                $this->Users->delete($user);
                $response = 'Usuário removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Usuário não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removerservico()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $servico = $this->Servicos->get($id);
                $this->Servicos->delete($servico);
                $response = 'Serviço removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Serviço não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removerfornecedor()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $fornecedor = $this->Fornecedors->get($id);
                $this->Fornecedors->delete($fornecedor);
                $response = 'Fornecedor removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Fornecedor não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removerpeca()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $peca = $this->Pecas->get($id);
                $this->Pecas->delete($peca);
                $response = 'Peça removida com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Peça não encontrada!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removerfabricante()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $fabricante = $this->Fabricantes->get($id);
                $this->Fabricantes->delete($fabricante);
                $response = 'Fabricante removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Fabricante não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removetipo()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $tipo = $this->Tipos->get($id);
                $this->Tipos->delete($tipo);
                $response = 'Tipo removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Tipo não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removerveiculo()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $veiculo = $this->Veiculos->get($id);
                $this->Veiculos->delete($veiculo);
                $response = 'Veículo removido com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Veículo não encontrado!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removermanutencao()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $manutencao = $this->Manutencaos->get($id);
                $this->Manutencaos->delete($manutencao);
                $response = 'Manutenção removida com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Manutenção não encontrada!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function removermanupeca()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $manupeca = $this->Manupecas->get($id);
                $this->Manupecas->delete($manupeca);
                $response = 'Peça da manutenção removida com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Peça da manutenção não encontrada!';
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }
}
