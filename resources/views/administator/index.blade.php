@extends('administator.admin')

@section('content')
<table class="table table-hover">

    <thead>

      <th>Username</th>

    </thead>

    <tbody>
@foreach($users as $user)

        <tr>

          <td style="text-align: center">{{$user->username}} </td>


        </tr>
@endforeach

    </tbody>

</table>
@endsection