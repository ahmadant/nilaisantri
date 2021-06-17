@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Form</div>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>'santri.store','method'=>'POST']) !!}

            @include('santri._formcopy')


        </div>
        <div class="card-action">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('santri.index') }}" class="btn btn-danger">Cancel</a>
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endsection