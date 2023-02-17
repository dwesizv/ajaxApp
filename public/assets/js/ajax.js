/*global fetch*/

let csrf = document.querySelector('meta[name="csrf-token"]').content;

window.addEventListener('load', () => {
    document.getElementById('pagination').addEventListener('click', handleClick);
    fetchData('fetchdata');
});

window.onpopstate = function(e) {
    if(e.state) {
        //getPage(e.state.page, e.state.params);
        console.log('page');
        console.log(e.state);
    }
};

function fetchData(page) {
    pushState('?page=' + Math.floor(Math.random() * 100));
    fetch(page)
    .then(function(response) {
        return response.json();
    })
    .then(function(jsonData) {
        //console.log(jsonData);
        showData(jsonData);
    })
    .catch(function(error) {
        console.log(error);
    });
}

function handleClick(e) {
    if (e.target.classList.contains('pulsable')) {
        console.log(e.target.getAttribute('data-url'));
        fetchData(e.target.getAttribute('data-url'));
    }
}

function showData(data) {
    let tbody = document.getElementById('yateAjaxBody');
    let paginationDiv = document.getElementById('pagination');
    let yates = data.yates.data;
    let pagination = data.yates.links;

    //csrf
    console.log(csrf == data.csrf,csrf, data.csrf);

    // table body
    let string = '';
    yates.forEach(yate => {
        let descripcion = yate.descripcion.substring(1, 10);
        string += `
            <tr>
                <td>${yate.id}</td>
                <td>${yate.nombre}</td>
                <td>${yate.tnombre}</td>
                <td>${yate.uname}</td>
                <td>${yate.anombre}</td>
                <td>${descripcion}</td>
                <td>${yate.precio}</td>
            </tr>`
        ;
    });
    tbody.innerHTML = string;

    // pagination
    string = '';
    pagination.forEach(pag => {
        if (pag.active) {
            string += `
                <li class="page-item active" aria-current="page">
                    <span class="page-link pulsable" data-url="${pag.url}">${pag.label}</span>
                </li>
            `;
        } else if (pag.url != null) {
            string += `
                <li class="page-item">
                    <span class="btn btn-link pulsable" data-url="${pag.url}" id="${'pag' + pag.label}">${pag.label}</span>
                </li>
            `;
        } else {
            string += `
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">${pag.label}</span>
                </li>
            `;
        }
    });
    paginationDiv.innerHTML = string;
}

function pushState(url) {
    var jsonPage = {'url': url};
    window.history.pushState(jsonPage, '', url);
}