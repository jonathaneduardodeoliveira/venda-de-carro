document.addEventListener("DOMContentLoaded", function() {
    const comprarBtn = document.getElementById('comprarBtn');
    const formContainer = document.getElementById('formContainer');

    comprarBtn.addEventListener('click', function() {
        formContainer.style.display = 'block';
    });

    const interestForm = document.getElementById('interestForm');
    interestForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Obter os dados do formulário
        const nome = document.getElementById('nomeInput').value;
        const email = document.getElementById('emailInput').value;
        const telefone = document.getElementById('celularInput').value;

        // Enviar os dados para o PHP via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'formulario.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Verificar a resposta do servidor e exibir a mensagem apropriada
                    const response = xhr.responseText;
                    if (response === 'success') {
                        alert('Registro inserido com sucesso!');
                    } else {
                        alert('Erro ao inserir registro. Tente novamente mais tarde ou entre em contato com o desenvolvedor do site.');
                    }
                } else {
                    alert('Erro ao enviar solicitação ao servidor. Tente novamente mais tarde.');
                }
            }
        };
        // Enviar os dados do formulário como string de consulta
        xhr.send('nome=' + encodeURIComponent(nome) + '&email=' + encodeURIComponent(email) + '&telefone=' + encodeURIComponent(telefone));
    });
});
