@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br />
  @endif
.table
  <table class="table shadow-lg">
    <caption class="text-center">Liste des étudiants</caption>
    <thead>
      <tr class="table-success">

        <td>Nom</td>
        <td>Prénom</td>
        <td>Email</td>
        <td>Téléphone</td>
        <td>Cours</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($student as $students)
      <tr>
        <td>{{$students->nom}}</td>
        <td>{{$students->prenom}}</td>
        <td>{{$students->email}}</td>
        <td>{{$students->telephone}}</td>
        <td>{{$students->cours}}</td>
        <td class="text-center">
          <a href="{{ route('students.edit', $students->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
          <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm delete-confirm" type="submit"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
      $('.delete-confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Attention !!!`,
            text: "Si vous cet étudiant, il disparaîtra pour toujours.",
            icon: "warning",
            buttons: ["Annuler", "Confirmer"],
            dangerMode: true,
            cancelButtonColor: '#d33',
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
    </script>
    @endsection