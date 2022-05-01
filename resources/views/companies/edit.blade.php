@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-6 mx-auto">
        <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Update Company </h5>
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
                        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{ $company ? $company->name : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="email"> Email </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="email" value="{{ $company ? $company->email : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="logo"> Logo </label>
                        <input type="file" name="logoFile" class="form-control" id="logoFile" aria-describedby="logo" aria-label="Upload">
                        <img class="form-control"  src="{{ $company->logo_url }}" width="100" />
                    </div>

                    <div class="form-group my-3">
                        <label for="website"> Website </label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="website" value="{{ $company ? $company->website : '' }}" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection