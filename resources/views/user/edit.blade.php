@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form method="post" action="{{ route('user.update', ["user"=>$user->id]) }}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" class="form-control" name="photo" value={{$user->photo}} required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value={{$user->phone}} required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" value="{{$user->location}}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" required>{{$user->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <input type="text" class="form-control" name="skills" value="{{$user->skills}}" required>
        </div>
        <div class="form-group">
            <label for="curriculum">Curriculum:</label>
            <input type="text" class="form-control" name="curriculum" value="{{$user->curriculum}}" required>
        </div>
        <div class="form-group">
            <label for="visible">Visible:</label>
            <select type="form-select" class="form-control" name="visible" value="{{$user->visible}}" required>
                <option value="1" {{ $user->visible == 1 ? 'selected' : '' }}>Sì</option>
                <option value="0" {{ $user->visible == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection