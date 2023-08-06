@extends('landingpage.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Change Password</h2>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updatePassword', Auth::user()->id) }} " method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="password" class="form-label"><strong>Password: </strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Input Password">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                    <button type="submit" class="btn btn-success" name="proses">Update</button>
                    <a href="{{ url('/dashboard') }}" class="btn btn-success">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection
