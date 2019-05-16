@extends('layouts.admin')

@section('title', 'სიახლეები')

@section('content')
    <div class="container-fluid py-5 ">
        {!! Form::open(["action"=>"AdminController@store","method"=>"post", "enctype" => "multipart/form-data","class"=>""]) !!}
        @csrf
        
        <div class="form-group d-flex justify-content-between con">
            <div class="col-6" style="padding-left: 0">
                {{Form::text("title","",["class"=>"form-control ","placeholder"=>"სათაური"])}}
            </div>
            <div class=" custom-file col-6"  style="">
                    
                <input type="file" class="custom-file-input" id="validatedCustomFile" required name="file">               
                <label class="custom-file-label " style="margin-right: 0.90rem;margin-left: 10px" for="validatedCustomFile">Choose Image...</label>
                
              
            </div>
            
            
            
             
        </div>

        
        <div class="row" style="margin-right: 0px;">
            <div class="form-group col-6">
                {{Form::label("Course discription","მცირე აღწერა")}}
                {{Form::textarea("mdescript","",["class"=>"form-control","placeholder"=>"აღწერა","id"=>"editor"])}}
            </div>
            <div class="form-group col-6">
                {{Form::label("Course discription","სრული აღწერა")}}
                {{Form::textarea("descript","",["class"=>"form-control","placeholder"=>"აღწერა","id"=>"editor2"])}}
            </div>
        </div>
        
        <div class="d-flex justify-content-end" style="margin-right: 15px;">
            <button class="btn btn-primary">დაპოსტვა</button>
        </div>
    {!! Form::close() !!}


    </div>
    <script src="{{ asset('/') }}vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor2' ,
            {
                allowedContent:
                    'h1 h2 h3 p blockquote strong em;' +
                    'a[!href];' +
                    'img(left,right)[!src,alt,width,height];' +
                    'table tr th td caption;' +
                    'span{!font-family};' +
                    'span{!color};' +
                    'span(!marker);' +
                    'del ins'
            } 
        );
        CKEDITOR.replace( 'editor' ,
            {
                allowedContent:
                    'h1 h2 h3 p blockquote strong em;' +
                    'a[!href];' +
                    'img(left,right)[!src,alt,width,height];' +
                    'table tr th td caption;' +
                    'span{!font-family};' +
                    'span{!color};' +
                    'span(!marker);' +
                    'del ins'+'img'
            } 
        );
        
    </script>
@endsection