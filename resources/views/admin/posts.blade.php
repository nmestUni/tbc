@extends('layouts.admin')

@section('title', 'სიახლეები')

@section('content')
<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

       
        <div class="container-fluid">


          
          

          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>სახელი</th>
                      <th>მოკლე აღწერა</th>
                      <th>სრული აღწერა</th>
                      <th>შექმნის თარიღი</th>
                      <th>მოქმედება</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>სახელი</th>
                      <th>მოკლე აღწერა</th>
                      <th>სრული აღწერა</th>
                      <th>შექმნის თარიღი</th>
                      <th>მოქმედება</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{!! $post->miniContent !!}</td>
                      <td>{!! $post->content !!}</td>
                      <td>{{ $post->created_at }}</td>
                      
                      <td>
                          <div class="d-flex">
                            <button class="btn">
                                <a href="{{ route('edit',["id"=>$post->id]) }}">
                                  <i class="fas fa-pen fa-lg"></i>
                                </a>
                            </button>
                            {!! Form::open(["action"=>"AdminController@delete","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                <button class="btn text-primary">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            {!! Form::close() !!}
                          </div>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
       

      </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
@endsection