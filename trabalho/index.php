<?php   
include 'conexao.php';   
$x = 0;  

while (true) { // Alterado para que `9` seja o código de saída  
    echo "\n=====================\n";
    echo "   GERENCIAMENTO DE EVENTOS   \n";
    echo "=====================\n";
    echo "Escolha uma opção:\n";
    echo "  1. Listar eventos com mais participantes\n";
    echo "  2. Atividades de um evento com média de participação\n";
    echo "  3. Palestrante com mais atividades ministradas em um período\n";
    echo "  4. Participantes presentes em todas as atividades de um evento\n";
    echo "  5. Ranking de patrocinadores por valor total\n";
    echo "  6. Certificados emitidos e percentual de atividades concluídas\n";
    echo "  7. Gerenciar Triggers e Procedures\n";
    echo "  8. Sair\n";
    echo "Digite sua escolha: ";  
    
    $x = trim(fgets(STDIN));   
    echo "Você escolheu: $x\n";  

    switch ((int)$x) { // Converter $x para inteiro  
        case 1: 
             
            getEventParticipants($conexao);
            break;  
        case 2:  
            getAverageParticipants($conexao);  
            break;  
        case 3:  
            echo "Informe a data inicial do período ministrado (YYYY-MM-DD): ";  
            $data_inicio = trim(fgets(STDIN));  
            echo "Informe a data final do período ministrado (YYYY-MM-DD): ";  
            $data_fim = trim(fgets(STDIN));  
            getMostActiveSpeaker($conexao, $data_inicio, $data_fim); // Função exemplo  
            break;  
        case 4:   
            echo "Informe uma identificação para o evento: ";  
            $evento_id = trim(fgets(STDIN));  
            getParticipantsWithFullAttendance($conexao, $evento_id);  
            break;  
        case 5:  
            getSponsorRanking($conexao);  
            break;  
        case 6:  
            getTotalCertificatesAndCompletionRate($conexao);  
            break;  
        case 7: 
            echo "Informe um nome para sua Trigger\nR:";
            $nomeTrigger = trim(fgets(STDIN));  
            createTrigger($conexao, $nomeTrigger); 
            //nomeando procedure
            echo "Crie um nome para sua Procedure\nR:";
            $nomeProcedure = trim(fgets(STDIN));
            createStoredProcedure($conexao, $nomeProcedure);
            echo "Escolha uma operação:\n";  
            echo "1: Registrar Inscrição\n";  
            echo "2: Gerar Relatório\n";  
            $opcao = trim(fgets(STDIN));  

            if ($opcao == 1) {  
                echo "Informe o ID do Participante: ";  
                $participante_id = trim(fgets(STDIN));  
                
                echo "Informe o ID do Evento: ";  
                $evento_id = trim(fgets(STDIN));  
                
                echo "Informe a Data da Inscrição (YYYY-MM-DD): ";  
                $data_inscricao = trim(fgets(STDIN));  
                
                echo "Informe o Status de Pagamento (pago, pendente, cancelado): ";  
                $status_pagamento = trim(fgets(STDIN));  
                
                echo "Informe a Forma de Pagamento (cartao_credito, cartao_debito, boleto, transferencia, paypal): ";  
                $forma_pagamento = trim(fgets(STDIN));  
                
                // Chama a função para inserir inscrição  
                insertRegistration($conexao, $participante_id, $evento_id, $data_inscricao, $status_pagamento, $forma_pagamento);  
                generateReport($conexao,$nomeProcedure); 
            } elseif ($opcao == 2) {  
               
                generateReport($conexao,$nomeProcedure);  
            } else {  
                echo "Opção inválida.\n";  
            }  
            break;  
    
        case 8:  
            echo "Saindo do menu. Até logo!\n";  
            break; // Opcional, pois a condição do while já verificou este caso  
        default:  
            echo "Opção inválida. Tente novamente.\n"; // Tratamento de entrada inválida  
            break;  
    }  
}  
?>