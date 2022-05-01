@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Show Company </h5>
            </div>

            <div class="card-body">
                <div class="form-group my-3">
                    <label for="name"> Name </label>
                    <input type="text" name="name" id="name" readonly disabled class="form-control" placeholder="name" value="{{ $company ? $company->name : '' }}" />
                </div>

                <div class="form-group my-3">
                    <label for="email"> Email </label>
                    <input type="text" name="email" id="email" readonly disabled class="form-control" placeholder="email" value="{{ $company ? $company->email : '' }}" />
                </div>

                <div class="form-group my-3">
                    <label for="logo"> Logo </label>
                    <img class="form-control"  src="{{ $company->logo_url }}" width="100" />
                </div>

                <div class="form-group my-3">
                    <label for="website"> Website </label>
                    <input type="text" name="website" id="website" readonly disabled class="form-control" placeholder="website" value="{{ $company ? $company->website : '' }}" />
                </div>

                <div class="form-group">
                    <a href="{{ route('companies.index') }}" class="btn btn-success"> Back </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection