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
  <table class="table shadow-lg yajra-datatable" id="table">
  
    <thead>
      <tr class="table-success ">
        <td>Nom</td>
        <td>Prénom</td>
        <td>Email</td>
        <td>Téléphone</td>
        <td>Cours</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script type="text/javascript">
   
    $(function() {
      var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('students.list') }}",
        columns: [
          {
            data: 'nom',
            name: 'nom'
          },
          {
            data: 'prenom',
            name: 'prenom'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'telephone',
            name: 'telephone'
          },
          {
            data: 'cours',
            name: 'cours'
          },
          {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
      });
    });

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