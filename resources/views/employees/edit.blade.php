@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-6 mx-auto">
        <form action="{{ route('employees.update', $employee->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Update employee </h5>
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
                        <label for="first_name"> First Name </label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="first_name" value="{{ $employee ? $employee->first_name : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="last_name"> Last Name </label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="last_name" value="{{ $employee ? $employee->last_name : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="company_id"> Company </label>
                        <input type="text" name="company_id" id="company_id" class="form-control" placeholder="company_id" value="{{ $employee ? $employee->company_id : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="email"> Email </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="email" value="{{ $employee ? $employee->email : '' }}" />
                    </div>

                    <div class="form-group my-3">
                        <label for="phone"> Phone </label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="phone" value="{{ $employee ? $employee->phone : '' }}" />
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