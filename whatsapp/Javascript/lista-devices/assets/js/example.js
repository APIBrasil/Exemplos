
window.onload = async () => {
    
    const BEARER_TOKEN = `eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BsYXRhZm9ybWEuYXBpYnJhc2lsLmNvbS5ici9hdXRoL2xvZ2luIiwiaWF0IjoxNjc2MzA0NjgxLCJleHAiOjE3MDc4NDA2ODEsIm5iZiI6MTY3NjMwNDY4MSwianRpIjoiNEVBWDBubWFPUDVaazN0UiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.vwT4CM5BTl8_OmnKw8dIxi3qe1WPKcfTL3x6KhcwVaY`;
    await getDevices(BEARER_TOKEN);

};

async function getDevices(bearerToken){

    var settings = {
        "url": "https://gateway.apibrasil.io/api/v2/devices",
        "method": "GET",
        "timeout": 0,
        "headers": {
          "Authorization": `Bearer ${bearerToken}`
        },
    };
      
    $.ajax(settings).done(function (response) {
        console.log(response);
        //add in table 
        response.forEach(element => {
            $('.table').append(`
                <tr>
                    <td>${element.search ?? ""}</td>
                    <td>${element.device_name ?? ""}</td>
                    <td>${element.number_device ?? ""}</td>
                    <td>${element.last_activity ?? ""}</td>
                    <td>${element.status ?? ""}</td>
                    <td>
                        <a href="" class="btn btn-xl bg-primary text-white" onclick="">Editar</a>
                    </td>
                </tr>
            `);
            }
        ); 
    });

}
