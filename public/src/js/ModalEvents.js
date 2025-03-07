import HttpClient from './HttpClient.js';
import ResponseContent from './ResponseContent.js';

export default class ModalEvents {



    constructor(url, csrf) {
        this.url = url;
        this.csrf = csrf;

        this.content = document.getElementById('content');
        this.userContent = document.getElementById('userContent');
        this.pagination = document.getElementById('pagination');
        this.responseContent = new ResponseContent(this.content, this.pagination, this.userContent);

        this.fetchUrl = '';
        this.httpClient = new HttpClient(this.url, this.csrf);

        this.modalCreate = document.getElementById('createModal');
        this.modalCreateButton = document.getElementById('modalCreateButton');
        this.createName = document.getElementById('createName');
        this.createPrice = document.getElementById('createPrice');
        this.createPlatform = document.getElementById('createPlatform');


        this.modalDelete = document.getElementById('deleteModal');
        this.modalDeleteButton = document.getElementById('modalDeleteButton');
        this.deleteName = document.getElementById('deleteName');
        this.deletePrice = document.getElementById('deletePrice');


        this.modalEdit = document.getElementById('editModal');
        this.modalEditButton = document.getElementById('modalEditButton');
        this.editName = document.getElementById('editName');
        this.editPrice = document.getElementById('editPrice');
        this.editPlatform = document.getElementById('editPlatform');

        this.modalLogin = document.getElementById('loginModal');
        this.modalLoginUserButton = document.getElementById('modalLoginUserButton');
        this.loginEmail = document.getElementById('loginEmail');
        this.loginPassword = document.getElementById('loginPassword');

        this.modalRegister = document.getElementById('registerModal');
        this.modalRegisterUserButton = document.getElementById('modalRegisterUserButton');
        this.registerConfirmPassword = document.getElementById('registerConfirmPassword');
        this.registerEmail = document.getElementById('registerEmail');
        this.registerName = document.getElementById('registerName');
        this.registerPassword = document.getElementById('registerPassword');

        this.modalView = document.getElementById('viewModal');
        this.viewId = document.getElementById('viewId');
        this.viewName = document.getElementById('viewName');
        this.viewPrice = document.getElementById('viewPrice');

        this.gamesError = document.getElementById('gamesError');
        this.gamesSuccess = document.getElementById('gamesSuccess');

        this.logoutButton = document.getElementById('logoutButton');

        this.assignEvents();
    }

    assignEvents() {

        this.modalCreate.addEventListener('show.bs.modal', event => {
            document.getElementById('modalCreateWarning').style.display = 'none';
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.createName.value = '';
            this.createPrice.value = '';
        });

        this.modalDelete.addEventListener('show.bs.modal', event => {
            document.getElementById('modalDeleteWarning').style.display = 'none';
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.deleteName.value = event.relatedTarget.dataset.name;
            this.deletePrice.value = event.relatedTarget.dataset.price;
        });

        this.modalEdit.addEventListener('show.bs.modal', event => {
            document.getElementById('modalEditWarning').style.display = 'none';
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.editName.value = event.relatedTarget.dataset.name;
            this.editPrice.value = event.relatedTarget.dataset.price;
            this.editPlatform.value = event.relatedTarget.dataset.platform; // Add this line
        });

        this.modalLogin.addEventListener('show.bs.modal', event => {
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.loginEmail.value = '';
            this.loginPassword.value = '';
        });

        this.modalRegister.addEventListener('show.bs.modal', event => {
            this.fetchUrl = event.relatedTarget.dataset.url;
            this.registerConfirmPassword.value = '';
            this.registerEmail.value = '';
            this.registerName.value = '';
            this.registerPassword.value = '';
        });

        this.modalView.addEventListener('show.bs.modal', event => {
            document.getElementById('modalViewWarning').style.display = 'none';
            this.viewId.value = event.relatedTarget.dataset.id;
            this.viewName.value = event.relatedTarget.dataset.name;
            this.viewPrice.value = event.relatedTarget.dataset.price;
            const url = event.relatedTarget.dataset.url;
            this.httpClient.get(
                url,
                {},
                data => this.responseShow(data)
            );
        });

        this.modalCreateButton.addEventListener('click', event => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    name: this.createName.value,
                    price: this.createPrice.value,
                    platform: this.createPlatform.value,
                    page: this.responseContent.currentPage
                },
                data => this.responseCreate(data)
            );
        });

        this.modalDeleteButton.addEventListener('click', event => {
            this.httpClient.delete(
                this.fetchUrl,
                {
                    page: this.responseContent.currentPage
                },
                data => this.responseDelete(data));
        });

        this.modalEditButton.addEventListener('click', event => {
            this.httpClient.put(
                this.fetchUrl,
                {
                    name: this.editName.value,
                    price: this.editPrice.value,
                    platform: this.editPlatform.value,
                    page: this.responseContent.currentPage
                },
                data => this.responseEdit(data)
            );
        });

        this.modalLoginUserButton.addEventListener('click', event => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    email: this.loginEmail.value,
                    password: this.loginPassword.value,
                },
                data => this.responseLogin(data)
            );
        });

        this.modalRegisterUserButton.addEventListener('click', event => {
            this.httpClient.post(
                this.fetchUrl,
                {
                    name: this.registerName.value,
                    email: this.registerEmail.value,
                    password: this.registerPassword.value,
                    password_confirmation: this.registerConfirmPassword.value
                },
                data => this.responseRegister(data)
            );
        });

    }

    formattedDate(date) {
        date = new Date(date);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    }

    logoutLinkListener() {
        let link = document.getElementById('logoutLink');
        if (link) {
            link.addEventListener('click', event => {
                this.httpClient.post(
                    link.dataset.url,
                    {},
                    data => this.responseLogout(data)
                );
            });
        }
    }

    responseCommonContent(data) {
        this.responseContent.setContent(data);
        this.logoutLinkListener();
    }

    responseCreate(data) {
        if(data.result) {
            this.gamesSuccess.style.display = 'block';
            bootstrap.Modal.getInstance(this.modalCreate).hide();
            document.getElementById('createForm').reset();
            this.httpClient.get('/game', {}, (refreshData) => {
                this.responseCommonContent(refreshData);
            });
            setTimeout(() => {
                this.gamesSuccess.style.display = 'none';
            }, 4000);
        }
    }

    responseDelete(data) {
        if (data.result) {
            this.gamesSuccess.style.display = 'block';
            bootstrap.Modal.getInstance(this.modalDelete).hide();
            this.httpClient.get('/game', {}, (refreshData) => {
                this.responseCommonContent(refreshData);
            });
            setTimeout(() => {
                this.gamesSuccess.style.display = 'none';
            }, 4000);
        } else {
            document.getElementById('modalDeleteWarning').style.display = 'block';
        }
    }

    responseEdit(data) {
        if (data.result) {
            this.gamesSuccess.style.display = 'block';
            bootstrap.Modal.getInstance(this.modalEdit).hide();
            this.httpClient.get('/game', {}, (refreshData) => {
                this.responseCommonContent(refreshData);
            });
            setTimeout(() => {
                this.gamesSuccess.style.display = 'none';
            }, 4000);
        } else {
            document.getElementById('modalEditWarning').style.display = 'block';
        }
    }

    responseLogin(data) {
        if (data.result) {
            bootstrap.Modal.getInstance(this.modalLogin).hide();
            this.responseContent.setUserContent(data.user);
            this.httpClient.get('/game', {}, (gameData) => {
                if (gameData.games && gameData.user) {
                    this.responseCommonContent(gameData);
                }
            });
        }
    }

    responseLogout(data) {
        if (data.result) {
            this.responseContent.setUserContent(null);
        }
    }

    responseRegister(data) {
        if (data.result) {
            bootstrap.Modal.getInstance(this.modalRegister).hide();
        }
        console.log('register ' + data);
    }

     responseShow(data) {
        const { id, name, price } = data.game; 
        this.viewId.value = id;
        this.viewName.value = name;
        this.viewPrice.value = price;
    }

    init() {
        this.httpClient.get(
            '/game',
            {},
            (data) => {
                this.responseCommonContent(data);
            }
        );
    }
}

