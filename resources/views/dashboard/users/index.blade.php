@extends('dashboard.layouts.tabler.main')

@section('container')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">Overview</div>
        <h2 class="page-title">Daftar Users</h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          
          <a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="icon icon-2"
            >
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            Buat Users
          </a>
          <a
            href="#"
            class="btn btn-primary btn-6 d-sm-none btn-icon"
            data-bs-toggle="modal"
            data-bs-target="#modal-report"
            aria-label="Create new report"
          >
            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="icon icon-2"
            >
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
          </a>
        </div>
        <!-- BEGIN MODAL -->
        <!-- END MODAL -->
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row justify-content-md-center">
      
      <div class="col-md-auto">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
          <div class="alert-icon">
            <!-- Download SVG icon from http://tabler.io/icons/icon/alert-circle -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
              <path d="M12 8v4"></path>
              <path d="M12 16h.01"></path>
            </svg>
          </div>
          <div>
            @error('name')
            <h4 class="alert-heading">Name does not meet requirements:</h4>
            <div class="alert-description">
              <ul class="alert-list">
                <li>{{ $message }}</li>
              </ul>
            </div>
            @enderror
            @error('username')
            <h4 class="alert-heading">Username does not meet requirements:</h4>
            <div class="alert-description">
              <ul class="alert-list">
                <li>{{ $message }}</li>
               
              </ul>
            </div>
            @enderror
            @error('email')
            <h4 class="alert-heading">Email does not meet requirements:</h4>
            <div class="alert-description">
              <ul class="alert-list">
                <li>{{ $message }}</li>
                
              </ul>
            </div>
            @enderror
            @error('password')
            <h4 class="alert-heading">Password does not meet requirements:</h4>
            <div class="alert-description">
              <ul class="alert-list">
                <li>{{ $message }}</li>
              </ul>
            </div>
            @enderror
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif
        @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
          <div class="alert-icon">
            <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
              <path d="M5 12l5 5l10 -10"></path>
            </svg>
          </div>
          <div>
            <h4 class="alert-heading">Berhasil!</h4>
            <div class="alert-description">{{ session('success') }}</div>
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif
      </div>
      
    </div>
    
    <div class="row row-cards">
      @foreach ($users as $user)
      <div class="col-md-6 col-lg-3">
        <div class="card">
          <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3" style="background-image: url(./static/avatars/000m.jpg)"> </span>
            <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
            <div class="text-secondary">{{ $user->email }}</div>
            <div class="mt-3">
              <span class="badge bg-purple-lt">Owner</span>
            </div>
          </div>
          <div class="d-flex">
            <a href="#" class="card-btn btn-edit" data-id="{{ $user->id }}"><!-- Download SVG icon from http://tabler.io/icons/icon/mail -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
              Edit</a>
            <a href="#" class="card-btn btn-delete" data-id="{{ $user->id }}"><!-- Download SVG icon from http://tabler.io/icons/icon/phone -->
              <!-- Download SVG icon from http://tabler.io/icons/icon/phone -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eraser"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3" /></svg>
              Hapus</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex mt-4 align-items-center">
      {{ $users->links() }}
     
    </div>
  </div>
</div>
<!-- BEGIN PAGE ADD MODALS -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="/home/pengaturan/users">
        @csrf
      <div class="modal-body">
        
  
          <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              @error('name') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label>Nama Pengguna</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            @error('username') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
          <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
              @error('email') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
  
          <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              @error('password') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
  
          <div class="mb-3">
              <label>Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control">
          </div>
      
      </div>
     
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal"> Cancel </a>
        <button type="submit" class="btn btn-primary btn-5 ms-auto">
          <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-2"
          >
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
          </svg>
          Tambah Users
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- END PAGE MODALS -->
<!-- BEGIN PAGE ADD MODALS -->
<div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="editForm">
        @csrf
        @method('PUT')
      <div class="modal-body">
        
  
          <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
              @error('name') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label>Nama Pengguna</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
            @error('username') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
          <div class="mb-3">
              <label>Email</label>
              <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
              @error('email') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
  
          <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              @error('password') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
  
          <div class="mb-3">
              <label>Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control">
          </div>
      
      </div>
     
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal"> Cancel </a>
        <button type="submit" class="btn btn-primary btn-5 ms-auto">
          <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-2"
          >
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
          </svg>
          Simpan
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- END PAGE MODALS -->
<!-- BEGIN PAGE DELETE MODALS -->
<div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <div class="modal-body text-center py-4">
        <!-- Download SVG icon from http://tabler.io/icons/icon/alert-triangle -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
          <path d="M12 9v4"></path>
          <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
          <path d="M12 16h.01"></path>
        </svg>
        <h3>Anda Yakin?</h3>
        <div class="text-secondary">Anda yakin ingin menghapus <span id="namedel"></span>? Data akan dihapus dan tidak bisa dikembalikan lagi.</div>
      </div>
      <div class="modal-footer">
        <div class="w-100">
          <form method="POST" id="deleteForm">
            @method('delete')
          <div class="row">
            <div class="col">
              <a href="#" class="btn btn-3 w-100" data-bs-dismiss="modal"> Batal </a>
            </div>
            
             @csrf
            <div class="col">
              <button type="submit" class="btn btn-danger btn-4 w-100" data-bs-dismiss="modal"> Hapus </button>
            </div>
          
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE MODALS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script nonce="{{ $cspNonce }}" >
  $(document).on('click', '.btn-edit', function () {
      var id = $(this).data('id');
      $.ajax({
          url: '/home/pengaturan/users/' + id + '/edit',
          method: 'GET',
          success: function (data) {
              $('#userId').val(data.id);
              $('#name').val(data.name);
              $('#username').val(data.username);
              $('#email').val(data.email);
              $('#editForm').attr('action', '/home/pengaturan/users/' + data.id); // form action update
              $('#editModal').modal('show');
          }
      });
  });
  $(document).on('click', '.btn-delete', function () {
      var id = $(this).data('id');
      $.ajax({
          url: '/home/pengaturan/users/' + id + '/edit',
          method: 'GET',
          success: function (data) {
              $('#userId').val(data.id);
              $('#namedel').text(data.name);
              $('#username').val(data.username);
              $('#email').val(data.email);
              $('#deleteForm').attr('action', '/home/pengaturan/users/' + data.id); // form action update
              $('#modal-delete').modal('show');
          }
      });
  });
  document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById("success-alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.remove(); // atau gunakan .style.display = "none";
        }, 4000); // hilang setelah 4 detik
    }
});
  </script>
@endsection