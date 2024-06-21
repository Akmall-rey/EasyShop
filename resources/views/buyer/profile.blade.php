@extends('layouts.main')

@section('container')

    <main class="profile-container">
        <h2 class="text-2xl font-bold mb-4">My Profile</h2>
        <div>
            <label for="username" class="block font-medium">Username</label>
            <input type="text" id="username" class="form-input w-full mt-1" disabled>
        </div>
        <div>
            <label for="fullname" class="block font-medium">Nama</label>
            <input type="text" id="fullname" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" id="email" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="phone" class="block font-medium">Nomor Telepon</label>
            <input type="tel" id="phone" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4">
            <label for="address" class="block font-medium">Alamat</label>
            <input type="text" id="address" class="form-input w-full mt-1" disabled>
        </div>
        <div class="mt-4 flex">
            <button id="to-seller-page" class="w-full py-2 rounded mt-4 btn-seller">To Seller Page</button>
            <button id="edit-profile" class="w-full py-2 rounded mt-4 btn-save ml-4">Save</button>
        </div>
        <button id="logout" class="w-full py-2 rounded mt-4 btn-logout">Log out</button>
    </main>
@endsection
