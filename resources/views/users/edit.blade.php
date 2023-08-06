@extends('landingpage.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-4">
                    <h2>Edit Data User</h2>
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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row mx-1">
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="fullname" class="form-label"><strong>Fullname: </strong></label>
                        <input type="text" value="{{ $user->fullname }}" name="fullname" class="form-control">
                    </div>
                </div>
                {{-- staff nip --}}
                <input type="hidden" value="{{ $user->nip }}" name="nip">
                @if (Auth::user()->role == 'admin')
                    <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                        <div class="form-group">
                            <label for="nip" class="form-label"><strong>NIP: </strong></label>
                            <input type="text" value="{{ $user->nip }}" name="nip" class="form-control"
                                maxlength="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                        <div class="form-group">
                            <label for="role" class="form-label">Role: </label>
                            <select class="form-select" id="role" aria-label="Default select example" name="role">
                                <option selected>Select the role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->role !== 'admin')
                    <input type="hidden" value="{{ $user->role }}" name="role" class="form-control">
                @endif
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email: </strong></label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="phone" class="form-label"><strong>Phone: </strong></label>
                        <input type="number" maxlength="12" name="phone" class="form-control"
                            value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="address" class="form-label"><strong>Address: </strong></label>
                        <textarea class="form-control" style="height:150px" name="address">{{ $user->address }}</textarea>
                    </div>
                </div>
                @if (Auth::user()->role == 'admin')
                    <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                        <div class="form-group">
                            <label for="password" class="form-label"><strong>Password: </strong></label>
                            <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        </div>
                    </div>
                @endif
            </div>
            {{-- password --}}
            @if (Auth::user()->role === 'staff')
                <input type="hidden" name="password" class="form-control" value="{{ $user->password }}">
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-4">
                <button type="submit" class="btn btn-success" name="proses">Update</button>
                <a href="{{ url('/dashboard') }}" class="btn btn-success">Cancel</a>
            </div>
        </div>
        </div>

    </form>
@endsection
