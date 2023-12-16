@extends('layouts/layout')
@section('content')

<div class="card uper">
  <div class="card-header">
    Редактиране на запис
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('school.update', $school->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Име на заведение:</label>
              <input type="text" class="form-control" name="name" value="{{ $school->name }}"/>
          </div>
          <div class="form-group">
              <label for="city">Град:</label>
              <input type="text" class="form-control" name="city" value="{{ $school->city }}"/>
          </div>
          <div class="form-group">
              <label for="staff">Учители:</label>
              <input type="text" class="form-control" name="staff" value="{{ $school->staff }}"/>
          </div>
          <div class="form-group">
              <label for="students">Ученици:</label>
              <input type="text" class="form-control" name="students" value="{{ $school->students }}"/>
          </div>
          <div class="form-group">
              <label for="rating">Рейтинг от 0 / 10:</label>
              <input type="text" class="form-control" name="rating" value="{{ $school->rating }}"/>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Редактиране</button>
      </form>
  </div>
</div>

@endsection