@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_user'))

        <h1 class="bg-danger text-center">{{session('deleted_user')}}</h1>

        @endif

    @if(Session::has('updated_user'))

        <h1 class="bg-primary text-center">{{session('updated_user')}}</h1>

    @endif

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>

          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)


          <tr>
              <td>{{$user->id}}</td>
              <td><img height="75" width="75" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
              <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>

          </tr>

            @endforeach

         @endif


      </tbody>
    </table>

@stop