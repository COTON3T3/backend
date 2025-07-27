<?php
namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\Exception\PersistenceFailedException;

class EditasController extends AppController
{
    public function editaruser()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $user = $this->Users->get($id);
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $this->Users->saveOrFail($user);
                $response = 'Usuário editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Usuário não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarservico()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $servico = $this->Servicos->get($id);
                $servico = $this->Servicos->patchEntity($servico, $this->request->getData());
                $this->Servicos->saveOrFail($servico);
                $response = 'Serviço editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Serviço não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarfornecedor()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $fornecedor = $this->Fornecedors->get($id);
                $fornecedor = $this->Fornecedors->patchEntity($fornecedor, $this->request->getData());
                $this->Fornecedors->saveOrFail($fornecedor);
                $response = 'Fornecedor editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Fornecedor não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarpeca()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $peca = $this->Pecas->get($id);
                $peca = $this->Pecas->patchEntity($peca, $this->request->getData());
                $this->Pecas->saveOrFail($peca);
                $response = 'Peça editada com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Peça não encontrada!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarfabricante()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $fabricante = $this->Fabricantes->get($id);
                $fabricante = $this->Fabricantes->patchEntity($fabricante, $this->request->getData());
                $this->Fabricantes->saveOrFail($fabricante);
                $response = 'Fabricante editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Fabricante não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editartipo()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $tipo = $this->Tipos->get($id);
                $tipo = $this->Tipos->patchEntity($tipo, $this->request->getData());
                $this->Tipos->saveOrFail($tipo);
                $response = 'Tipo editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Tipo não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarveiculo()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $veiculo = $this->Veiculos->get($id);
                $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
                $this->Veiculos->saveOrFail($veiculo);
                $response = 'Veículo editado com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Veículo não encontrado!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarmanutencao()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $manutencao = $this->Manutencaos->get($id);
                $manutencao = $this->Manutencaos->patchEntity($manutencao, $this->request->getData());
                $this->Manutencaos->saveOrFail($manutencao);
                $response = 'Manutenção editada com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Manutenção não encontrada!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function editarmanupeca()
    {
        $statusCode = 200;
        $response = null;
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            try {
                $manupeca = $this->Manupecas->get($id);
                $manupeca = $this->Manupecas->patchEntity($manupeca, $this->request->getData());
                $this->Manupecas->saveOrFail($manupeca);
                $response = 'Peça da manutenção editada com sucesso!';
            } catch (RecordNotFoundException $e) {
                $statusCode = 404;
                $response = 'Peça da manutenção não encontrada!';
            } catch (PersistenceFailedException $e) {
                $statusCode = 400;
                $response = $e->getAttributes();
            }
        }
        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }
}
