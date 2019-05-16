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
                      <th>სახელი გვარი</th>
                      <th>პირადი ნომერი</th>
                      <th>ტელეფონის ნომერი</th>
                      <th>ელ.ფოსტა</th>
                      <th>აქტიური ბარათები</th>
                      <th>მოქმედება</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>სახელი გვარი</th>
                      <th>პირადი ნომერი</th>
                      <th>ტელეფონის ნომერი</th>
                      <th>ელ.ფოსტა</th>
                      <th>აქტიური ბარათები</th>
                      <th>მოქმედება</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($cards as $card)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ $card->name }} {{ $card->surname }}</td>
                      <td>{{ $card->PN }}</td>
                      <td>{!! $card->mobile !!}</td>
                      <td>{!! $card->email !!}</td>
                      
                      <td>
                      {{ count(App\cards::where("userID",$card->id)->get())  }}
                      </td>
                      <td>
                        
                          {!! Form::open(["action"=>"AdminController@acceptcard","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
                            <input type="hidden" name="id" value="{{ $card->user_id }}">
                            <button class="btn"> 
                              <i class="fas fa-check text-success"></i></i> თანხმობა 
                            </button>
                            
                          {!! Form::close() !!}
                           {!! Form::open(["action"=>"AdminController@rejectcard","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
                            <input type="hidden" name="id" value="{{ $card->user_id }}">
                            <button class="btn"> 
                              <i class="fa fa-ban text-danger" aria-hidden="true"></i> უარყოფა 
                            </button>
                            
                          {!! Form::close() !!}
                        
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