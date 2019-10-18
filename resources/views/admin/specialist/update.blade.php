@extends('admin.master')

@section('mainContent')
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-6 col-md-offset-3">
                 @include('admin.massages.error')
                 @include('admin.massages.massage')
              
                <h1>Update Specialist</h1>
            <form role="form" action="{{ route('specialist.update',$specialist->id) }}" method="post">
             {{ csrf_field() }}
             {{ method_field('PATCH') }}
                <div class="form-group">
                  <label for="exampleInputEmail1">Specialist Update</label>
                  <input type="text" value="{{ $specialist->name }}" class="form-control" name="name" id="exampleInputEmail1" 
                   placeholder="Enter Designation">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection