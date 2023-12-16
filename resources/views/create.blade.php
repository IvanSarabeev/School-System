@extends('layouts/layout')
@section('content')

<div class="card uper">
  <div class="card-header">
    Добавяне на данни
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

      <form method="post" action="{{ route('school.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Име на заведение:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="city">Град:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="staff">Учители:</label>
              <input type="text" class="form-control" name="staff"/>
          </div>
          <div class="form-group">
              <label for="students">Ученици:</label>
              <input type="text" class="form-control" name="students"/>
          </div>
          <div class="form-group">
              <label for="rating">Рейтинг от 0 / 10:</label>
              <input type="text" class="form-control" name="rating"/>
          </div>
          <button type="submit" class="d-inline-flex gap-2 btn btn-success mt-4">
            <i class="bi bi-file-plus"></i>Добави
        </button>
      </form>
  </div>
</div>

@endsection