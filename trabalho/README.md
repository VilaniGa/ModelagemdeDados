## Visão Geral
Este script em PHP implementa funcionalidades para gerenciar eventos, inscrições, atividades, patrocinadores e geração de relatórios utilizando o banco de dados MySQL. Ele inclui métodos para manipular dados, criar triggers e procedimentos armazenados, além de exibir relatórios com informações úteis.

## Dependências
PHP: Versão 7.4 ou superior
MySQL
Extensão MySQLi habilitada no servidor PHP
Configuração da Conexão com o Banco de Dados
Os dados de conexão com o banco de dados estão configurados no início do script:

$dbserver = '127.0.0.1';  
$bdUsuario = 'gabriel';  
$bdSenha = 'uGKa4sQfGqmKcZRZ';  
$db = 'gabriel';  


Certifique-se de atualizar esses valores de acordo com suas credenciais antes de utilizar o script.

## Funções Implementadas
1. ### `getEventParticipants($conexao)`
Retorna os 10 eventos com mais participantes inscritos. Exibe o nome do evento e o número total de participantes.

2. ### `getAverageParticipants($conexao)`
Calcula a média de participantes por atividade para cada evento. Mostra o título da atividade, o evento associado e a média.

3. ### `getMostActiveSpeaker($conexao, $data_inicio, $data_fim)`
Identifica o palestrante que ministrou mais atividades em um período específico.

4. ### `getParticipantsWithFullAttendance($conexao, $evento_id)`
Lista os participantes que compareceram a todas as atividades de um evento específico.

5. ### `getSponsorRanking($conexao)`
Gera um ranking dos patrocinadores baseado no valor total de apoio fornecido.

6. ### `getTotalCertificatesAndCompletionRate($conexao)`
Exibe o total de certificados emitidos e o percentual de atividades concluídas por evento.

7. ### `createTrigger($conexao, $nomeTrigger)`
Cria uma trigger para atualizar o número de participantes totais em um evento após uma nova inscrição.

8. ### `createStoredProcedure($conexao, $nomeProcedure)`
Define um procedimento armazenado para consolidar dados de participantes e certificados emitidos por evento.

9. ### `insertRegistration($conexao, $participante_id, $evento_id, $data_inscricao, $status_pagamento, $forma_pagamento)`
Insere uma nova inscrição no banco de dados com validação prévia do evento.

10. ### `generateReport($conexao,$nomeProcedure)`
Executa um procedimento armazenado para gerar relatórios de participantes e certificados emitidos.

## Como Usar
Configuração Inicial
Atualize as credenciais de conexão com o banco de dados no arquivo conexao.php.
No terminal, execute o comando `php.index`


