@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form method="post" action="{{ route('user.update', ["user"=>$profile->id]) }}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" class="form-control" name="photo" value={{$profile->photo}} required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value={{$profile->phone}} required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" value="{{$profile->location}}" required>
        </div>

        <div class="form-group">
            <label for="specializations">Specializations:</label>

            @foreach ($specializations as $specialization)
                <input class="form-check-input" type="checkbox" name="specializations[]" id="{{$specialization->id}}"
                    value="{{$specialization->id}}" {{ $userSpecializations?->contains($specialization) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{$specialization->id}}">{{$specialization->name}}</label>
            @endforeach
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" required>{{$profile->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <input type="text" class="form-control" name="skills" value="{{$profile->skills}}" required>
        </div>
        <div class="form-group">
            <label for="curriculum">Curriculum:</label>
            <input type="text" class="form-control" name="curriculum" value="{{$profile->curriculum}}" required>
        </div>
        <div class="form-group">
            <label for="visible">Visible:</label>
            <select type="form-select" class="form-control" name="visible" value="{{$profile->visible}}" required>
                <option value="1" {{ $profile->visible == 1 ? 'selected' : '' }}>Sì</option>
                <option value="0" {{ $profile->visible == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection