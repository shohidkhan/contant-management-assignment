@extends('layout.app')
@section("content")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border">
                <h6 class="card-header"> <span class="float-start">Contact details of {{ $contact->name }}</span> <a href="{{ route("contacts.index") }}" class="btn btn-primary float-end">Back</a> </h6>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <td>{{ $contact->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $contact->address }}</td>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection