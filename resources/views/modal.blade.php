<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Create</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="createName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="createName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="createPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="createPrice" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="createPlatform" class="form-label">Platform</label>
                        <input type="text" class="form-control" id="createPlatform" name="platform">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreateWarning">An error ocurred. The game has not
                been created.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modalCreateButton">Create</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editPrice" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="editPlatform" class="form-label">Platform</label>
                        <input type="text" class="form-control" id="editPlatform" name="platform">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditWarning">An error ocurred. The Games has not
                been edited.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modalEditButton">Edit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">An error ocurred. User not created.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modalLoginUserButton">Login</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="registerName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="registerConfirmPassword"
                            name="password_confirmation">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">An error ocurred. User not created.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modalRegisterUserButton">Register</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewModalLabel">View</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewForm">
                    <div class="mb-3">
                        <label for="viewId" class="form-label">Id</label>
                        <input disabled readonly type="text" class="form-control" id="viewId">
                    </div>
                    <div class="mb-3">
                        <label for="viewName" class="form-label">Name</label>
                        <input disabled readonly type="text" class="form-control" id="viewName">
                    </div>
                    <div class="mb-3">
                        <label for="viewPrice" class="form-label">Price</label>
                        <input disabled readonly type="number" class="form-control" id="viewPrice">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalViewWarning">An error ocurred. Games not found.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <strong>Warning!</strong> Are you sure you want to delete this game?
                    <p class="mb-0">This action cannot be undone.</p>
                </div>
                <form id="deleteForm">
                    <div class="mb-3">
                        <label for="deleteName" class="form-label">Name</label>
                        <input readonly disabled type="text" class="form-control" id="deleteName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="deletePrice" class="form-label">Price</label>
                        <input readonly disabled type="number" class="form-control" id="deletePrice" name="price">
                    </div>
                </form>
                <div class="alert alert-warning" role="alert" id="modalDeleteWarning" style="display: none;">
                    An error occurred. The game is still available.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="modalDeleteButton">
                    <i class="fas fa-trash-alt"></i> Confirm Delete
                </button>
            </div>
        </div>
    </div>
</div>