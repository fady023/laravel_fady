@extends('layouts.app')

@section('title', 'Users')

@push("styles")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
@endpush

@section('content')
    <div class="page-heading">
        <div>
            <!-- <p class="eyebrow">Your directory</p> -->
            <h1>People, all in one place.</h1>
            <p class="page-description">Keep your team’s details organized and easy to find.</p>
        </div>
        <a class="button" href="{{ route('user.create') }}">＋ <span>Add a user</span></a>
    </div>

    <section class="panel">
        <div class="panel-body">
            <p class="eyebrow">Getting started</p>
            <h2>Your directory is ready</h2>
            <p class="page-description">Add your first person to get started. Their name and age will be collected in a quick, simple form.</p>
            <div style="margin-top: 24px;">
                <a class="button button-secondary" href="{{ route('user.create') }}">Create your first user</a>
            </div>
        </div>
    </section>

<table class="table theme-primary">
<tr>
  <th class="theme-danger">id</th>
  <th class="theme-danger">name</th>
  <th class="theme-danger">email</th>
  <th class="theme-danger">options</th>
</tr>

@foreach ($users as $user)
<tr>
  <td class="theme-primary">{{ $user->id }}</td>
  <td class="theme-accent">{{ $user->name }}</td>
  <td class="theme-success">{{ $user->email }}</td>
    <td>
       <a href="{{ route('user.show',$user->id) }}" class="btn">Show</a>
       <a href="{{ route('user.edit',$user->id) }}" class="btn">Edit</a>
       <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn">Delete</button>
       </form>
       @if($user->trashed())
       <a href="{{ route('user.restore',$user->id) }}" class="btn">Restore</a>
       @endif
    </td>
</tr>
@endforeach


</table>

@endsection
