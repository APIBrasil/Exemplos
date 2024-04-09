
async function showDevice(search){

    // configuração para requisição obter os devices
    // informe o seu BearerToken
    // não se esqueça de deixar a palavra Bearer antes do token

    const config = {
        method: 'post',
        url: 'https://gateway.apibrasil.io/api/v2/devices/show',
        headers: { 
            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BsYXRhZm9ybWEuYXBpYnJhc2lsLmNvbS5ici9hdXRoL2xvZ2luIiwiaWF0IjoxNzA3MzM4ODY0LCJleHAiOjE3Mzg4NzQ4NjQsIm5iZiI6MTcwNzMzODg2NCwianRpIjoibWUxOGtacXNqcWVTTzk2UiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Ohnimrf3fVvkO6JZUpSTcELUaj5nYcSE3kYts9jivwQ'
        },
        data : { search: search }
    };

    axios.request(config)
    .then((response) => {

        
        // pega os dados da resposta
        const data = response.data;
        console.log('Show Device', data);

        // Set modal title
        const modalTitle = document.querySelector('.modal-title');
        modalTitle.innerHTML = `Device: ${data.device_name}`;

        // Preparar os campos que deseja exibir no modal
        const fieldsToShow = {
            "created_at": "Created At",
            "device_ip": "Device IP",
            "device_key": "Device Key",
            "device_token": "Device Token",
            "last_activity": "Last Activity",
            "number_device": "Number Device",
            "search": "Search",
            "server_limited": "Server Limited",
            "status_situation": "Status Situation",
            "type": "Type",
            "updated_at": "Updated At",
            "webhook_wh_connect": "Webhook WH Connect",
            "webhook_wh_message": "Webhook WH Message",
            "webhook_wh_qr_code": "Webhook WH QR Code",
            "webhook_wh_status": "Webhook WH Status"
            // Adicione outros campos conforme necessário
        };

        // Preparar o HTML para os campos do modal
        let modalBodyHTML = '';
        
        //create row
        modalBodyHTML += `<div class="row">`;        

        for (const key in fieldsToShow) {
            if (data.hasOwnProperty(key)) {
                modalBodyHTML += `<div class="col-3 mb-3">
                                <label for="${key}" class="form-label">${fieldsToShow[key]}</label>
                                <input type=0"text" class="form-control" id="${key}" value="${data[key]}" disabled>
                                </div>`;
            }
        }

        //close row
        modalBodyHTML += `</div>`;

        // Preencher o modal-body com os campos dinâmicos
        const modalBody = document.querySelector('.modal-body');
        modalBody.innerHTML = modalBodyHTML;
        


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

}
