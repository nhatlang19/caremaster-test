@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-xl-6 mx-auto">
        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Create Company </h5>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group my-3">
                        <label for="name"> Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="name" />
                    </div>

                    <div class="form-group my-3">
                        <label for="email"> Email </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="email" />
                    </div>

                    <div class="form-group my-3">
                        <label for="logo"> Logo </label>
                        <input type="file" name="logoFile" class="form-control" id="logoFile" aria-describedby="logo" aria-label="Upload">
                    </div>

                    <div class="form-group my-3">
                        <label for="website"> Website </label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="website" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection