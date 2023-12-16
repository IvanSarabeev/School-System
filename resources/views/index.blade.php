@extends('layouts/layout')
@section('content')

<div class="uper">
  {{-- Session --}}
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div><br />
    @endif
  {{-- Session --}}
  <header class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom border-black">
    <a href="{{ route('school.create')}}" class="btn btn-success">
      <i class="bi bi-file-plus"></i> Добавяне
    </a>
    <div class="float-end">
      {{ Auth::user()->name }}
      <a href="{{ route('logout') }}" class="btn btn-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </header>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>№</td>
          <td>Име на заведение</td>
          <td>Град</td>
          <td>Учители</td>
          <td>Ученици</td>
          <td>Рейтинг от 0 / 10</td>
          @if(Auth::user()->isAdmin==1)
            <td colspan="2">Модифициране</td>
          @endif
        </tr>
    </thead>
    <tbody>
        @foreach($school as $schoolData)
        <tr>
            <td>{{$schoolData->id}}</td>
            <td>"{{$schoolData->name}}"</td>
            <td>гр:{{$schoolData->city}}</td>
            <td>{{$schoolData->staff}}</td>
            <td>{{$schoolData->students}}</td>
            <td>
                @for ($i = 0; $i < $schoolData->rating; $i++)
                    <img src="https://img.icons8.com/fluency/2x/christmas-star.png" height="16" width="16px">
                @endfor    
            </td>
            <td>
              @if(Auth::user()->isAdmin==1)
                <a href="{{ route('school.edit', $schoolData->id)}}" class="btn btn-primary d-inline-flex gap-2">
                    <i class="bi bi-pen"></i>Редактиране
                </a>
              @endif
            </td>
            <td>
              @if(Auth::user()->isAdmin==1)
                <form action="{{ route('school.destroy', $schoolData->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger d-inline-flex gap-2" type="submit" onsubmit="return confirm('Записът ще бъде изтрит');">
                    <i class="bi bi-file-earmark-x"></i>Изтриване
                </button>
                </form>
              @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <nav class="d-flex align-items-center justify-content-center">
    {{ $school->links() }}
  </nav>
<div>

@endsection