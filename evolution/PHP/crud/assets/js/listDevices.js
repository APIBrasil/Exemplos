// configuração para requisição obter os devices
// informe o seu BearerToken
// não se esqueça de deixar a palavra Bearer antes do token

const config = {
    url: 'https://gateway.apibrasil.io/api/v2/devices',
    headers: { 
        'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BsYXRhZm9ybWEuYXBpYnJhc2lsLmNvbS5ici9hdXRoL2xvZ2luIiwiaWF0IjoxNzA3MzM4ODY0LCJleHAiOjE3Mzg4NzQ4NjQsIm5iZiI6MTcwNzMzODg2NCwianRpIjoibWUxOGtacXNqcWVTTzk2UiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Ohnimrf3fVvkO6JZUpSTcELUaj5nYcSE3kYts9jivwQ'
    }
};

axios.request(config)
.then((response) => {

    // pega os dados da resposta
    const data = response.data;
    console.log('Lista de Devices', data);

    // preenche a tabela com os devices
    const table = document.querySelector('table tbody');

    // percorre os devices que foram retornados
    data.forEach((item, index) => {

        // verifica se é um celular ou tablet para exibir o QRCode
        if (item?.type == 'cellphone' || item?.type == 'tablet') {
            qrcode = `<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><i class='bx bx-qr'></i></button>`;
        }

        const tr = document.createElement('tr');

        tr.innerHTML = `
            <th scope="row">${index + 1}</th>
            <td>${item?.device_name}</td>
            <td>${item?.service?.name}</td>
            <td>${item?.device_token}</td>
            <td>${item?.status}</td>
            <td>
                ${ typeof qrcode !== 'undefined' ? qrcode : '' }
                <button class="btn btn-sm btn-primary" onclick="showDevice('${item?.search}')" data-bs-toggle="modal" data-bs-target="#myModal"><i class='bx bx-show'></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteDevice('${item?.search}')"><i class='bx bx-trash'></i></button>
            </td>
        `;
        table.appendChild(tr);
    });

})
.catch((error) => {

    // possíveis códigos de erro
    // 401 Unauthorized
    // 500 Internal Server Error
    // 404 Not Found
    // 403 Forbidden
    // 400 Bad Request
    // 422 Unprocessable Entity
    // 429 Too Many Requests

    console.log(error);

    //escreve o erro em um alert na row
    const row = document.querySelector('.row');

    // cria um alerta
    const alert = document.createElement('div');
    alert.classList.add('alert', 'alert-danger');
    alert.innerHTML = `
        <h4 class="alert-heading">Erro ${error?.response?.status ?? ''}</h4>
        <p>${ JSON.stringify(error.response?.data) ?? ''}</p>
    `;
    row.appendChild(alert);

});