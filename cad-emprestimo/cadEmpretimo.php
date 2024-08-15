<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleEmprestimo.css">
    <title>Registro De Livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="topbar" id="header"></div>
    <div class="Encapsulamento">
        <div class="grayBox">
            <div class="CadastrarLivro">
                <span>CADASTRAR EMPRESTIMO</span>
            </div>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="form-group full-width imgContainerImg">
                    <!-- Image upload preview will be here -->
                </div>

                <div class="curso-turma">
                    <div class="form-nome">
                        <label for="Name">Nome do Estudante:</label>
                        <input type="text" id="Name" name="Name" placeholder="Digite o nome do estudante" required>
                    </div>

                    <div class="form-row">
                        <div class="form-cursos">
                            <label for="curso">Curso:</label>
                            <select id="curso" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informatica">Informática</option>
                                <option value="Adiministracao">Administração</option>
                                <option value="Comercio">Comércio</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-turma">
                            <label for="turma">Turma:</label>
                            <select id="turma" name="turma" required>
                                <option value="1">1º</option>
                                <option value="2">2º</option>
                                <option value="3">3º</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" id="matricula" name="matricula" placeholder="Digite a matrícula" required>
                </div>

                <div class="livro">
                    <div class="form-group">
                        <label for="titulolivro">Título do livro:</label>
                        <input type="text" id="titulolivro" name="titulolivro" placeholder="Digite o título do livro" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Autor do livro:</label>
                        <input type="text" id="author" name="author" placeholder="Digite o nome do autor" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="data">Escolha uma data:</label>
                        <input type="date" id="data" name="data" required>
                    </div>
                    <div class="form-group">
                        <label for="registrationNumber">Número de Registro:</label>
                        <input type="text" id="registrationNumber" name="registrationNumber" placeholder="Digite o número de registro" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="observacao">Observação:</label>
                        <input class="obs" type="text" id="observacao" name="observacao" placeholder="Digite aqui sua observação" required>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="cadastrarButton">
                        <i class="fas fa-check"></i> Adicionar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#header').load('../../Component/Menu_Nav');
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Impede o envio padrão do formulário

                const formData = new FormData(form);

                fetch('register.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        alert(result.message);
                        window.location.reload(); // Recarrega a página após o sucesso
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => {
                    alert('Erro ao realizar o cadastro.');
                });
            });

            const fileInput = document.getElementById('bookImage');
            const file
