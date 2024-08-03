@extends('layout.app')
@section("content")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 m-auto">
            @if(session("error"))
            <div class="alert alert-danger">{{ session("error") }}</div>
            @endif
            @if(session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
            @endif
            <div class="card border">
                <h6 class="card-header"> <span class="float-start">Add Contact</span> <a href="{{ route("contacts.index") }}" class="float-end btn btn-info">Back</a></h6>
                <div class="card-body">
                    <form action="{{ route("contacts.store") }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old("name")  }}" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old("email") }}" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{ old("phone") }}" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ old("address") }}</textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add Contact</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection