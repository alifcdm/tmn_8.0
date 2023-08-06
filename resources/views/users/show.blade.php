@extends('landingpage.dashboard')
@section('content')
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
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h2 class="card-header text-center mt-3">Profile Details</h2>
                        <hr>
                        <!-- Account -->
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-4 col-12">
                                        <label for="firstName" class="form-label">Full Name</label>
                                        <h3>{{ $user->fullname }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="organization" class="form-label">Status</label>
                                        <h3>{{ $user->role }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <h3>{{ $user->phone }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="address" class="form-label">Email</label>
                                        <h3>{{ $user->email }}</h3>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <h3>{{ $user->address }}</h3>
                                    </div>
                                    <div class="mb-3 col-md-12 text-center">
                                        <label for="address" class="form-label">Created</label>
                                        <h3>{{ $user->created_at }}</h3>
                                    </div>
                            </form>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                    class="bi bi-pencil-square pe-2"></i>Edit</a>
                            <a href="{{ route('editPassword', $user->id) }}" class="btn btn-success">Change
                                Password</a>
                            <a class="btn btn-primary" href="{{ url('/dashboard') }}"> Back</a>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
