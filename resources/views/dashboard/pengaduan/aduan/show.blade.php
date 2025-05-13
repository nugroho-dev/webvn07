@extends('dashboard.layouts.main')
 @section('container')

  @include('dashboard.layouts.sidebar')
<main class="content">
  @include('dashboard.layouts.header')
  <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
        <div class="me-lg-3">
                <a href="/home/pengaduan/aduan" class="btn btn-secondary d-inline-flex align-items-center me-2"
                     aria-haspopup="true" aria-expanded="false">
                     <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clipRule="evenodd" /></svg>
                    Kembali
                </a>
            
        </div>
    </div>
  </div>
  
  <div class="card border-0 shadow mb-5">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table class="table table-centered table-nowrap mb-7 rounded">
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td class="border-0"> Tanggal </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="border-0"> Nama </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->name }}</td>
                        </tr>
                        <tr>
                            <td class="border-0"> Email </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->email }}</td>
                        </tr>
                        <tr>
                            <td class="border-0"> No HP/Telp </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->nohp }}</td>
                        </tr>
                        <tr>
                            <td class="border-0"> Identitas  </td>
                            <td class="border-0">: </td>
                            <td class="border-0 "><img src="{{ asset('storage/'.$post->kid ) }}"" alt="" class="img-fluid  mb-3 rounded" /></td>
                        </tr>
                        <tr>
                            <td class="border-0"> Subject Aduan </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->subject }}</td>
                        </tr>
                        <tr>
                            <td class="border-0"> Lampiran </td>
                            <td class="border-0">: </td>
                            <td class="border-0 "><img src="{{ asset('storage/'. $post->lampiran  ) }}"" alt="" class="img-fluid  mb-3 rounded" /></td>
                        </tr>
                        <tr>
                            <td class="border-0"> Aduan </td>
                            <td class="border-0">: </td>
                            <td class="border-0 ">{{ $post->aduan }}</td>
                        </tr>
                       
                    </tbody>
                </table>
              
               
        </div>
     
      
        <div class="mt-5">
            <nav aria-label="Page navigation example">
              
            </nav>
        </div>
    </div>
    
</div>

</main>
@endsection