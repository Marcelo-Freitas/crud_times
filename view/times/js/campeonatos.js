const baseUrl = document.getElementById('hddBaseUrl').value;

const inputNome = document.getElementById('txtNome');
const inputAno = document.getElementById('numAno');
const inputEstado = document.getElementById('selEstado');
const inputCampeonato = document.getElementById('selCampeonato');
const inputClassificacao = document.getElementById('numClass');
const inputIdTime = document.getElementById('idTime');

const divErros = document.getElementById('divMsgErro');

buscarCampeonatos();
function buscarCampeonatos() {
    //Remover os options já existentes no select de disciplina
    while(inputCampeonato.children.length > 0) {
        inputCampeonato.children[0].remove();
    }

    //Criar option vazia
    criarOptionCampeonato("---Selecione---", "", "--");

    var idSelecionado =
        inputCampeonato.getAttribute("idSelecionado");

    //Requisição AJAX
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/listar_por_estado.php" +
        "?idEstado=" + inputEstado.value;
    xhttp.open("GET", url);

    //Funcão de retorno executada após a
    //resposta do servidor chegar no cliente
    xhttp.onload = function() {
        //Resposta da requisição
        console.log("Resposta recebida do servidor!", xhttp.responseText);

        var json = xhttp.responseText;
        var estados = JSON.parse(json);
        
        estados.forEach(campeonato => {
            //Criar as opções para o select (tags <option>)
            //console.log(disc.codigo);
            criarOptionCampeonato(campeonato.nome, campeonato.id, idSelecionado);
        });
    }

    xhttp.send();
    console.log("Requisição enviada ao servidor!");
    console.log("Requisição enviada ao servidor - outra mensagem!");
    console.log("Requisição enviada ao servidor - mais uma mensagem!");
}

function criarOptionCampeonato(desc, valor, valorSelecionado) {
    var option = document.createElement("option");
    option.innerHTML = desc;
    option.setAttribute("value" , valor);

    if(valor == valorSelecionado)
        option.selected = true;

    inputCampeonato.appendChild(option);
}

function inserirTime() {
    //Estrutura FormData para enviar os parâmetros
    //no corpo da requisição do tipo POST
    var dados = new FormData();
    dados.append("nome", inputNome.value);
    dados.append("ano", inputAno.value);
    dados.append("idEstado", inputEstado.value);
    dados.append("idCampeonato", inputCampeonato.value);
    dados.append("classificacao", inputClassificacao.value);

    //console.log(inputNome.value+" "+inputAno.value+" "+inputEstado.value+" "+inputCampeonato.value+" "+inputClassificacao.value)

    //Requisição
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/inserir_time.php";

    xhttp.open("POST", url);
    xhttp.onload = function() {
        var resposta = xhttp.responseText;
        //console.log(resposta);

        if(resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            //Redirecionar para a listagem
            window.location = "listar.php";
        }
    }
    xhttp.send(dados);
}

function alterarTime() {
    var dados = new FormData();
    dados.append("nome", inputNome.value);
    dados.append("ano", inputAno.value);
    dados.append("idEstado", inputEstado.value);
    dados.append("idCampeonato", inputCampeonato.value);
    dados.append("classificacao", inputClassificacao.value);
    dados.append("id", inputIdTime.value);

    //console.log(inputNome.value+" "+inputAno.value+" "+inputEstado.value+" "+inputCampeonato.value+" "+inputClassificacao.value+" "+inputIdTime.value);

    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/alterar_time.php";

    xhttp.open("POST", url);
    xhttp.onload = function() {
        var resposta = xhttp.responseText;
        //console.log(resposta);

        if(resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            //Redirecionar para a listagem
            window.location = "listar.php";
        }
    }
    xhttp.send(dados);
}