@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User List</h1>
    </div>
    <div id="container" class="container">
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
                        <a href="#" onclick="editUser('{{ $user->id }}', '{{ $user->usertype }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->address }}')" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#edit-user-modal" title="Edit"><span data-feather="edit"></span></a>
                        <form action="{{ route('user-list.destroy', $user->id) }}" method="POST"
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
                        <i class='bx bx-x text-dark fs-2 icon'></i>
                    </div>
                </div>
                
                <form id="edit-user-form" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="modal-body">
    
                        <div class="select-container d-flex align-items-center gap-2 w-100">
                            <div class="edit-usertype-container w-100">
                                <label for="edit-usertype" class="mb-2 mt-3">Roles</label>
                                <select id="edit-usertype" name="usertype" class="form-select" aria-label="Default select example">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-name">Name</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-username"></p>
                        </div>
                        <input type="text" id="edit-name" class="form-control text-dark" name="name" placeholder="Masukkan Username" value="{{ old('name', $user->name) }}" autocomplete="off" required>
    
                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-email" class="">Email</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-email"></p>
                        </div>
                        <input type="email" id="edit-email" class="form-control text-dark" name="email" placeholder="Masukkan Email" value="{{ old('email', $user->email) }}" autocomplete="off" required>

                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-phone">Phone</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-phone"></p>
                        </div>
                        <input type="text" id="edit-phone" class="form-control text-dark" name="phone" placeholder="Masukkan Nomor Telepon" value="{{ old('phone', $user->phone) }}" autocomplete="off" required>
    
                        <div class="error-message-container mb-2 mt-3">
                            <label for="edit-address">Address</label>
                            <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-address"></p>
                        </div>
                        <input type="text" id="edit-address" class="form-control text-dark" name="address" placeholder="Masukkan Alamat" value="{{ old('address', $user->address) }}" autocomplete="off" required>
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

        function editUser(id, usertype, name, email, phone, address) {

            $('#edit-usertype').val(usertype);
            $('#edit-name').val(name);
            $('#edit-email').val(email);
            $('#edit-phone').val(phone);
            $('#edit-address').val(address);

            $('#edit-user-form').attr('action', "{{ route('user-list.update', '') }}" + '/' + id);
            $('#edit-user-modal').modal('show');
        }
    </script>
@endsection
