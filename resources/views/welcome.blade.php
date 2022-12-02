<header>
    <style>
        table, th, td {
  border:1px solid black;
}
    </style>
</header>
<body>
    <h1>Digite o cep:</h1>
    <input id="cep">
    <button type="submit" onclick="viacep()">Enviar</button>
    <br>
    <table>
    <tr>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Localidade</th>
        <th>Uf</th>
        <th>Ibge</th>
        <th>Gia</th>
        <th>DDD</th>
        <th>Siafi</th>

    </tr>
    @foreach($events as $event)

    <tr class="tr">
        <td class="td">{{$event ->cep }}</td>
        <td>{{$event ->logradouro }}</td>
        <td>{{$event ->complemento }}</td>
        <td>{{$event ->bairro }}</td>
        <td>{{$event ->localidade }}</td>
        <td>{{$event ->uf }}</td>
        <td>{{$event ->ibge }}</td>
        <td>{{$event ->gia }}</td>
        <td>{{$event ->ddd }}</td>
        <td>{{$event ->siafi }}</td>
        <br>
    </tr>
    @endforeach
    </table>
    <script>

        function viacep(){
            console.log("entrou função via cep")
            var cep = document.getElementById('cep').value;
            var url = `https://viacep.com.br/ws/${cep}/json/`
            var responde = ''
            console.log(cep)
            fetch(url).then(function(response){
                response.json().then(function(data){
                    enviarcep(data);
                    location.reload()
                });
            });
                
        }

        function enviarcep(Info){
            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", "Coloque token aqui");
            myHeaders.append("Content-Type", "application/json");
               
            var raw = JSON.stringify(Info);

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
            };

            fetch("http://127.0.0.1:8000/create", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
                                
        }
    </script>

    <?php

    ?>

</body>


