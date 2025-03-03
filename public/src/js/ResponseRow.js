
export default class ResponseRow {

    constructor(parent, currentPage) {
        this.parent = parent;
        this.currentPage = currentPage;
    }

    add({id, name, price, platform}) {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-2', 'align-items-center');
        
        // Columna ID
        const idCol = document.createElement('div');
        idCol.classList.add('col');
        idCol.textContent = id;
        
        // Columna Nombre
        const nameCol = document.createElement('div');
        nameCol.classList.add('col');
        nameCol.textContent = name;
        
        // Columna Precio
        const priceCol = document.createElement('div');
        priceCol.classList.add('col');
        priceCol.textContent = `${price}€`;
        
        // Columna Plataforma
        const platformCol = document.createElement('div');
        platformCol.classList.add('col');
        platformCol.textContent = platform;
        
        // Columna Acciones
        const actionsCol = document.createElement('div');
        actionsCol.classList.add('col');

        // Botones de acciones
        const buttonView = document.createElement('a');
        buttonView.textContent = 'ver';
        buttonView.setAttribute('data-bs-toggle', 'modal');
        buttonView.setAttribute('data-bs-target', '#viewModal');
        buttonView.classList.add('btn', 'btn-primary', 'col-auto', 'me-2');
        buttonView.dataset.id = id;
        buttonView.dataset.name = name;
        buttonView.dataset.price = price;
        buttonView.dataset.platform = platform;
        buttonView.dataset.url = "/game/" + id;
        buttonView.dataset.method = "get";

        const buttonEdit = document.createElement('a');
        buttonEdit.textContent = 'editar';
        buttonEdit.setAttribute('data-bs-toggle', 'modal');
        buttonEdit.setAttribute('data-bs-target', '#editModal');
        buttonEdit.classList.add('btn', 'btn-warning', 'col-auto', 'me-2');
        buttonEdit.dataset.id = id;
        buttonEdit.dataset.name = name;
        buttonEdit.dataset.price = price;
        buttonEdit.dataset.platform = platform;
        buttonEdit.dataset.url = "/game/" + id;
        buttonEdit.dataset.method = "put";

        const buttonDelete = document.createElement('a');
        buttonDelete.textContent = 'eliminar';
        buttonDelete.setAttribute('data-bs-toggle', 'modal');
        buttonDelete.setAttribute('data-bs-target', '#deleteModal');
        buttonDelete.classList.add('btn', 'btn-danger', 'col-auto');
        buttonDelete.dataset.id = id;
        buttonDelete.dataset.name = name;
        buttonDelete.dataset.price = price;
        buttonDelete.dataset.platform = platform;
        buttonDelete.dataset.url = "/game/" + id;
        buttonDelete.dataset.method = "delete";

        // Agregar botones a la columna de acciones
        actionsCol.appendChild(buttonView);
        actionsCol.appendChild(buttonEdit);
        actionsCol.appendChild(buttonDelete);

        // Agregar todas las columnas a la fila
        row.appendChild(idCol);
        row.appendChild(nameCol);
        row.appendChild(priceCol);
        row.appendChild(platformCol);
        row.appendChild(actionsCol);
        
        this.parent.appendChild(row);
    }

    #createElementWithClass(tag, className) {
        const element = document.createElement(tag);
        element.classList.add(className);
        return element;
    }

    oldadd(data) {
        const div = document.createElement('div');
        const {id, name, price} = data;
        let textNode = document.createTextNode(id + ' ' + name + ' ' + price);
        div.appendChild(textNode);

        const buttonView = document.createElement('button');
        textNode = document.createTextNode('view');
        buttonView.appendChild(textNode);
        buttonView.setAttribute('data-bs-toggle', 'modal');;
        buttonView.setAttribute('data-bs-target', '#viewModal');
        buttonView.classList.add('btn', 'btn-primary');
        buttonView.dataset.id = id;
        buttonView.dataset.name = name;
        buttonView.dataset.price = price;
        buttonView.dataset.url = "/game/" + id;
        buttonView.dataset.method = "get";

        const buttonEdit = document.createElement('button')
        textNode = document.createTextNode('edit');
        buttonEdit.appendChild(textNode);
        buttonEdit.setAttribute('data-bs-toggle', 'modal');
        buttonEdit.setAttribute('data-bs-target', '#editModal');
        buttonEdit.classList.add('btn', 'btn-warning');
        buttonEdit.dataset.id = id;
        buttonEdit.dataset.name = name;
        buttonEdit.dataset.price = price;
        buttonEdit.dataset.url = "/game/" + id;
        buttonEdit.dataset.method = "put";

        const buttonDelete = document.createElement('button')
        textNode = document.createTextNode('delete');
        buttonDelete.appendChild(textNode);
        buttonDelete.setAttribute('data-bs-toggle', 'modal');
        buttonDelete.setAttribute('data-bs-target', '#deleteModal');
        buttonDelete.classList.add('btn', 'btn-danger');
        buttonDelete.dataset.id = id;
        buttonDelete.dataset.name = name;
        buttonDelete.dataset.price = price;
        buttonDelete.dataset.url = "/game/" + id;
        buttonDelete.dataset.method = "delete";

        div.appendChild(buttonView);
        div.appendChild(buttonEdit);
        div.appendChild(buttonDelete);

        this.parent.appendChild(div);
    }
}