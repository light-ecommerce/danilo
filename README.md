
# Projeto

Realizar cadastro de cliente nas seguintes condições:

## Utilizar Codeigniter 3
https://api.github.com/repos/bcit-ci/CodeIgniter/zipball/refs/tags/3.1.13


## O sistema deverá ter 3 telas:
>Listagem com opções: 
* editar, excluir(com confirmação de exclusão) >> em cada item da listagem
* novo cadastro >> no topo da listagem

>Cadastro
>
>Alteração

# Os dados devem seguir as seguintes regras de validações

## dados pessoais
>nome 
- max 200 caracteres

>tipo de pessoa
- se Física CPF/RG
- se Jurídica CNPJ/IE
- validar formato apenas de CPF/CNPJ
- não precisa validar se o CPF/CNPJ é valido

>Sexo
- gravar como Integer

>data de cadastro
- data valida

>telefone
- gravar com mascara

>email
- email válido 

>observaçoes
- campo texto livre

## endereço
> cep
- 8 digitos

> logradouro
- max 200 caracteres

> numero
- max 10 digitos
- permitir letras 

> complemento
- max 255 caracteres

> bairro 
- max 100 caracteres

> uf
- 2 caracteres

> ibge
- Integer

## Implementar autocomplete ao digitar cep com:
https://viacep.com.br/
