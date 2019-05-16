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
                      <th>ანგარიშის ნომერი</th>
                      <th>მოქმედება</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>სახელი გვარი</th>
                      <th>პირადი ნომერი</th>
                      <th>ანგარიშის ნომერი</th>
                      <th>მოქმედება</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($cards as $card)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ App\user::where("id",$card->userId)->first()->name }} {{ App\user::where("id",$card->userId)->first()->surnamename }}</td>
                      <td>{{ App\user::where("id",$card->userId)->first()->PN }}</td>
                      <td>{{ $card->accNum }}</td>
                      <td>
                        
                        @if($card->is_active==1)
                          {!! Form::open(["action"=>"AdminController@cardsblock","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
                            <input type="hidden" name="id" value="{{ $card->id }}">
                            <button class="btn"> 
                              <i class="fa fa-ban text-danger" aria-hidden="true"></i> დაბლოკვა 
                            </button>
                            
                          {!! Form::close() !!}
                        @else
                        {!! Form::open(["action"=>"AdminController@cardsunblock","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
                          <input type="hidden" name="id" value="{{ $card->id }}">
                          <button class="btn"> 
                            <i class="fa fa-check text-success" aria-hidden="true"></i> ბლოკის მოხსნა
                          </button>
                        {!! Form::close() !!}
                        @endif
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