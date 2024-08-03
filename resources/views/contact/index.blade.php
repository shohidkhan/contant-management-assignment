@extends('layout.app')
@section("content")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <h6 class="card-header">Search</h6>

                <div class="card-boady p-3">
                    <form action="{{ route("contacts.index") }}" class="" method="GET">
                        <div class="mb-3  row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="Search by name or email">
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            @if(session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
            @endif
            <div class="card border">
                <h6 class="card-header"> <span class="float-start">Contacts</span> <a href="{{ route("contacts.create") }}" class="btn btn-primary float-end">Add Contact</a> </h6>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><a href="{{ route('contacts.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th><a href="{{ route('contacts.index', ['sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Created At</a></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td><a href="{{ route("contacts.edit",$contact->id) }}" class="btn btn-sm btn-success">Edit</a> 
                                        <a href="{{ route("contacts.show", $contact->id	) }}" class="btn btn-sm btn-info">View</a> 

                                        <form style="display: inline;" action="{{ route("contacts.destroy",$contact->id) }}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection