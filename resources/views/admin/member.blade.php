@extends('admin.index')
@section('content')
<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>


<div class="col-sm-6 col-lg-3">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
    </tr>
    <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
    </tr>
    <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
    </tr>
</tbody>
</table>
</div>
<!--/.col-->


<!--/.col-->


<!--/.col-->


<!--/.col-->








</div> <!-- .content -->
@endsection