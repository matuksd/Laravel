@extends('layouts.app')

@section('content')
    <div class="container">
    {!! Form::open(["action" => "App\Http\Controllers\PostsController@store", "method" => "POST"]) !!}
    <div>
    <div style="float: right">
        {{Form::submit('Submit',['class'=>'btn btn-primary','id'=>'submit'])}}
        {{Form::button('Back',['class'=>'btn btn-danger','onclick' => "window.location='http://127.0.0.1:8000/posts'"])}}
        </div>
    <h1>Create Post</h1>
    <hr>
    </div>
        <div class="form-group row">
            {{Form::label('SKU', 'SKU',['class' => 'col-sm-1 col-form-label'])}}
            {{Form::text('SKU', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter SKU'])}}
            @if ($errors->has('SKU')) <p class=" help-block text-danger">{{ $errors->first('SKU') }}</p> @endif
        </div>
        <div class="form-group row">
            {{Form::label('Name', 'Name',['class' => 'col-sm-1 col-form-label'])}}
            {{Form::text('Name', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Name'])}}
            @if ($errors->has('Name')) <p class=" help-block text-danger">{{ $errors->first('Name') }}</p> @endif
        </div>
        <div class="form-group row">
            {{Form::label('Price', 'Price($)',['class' => 'col-sm-1 col-form-label'])}}
            {{Form::text('Price', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Price'])}}
            @if ($errors->has('Price')) <p class=" help-block text-danger">{{ $errors->first('Price') }}</p> @endif
        </div>
        <div class="form-group row">
            {{Form::label('Type', 'Type Switcher',['class' => 'col-sm-1 col-form-label'])}}
            {{Form::select('Type', array('1' => 'DVD-disc', '2' => 'Book', '3' => 'Furniture'), 'M',['class' => 'col-sm-1 form-control','id' => 'select','onchange' => 'change()'])}}
        </div>
        <div id="Select_DVD">
            <div class="form-group row">
                {{Form::label('Size', 'Size(MB)',['class' => 'col-sm-1 col-form-label'])}}
                {{Form::text('Size', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Size'])}}
                @if ($errors->has('Size')) <p class=" help-block text-danger">The size field is required.</p> @endif
            </div>
        </div>
        <div id="Select_Furniture">
             <div class="form-group row">
                {{Form::label('Height', 'Height(CM)',['class' => 'col-sm-1 col-form-label'])}}
                {{Form::text('Height', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Height'])}}
                @if ($errors->has('Height')) <p class=" help-block text-danger">The height field is required.</p> @endif
                {{Form::label('Width', 'Width(CM)',['class' => 'col-sm-1 col-form-label'])}}
                {{Form::text('Width', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Width'])}}
                @if ($errors->has('Width')) <p class=" help-block text-danger">The width field is required.</p> @endif
                {{Form::label('Lenght', 'Lenght(CM)',['class' => 'col-sm-1 col-form-label'])}}
                {{Form::text('Lenght', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Lenght'])}}
                @if ($errors->has('Lenght')) <p class=" help-block text-danger">The lenght field is required.</p> @endif
            </div>
        </div>
        <div id="Select_Book">
            <div class="form-group row">
                {{Form::label('Weight', 'Weight(Kg)',['class' => 'col-sm-1 col-form-label'])}}
                {{Form::text('Weight', '', ['class' => 'col-sm-3 col-form-label', 'placeholder' => 'Enter Weight'])}}
                @if ($errors->has('Weight')) <p class=" help-block text-danger">The weight field is required.</p> @endif
            </div>
        </div>
    {!! Form::close() !!}
    <footer>
        <hr>
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> 
    
    document.getElementById("Select_Furniture").style.display = "none";
    document.getElementById("Select_Book").style.display = "none";

        function change()
        {
          var state=document.getElementById("select").value;
          if(state =="1")
          {
            document.getElementById("Select_DVD").style.display = "block";
            document.getElementById("Select_Furniture").style.display = "none";
            document.getElementById("Select_Book").style.display = "none";
          }
          else if (state =="3")
          {
            document.getElementById("Select_Furniture").style.display = "block";
            document.getElementById("Select_DVD").style.display = "none";
            document.getElementById("Select_Book").style.display = "none";
          }
          else if (state =="2")
          {
            document.getElementById("Select_Book").style.display = "block";
            document.getElementById("Select_DVD").style.display = "none";
            document.getElementById("Select_Furniture").style.display = "none";
          }
        }</script>
@endsection