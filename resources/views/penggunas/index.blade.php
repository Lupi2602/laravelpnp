@extends('layouts.main')


@section('content')
<h2>Edit Pengguna</h2>


@if ($errors->any())
   <div style="color:red;">
       <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
       </ul>
   </div>
@endif


<form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST">
   @csrf
   @method('PUT')


   <label>Nama:</label>
   <input type="text" name="name" value="{{ old('name', $pengguna->name) }}"><br>


   <label>Email:</label>
   <input type="email" name="email" value="{{ old('email', $pengguna->email) }}"><br>


   <label>Telepon:</label>
   <input type="text" name="phone" value="{{ old('phone', $pengguna->phone) }}"><br>


   <button type="submit">Update</button>
</form>
@endsection
