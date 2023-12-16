@extends('layouts/layout')
@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <a href="{{ route('school.create')}}" class="btn btn-success">
        <i class="bi bi-file-plus">Добавяне
    </a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>№</td>
          <td>Име на заведение</td>
          <td>Град</td>
          <td>Учители</td>
          <td>Ученици</td>
          <td>Рейтинг</td>
          <td colspan="2">Модифициране</td>
        </tr>
    </thead>
    <tbody>
        @foreach($school as $schoolData)
        <tr>
            <td>{{$schoolData->id}}</td>
            <td>"{{$schoolData->name}}"</td>
            <td>гр: {{$schoolData->city}}</td>
            <td>{{$schoolData->staff}}</td>
            <td>{{$schoolData->students}}</td>
            <td>{{$schoolData->rating}}</td>
            <td>
                <a href="{{ route('school.edit', $schoolData->id)}}" class="btn btn-primary">
                    <i class="bi bi-pen"></i>Редактиране
                </a>
            </td>
            <td>
                <form action="{{ route('school.destroy', $schoolData->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">
                    <i class="bi bi-file-earmark-x"></i>Изтриване
                </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection