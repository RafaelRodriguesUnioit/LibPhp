<?php

namespace App\Services\Connection;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TecbaseApi
{
    protected $client;

    /**
     * Classe responsável por estabelecer a conexão com a API Tecbase.
     */
    public function __construct(array $config = [])
    {
        // Configurações padrão do Guzzle HTTP Client
        $defaultConfig = [
            'base_uri' => getenv("URL_TECBASE_API"), // URL base para todas as requisições
            'timeout' => 10, // Tempo limite (em segundos) para a requisição
            // Outras configurações padrão
        ];

        // Mescla as configurações padrão com as configurações fornecidas no construtor
        $mergedConfig = array_merge($defaultConfig, $config);

        // Cria uma nova instância do Guzzle HTTP Client com as configurações fornecidas
        $this->client = new Client($mergedConfig);
    }

    /**
     * Realiza uma requisição HTTP GET para a URL especificada.
     *
     * @param string $url A URL para a qual a requisição GET será feita.
     * @param array $options As opções adicionais para a requisição.
     * @return mixed O resultado da requisição GET.
     */
    public function get($url, $options = [])
    {
        return $this->request('GET', $url, $options);
    }

    /**
     * Envia uma requisição HTTP do tipo POST para a URL especificada.
     *
     * @param string $url A URL para a qual a requisição será enviada.
     * @param array $options As opções adicionais para a requisição.
     * @return mixed O resultado da requisição.
     */
    public function post($url, $options = [])
    {
        return $this->request('POST', $url, $options);
    }

    /**
     * Envia uma requisição HTTP do tipo PUT para a URL especificada.
     *
     * @param string $url A URL de destino da requisição.
     * @param array $options As opções adicionais para a requisição.
     * @return mixed O resultado da requisição.
     */
    public function put($url, $options = [])
    {
        return $this->request('PUT', $url, $options);
    }

    /**
     * Deletes a resource using the DELETE method.
     *
     * @param string $url The URL of the resource to delete.
     * @param array $options Additional options for the request.
     * @return mixed The response from the DELETE request.
     */
    public function delete($url, $options = [])
    {
        return $this->request('DELETE', $url, $options);
    }

    /**
     * Realiza uma requisição HTTP utilizando o método especificado.
     *
     * @param string $method O método HTTP a ser utilizado (por exemplo, GET, POST, PUT, DELETE).
     * @param string $url A URL para a qual a requisição será enviada.
     * @param array $options As opções adicionais para a requisição (opcional).
     * @return array Os detalhes da resposta da requisição, incluindo o status, corpo e cabeçalhos.
     *               Em caso de falha na requisição, retorna um array com a chave 'error' contendo a mensagem de erro.
     */
    protected function request($method, $url, $options = [])
    {
        try {
            $response = $this->client->request($method, $url, $options);

            return [
                'status' => $response->getStatusCode(),
                'body' => $response->getBody()->getContents(),
                'headers' => $response->getHeaders(),
            ];
        } catch (GuzzleException $e) {
            return [
                'error' => 'Falha na requisição: ' . $e->getMessage(),
            ];
        }
    }
}
