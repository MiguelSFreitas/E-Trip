<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E_TRIP</title>
    <link rel="stylesheet" href="style.css">
   
</head>

<body>


    <nav class="menu">
        <a href="index.php" class="marca">E_TRIP</a>
        <ul>
            <li><a href="index.php" class="ativo">Início</a></li>
            <li><a href="#viagem">Calcular viagem</a></li>
            <li><a href="#">Como funciona</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </nav>

  
    <header class="hero">
        <div class="hero-texto">
            <h1>E_TRIP</h1>
            <p>Escolha seu carro elétrico, a rota e a bateria que você tem.
                A gente calcula se você chega ou se precisa parar para carregar.</p>
            <a href="#viagem" class="hero-botao">Planejar viagem</a>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <div class="bateria">
                <span class="celula"></span>
                <span class="celula"></span>
                <span class="celula"></span>
                <span class="celula"></span>
                <span class="celula"></span>
            </div>
            <div class="estrada"><span class="carro"></span></div>
        </div>
    </header>


    <main class="camadas" id="viagem">

        <form method="post" action="CalculoEnergia.php" id="formulario"></form>

        <section class="camada" id="veiculo">
            <header class="camada-topo">
                <span class="passo">1</span>
                <div>
                    <h2>Seu carro</h2>
                    <p>O consumo muda de modelo para modelo.</p>
                </div>
            </header>

            <div class="campos">
                <p class="campo">
                    <label for="marca">Marca</label>
                    <select name="marca" id="marca" form="formulario">
                        <option value="BYD">BYD</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Tesla">Tesla</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Ford">Ford</option>
                    </select>
                </p>

                <p class="campo oculto" id="bloco_modelo">
                    <label for="modelo">Modelo</label>
                    <select name="modelo" id="modelo" form="formulario">
                        <option value=""></option>
                    </select>
                </p>

                <p class="campo oculto" id="bloco_versao">
                    <label for="versao">Versão</label>
                    <select name="versao" id="versao" form="formulario"></select>
                </p>
            </div>

            <input type="hidden" name="carro_id" id="carro_id" form="formulario">
        </section>

        <section class="camada" id="rota">
            <header class="camada-topo">
                <span class="passo">2</span>
                <div>
                    <h2>Sua rota</h2>
                    <p>De onde você sai e para onde vai.</p>
                </div>
            </header>

            <div class="campos">
                <p class="campo">
                    <label for="origem">Origem</label>
                    <select name="origem" id="origem" form="formulario" required>
                        <option value="">Carregando...</option>
                    </select>
                </p>

                <p class="campo">
                    <label for="destino">Destino</label>
                    <select name="destino" id="destino" form="formulario" required>
                        <option value="">Carregando...</option>
                    </select>
                </p>
            </div>
        </section>

        <section class="camada" id="bateria">
            <header class="camada-topo">
                <span class="passo">3</span>
                <div>
                    <h2>Sua bateria</h2>
                    <p>Quanto você tem ao sair e quanto quer ter ao chegar.</p>
                </div>
            </header>

            <div class="campos">
                <p class="campo">
                    <label for="percentual_saida">Bateria ao sair: <span id="valor_saida">80%</span></label>
                    <input type="range" name="percentual_saida" id="percentual_saida" form="formulario" min="0" max="100" value="80">
                </p>

                <p class="campo">
                    <label for="percentual_chegada">Bateria desejada na chegada: <span id="valor_chegada">20%</span></label>
                    <input type="range" name="percentual_chegada" id="percentual_chegada" form="formulario" min="0" max="100" value="20">
                </p>
            </div>

            <p id="aviso" class="aviso" role="alert"></p>
        </section>

        <div class="acao">
            <button type="submit" form="formulario">Calcular viagem</button>
        </div>

    </main>

    <footer class="rodape">E_TRIP</footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="sliders.js"></script>
    <script>
        document.querySelectorAll('input[type="range"]').forEach(function(r) {
            var pintar = function() {
                r.style.setProperty('--p', r.value + '%');
            };
            r.addEventListener('input', pintar);
            pintar();
        });
    </script>

</body>

</html>