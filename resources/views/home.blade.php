@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="success-messages">
                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>                    
                @endif
            </div>
            <div class="error-messages">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>

            <button style="display: block" type="button" class="btn btn-success float-end mb-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Create Task</button>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Assigned To</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->deadline}}</td>
                        <td>{{$item->user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('task.create')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                    <label for="description" class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="assigned_to" class="form-label">Deadline</label>
                                <input type="date" id="deadline" class="form-control" name="deadline">
                            </div>
                            <div class="mb-3">
                                <label for="assigned_to" class="form-label">Assigned To</label>
                                <select id="assigned_to" name="assigned_to" class="form-select"
                                    aria-label="Default select example">
                                    <option selected value="">Select User</option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
