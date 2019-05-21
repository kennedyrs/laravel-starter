<?php

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

/**
 * TODO FUNÇÃO QUE ESCONDE O EMAIL DA PESSOA
 *
 * $email = 'kennedywork@outlook.com.br';
$nome = '';
$dominio = '';
$count = 0;

$strings = explode('@', $email, 2);
foreach ($strings as $string){
if($count <= 0 )
$nome = $string;
else
$dominio = $string;

$count = $count+1;
}

echo substr($nome, 0, strlen($nome)/2)."...@";
echo "...".substr($dominio, floor((strlen($dominio)/2)*-1));
 */

if(!function_exists('converteDataPtBrParaMysql')){
    function converteDataPtBrParaMysql($data) {
        if($data == '0000-00-00'){
            return ;
        }
        return $data = implode("-", array_reverse(explode("/", $data)));
    }
}

if(!function_exists('converteMysqlDateTimeParaPtBr')){
    function converteMysqlDateTimeParaPtBr($data) {
        if(!$data){
            return ;
        }

        $objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);

        $data = $objDate->format('d/m/Y');

        return $data;
    }
}


if(!function_exists('converteMysqlParaPtBr')){
    function converteMysqlParaPtBr($data) {
        if($data == '0000-00-00'){
            return ;
        }
        $data = implode("/", array_reverse(explode("-", $data)));
        return $data;
    }
}

if(!function_exists('converteCreatedUpdated')){
    function converteCreatedUpdated($data) {
        if($data == ''){
            return ;
        }
        $date = new \DateTime($data);
        return $date->format('d/m/Y H:i:s');
    }
}

if(!function_exists('ajustarNome'))
{
    /**
     * Essa Funcção recebe o nome completo de uma pessoa,
     * e retorna o nome formatado com as letras iniciais em
     * caixa alta, mas nomes como 'das', 'de', 'dos', permanecem
     * em caixa baixa.
     *
     * @param $nomeCompleto
     * @return string
     * @Ex-Param: KennEDY RODRIGUEs DE souza
     * @EX-Retorno: Kennedy Rodrigues de Souza
     */
    function ajustarNome($nomeCompleto)
    {
        $nome = explode(' ', trim($nomeCompleto));

        foreach ($nome as &$item) {
            if (strlen($item) >= 3)
            {
                $item = ucwords(strtolower($item));
            }
            else
            {
                $item = strtolower($item);
            }
        }
        unset($item);

        return implode(' ', $nome);
    }
}

if(!function_exists('primeiroNome'))
{
    /**
     * Essa Funcção recebe o nome completo de uma pessoa,
     * e retorna o seu primeiro nome formatado com as letras iniciais em
     * caixa alta.
     *
     * @param $nomeDaPessoa
     * @return string
     */
    function primeiroNome($nomeDaPessoa)
    {
        $nome = explode(' ', trim($nomeDaPessoa));

        return ucwords(strtolower($nome[0]));
    }
}


if(! function_exists('validaCPF')){
    function validaCPF($cpf) {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
}


if(!function_exists('removeEspace')){
    function removeEspace($value) {

        if (empty($value)) {
            return false;
        }

        $valor = trim($value);
        $valor = preg_replace('/[^a-z0-9]/i',"", $valor);

        return $valor;
    }
}



//api google para localizar endereço do eleitor e setar no banco

if(!function_exists('buscaEnderecoMaps')){
    function buscaEnderecoMaps($value)
    {

        try {
            $client = new GuzzleHttpClient();

            $headers = ['Accept' => 'application/json','Content-Type' => 'application/json; charset=UTF-8'];

            $apiRequestGoogleMaps = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address='.$value.'&key=AIzaSyBTa0TkTmZJixAZlf7zg6RL3dqZLSUQ_EA', ['headers' => $headers]);

            $respostaJson = json_decode($apiRequestGoogleMaps->getBody());

            //verifica se existe retorno
            if($respostaJson->status != 'OK'){
                return json_encode(['results' => 0]);
            }

            //return json_encode($respostaJson);
            return json_encode(['results' => $respostaJson->results[0]->geometry->location]);

        } catch (Exception $e) {

        }

    }
}
