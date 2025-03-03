import PageItem from './PageItem.js';
import ResponseRow from './ResponseRow.js';

export default class ResponseContent {

    constructor(content, paginationContent, userContent) {
        this.content = content;
        this.currentPage = 1;
        this.paginationContent = paginationContent;
        this.userContent = userContent;
        this.pageItem = new PageItem(this.paginationContent);
        this.responseRow = new ResponseRow(this.content);
    }

    cleanContent(element) {
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }
    }

    currentPage() {
        return this.currentPage;
    }

        setContent(result) {
        this.cleanContent(this.content);
        this.cleanContent(this.paginationContent);
    
        this.currentPage = result.games.current_page;
        this.setUserContent(result.user);
    
        // Create button - moved before the table
        const buttonCreate = document.createElement('button');
        buttonCreate.textContent = 'Crear Nuevo';
        buttonCreate.setAttribute('data-bs-toggle', 'modal');
        buttonCreate.setAttribute('data-bs-target', '#createModal');
        buttonCreate.classList.add('btn', 'btn-success', 'mb-3');
        buttonCreate.dataset.url = "/game";
        buttonCreate.dataset.method = "post";
        this.content.appendChild(buttonCreate);
    
        // Table header
        const headerRow = document.createElement('div');
        headerRow.classList.add('row', 'mb-3', 'fw-bold', 'border-bottom', 'pb-2');
        
        const headers = ['ID', 'Nombre del Juego', 'Precio', 'Plataforma', 'Acciones'];
        headers.forEach(headerText => {
            const header = document.createElement('div');
            header.classList.add('col');
            header.textContent = headerText;
            headerRow.appendChild(header);
        });
        
        this.content.appendChild(headerRow);
    
        result.games.links.forEach(element => { 
            this.pageItem.add(element, (data) => {
                this.setContent(data);
            });
        });
    
        result.games.data.forEach(element => { 
            this.responseRow.add(element);
        });
    }
    
    setUserContent(user) {
        this.cleanContent(this.userContent);
        if (user === null) {
            this.setNoUserContent();
        } else {
            this.setCurrentUserContent(user);
        }
    }

    setCurrentUserContent(user) {
        if (!user || !user.name) {
            console.error('Invalid user object:', user);
            return;
        }
    
        let listItem = document.createElement('li');
        listItem.classList.add('nav-item', 'dropdown');
        let a = document.createElement('a');
        a.classList.add('nav-link', 'dropdown-toggle');
        a.setAttribute('data-bs-toggle', 'dropdown');
        let textNode = document.createTextNode(user.name);
        a.appendChild(textNode);
        listItem.appendChild(a);
        this.userContent.appendChild(listItem);
    
        let div = document.createElement('div');
        div.classList.add('dropdown-menu', 'dropdown-menu-end');
        a = document.createElement('a');
        a.id = 'logoutLink';
        a.classList.add('dropdown-item');
        a.setAttribute('data-url', '/logout');
        textNode = document.createTextNode('Logout');
        a.appendChild(textNode);
        div.appendChild(a);
        listItem.appendChild(div);
        this.userContent.appendChild(listItem);
    }

    setNoUserContent() {
        let listItem = document.createElement('li');
        listItem.classList.add('nav-item');

        let aElement = document.createElement('a');
        aElement.classList.add('nav-link');
        aElement.dataset.url = '/login';
        aElement.setAttribute('data-bs-toggle', 'modal');
        aElement.setAttribute('data-bs-target', '#loginModal');
        let textNode = document.createTextNode('Login');

        aElement.appendChild(textNode);
        listItem.appendChild(aElement);
        this.userContent.appendChild(listItem);

        listItem = document.createElement('li');
        listItem.classList.add('nav-item');
        aElement = document.createElement('a');
        aElement.classList.add('nav-link');
        aElement.dataset.url = '/register';
        //aElement.dataset['bs-toggle'] = 'modal';
        //aElement.dataset['bs-target'] = "#registerModal";
        aElement.setAttribute('data-bs-toggle', 'modal');
        aElement.setAttribute('data-bs-target', '#registerModal');
        textNode = document.createTextNode('Register');

        aElement.appendChild(textNode);
        listItem.appendChild(aElement);
        this.userContent.appendChild(listItem);
    }
}
