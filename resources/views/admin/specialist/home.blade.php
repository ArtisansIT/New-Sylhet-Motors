@extends('admin.master')
@section('headerContent')
    <link rel="stylesheet" href="{{ asset('admin/css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('mainContent')
       <div class="box">
         @if (count($datas)<1)

            <h1>There is No data</h1>

        @else

               <div class="box-header">
               @include('admin.massages.massage')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.L  No</th>
                  <th>Name</th>
                  <th>Edit(s)</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->name }}
                                </td>
                                <td><a href="{{ route('specialist.edit', $data->id) }}"><i class="fa fa-edit"></i></a></td>
                                <td>
                                  {{-- <a href="">
                                    <i class="fa  fa-trash-o  text-danger"></i></a> --}}
                                  <form id="form-delete-{{ $data->id }}"  method="POST" style="display: none;" 
                                    action=" {{ route('specialist.destroy',$data->id) }} ">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                  </form>
                                  <a href="" onclick="
                                    if(confirm('Are You Sure To Delete One Item')){
                                      event.preventDefault();
                                      document.getElementById('form-delete-{{ $data->id }}').submit();

                                    }
                                    else
                                    {
                                      event.preventDefault();

                                    }"><i class="fa  fa-trash-o  text-danger"></i></a>
                                </td>
                       
                            </tr>
                    @endforeach
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>S.L  No</th>
                  <th>Name</th>
                  <th>Edit(s)</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>

         @endif
         
            <!-- /.box-body -->
          </div>
@endsection

@section('footerContent')
<script src="{{ asset('admin/css/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection