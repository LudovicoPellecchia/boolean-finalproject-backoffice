@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Profile</h2>
    <form method="post" action="{{ route('user.store') }}">
        @csrf
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" class="form-control" name="photo" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <input type="text" class="form-control" name="skills" required>
        </div>
        <div class="form-group">
            <label for="curriculum">Curriculum:</label>
            <input type="text" class="form-control" name="curriculum">
        </div>
        <div class="form-group">
            <label for="visible">Visible:</label>
            <select type="form-select" class="form-control" name="visible" required>
                <option value="1">Sì</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="pt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
     
    </form>
</div>
@endsection