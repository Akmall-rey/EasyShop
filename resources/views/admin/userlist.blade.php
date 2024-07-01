@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User List</h1>
    </div>
    <div id="container" class="container">
        {{-- <h1 class="my-4">Manage User Account</h1> --}}
        {{-- <div id="input-container" class="mb-4">
            <input type="number" id="id-input" class="form-control d-inline-block w-25 mr-2" placeholder="Enter ID">
            <button id="search-btn" class="btn btn-search btn-custom">Search</button> --}}
        {{-- </div> --}}
        <table class="table table-striped" id="mytable">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: left;" >ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($user as $user)
                <tr>
                    <td style="text-align: left;" >{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#edit-user-modal" title="Edit"><span data-feather="edit"></span></a>
                        <form action="#" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge bg-danger border-0"
                                onclick="return confirm('Are you sure?')">
                                <span data-feather="x-circle"></span>
                            </button>
                        </form>                     

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-body-dark">
            <div class="modal-content">
                <div class="modal-header mb-0 pb-0 border-0 d-flex align-items-center justify-content-between">
                    <h5 class="modal-title" id="edit-user-label">Edit User</h5>
                    <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                        <i class='bx bx-x text-light fs-2 icon'></i>
                    </div>
                </div>
                
                <form id="edit-user-form" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="modal-body">
    
                        <div class="select-container d-flex align-items-center gap-2 w-100">
                            <div class="edit-roles-container w-100">
                                <label for="edit-roles" class="mb-2 mt-3">Roles</label>
                                <select id="edit-roles" name="roles" class="form-select" aria-label="Default select example">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-name">Username</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-username"></p>
                        </div>
                        <input type="text" id="edit-name" class="form-control text-dark" name="name" placeholder="Masukkan Username" autocomplete="off" required>
    
                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-email" class="">Email</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-email"></p>
                        </div>
                        <input type="email" id="edit-email" class="form-control text-dark" name="email" placeholder="Masukkan Email" autocomplete="off" required>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" id="edit-user-btn" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
    <!-- Modal Edit User End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });

        function editUser(id, roles, name, email) {

            $('#edit-roles').val(roles);
            $('#edit-name').val(name);
            $('#edit-email').val(email);
        }
    </script>
@endsection
