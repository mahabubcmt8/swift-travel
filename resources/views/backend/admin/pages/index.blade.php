@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pages</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
            <a href="{{ route('pages.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
        </h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">Pages List</h3>
                <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($pages) }} </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pages as $key => $item)
                      <tr>
                        <td> {{ $key+1}} </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                          <?php $des =  strip_tags(html_entity_decode($item->description))?>
                          {{ Str::limit($des, $limit = 30, $end = '. . .') }}
                        </td>
                        <td>
                            @if($item->position ==1)
                              nav
                            @else

                            @endif
                            @if($item->position ==2)
                             Both
                            @else

                            @endif
                            @if($item->position ==3)
                            Bottom
                            @else

                            @endif
                        </td>

                       <td>
                            @if($item->status == 1)
                            <a href="{{ route('pages.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
                            @else
                              <a href="{{ route('pages.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Disable</a>
                            @endif
                       </td>
                       <td>
                          <a href="{{ route('pages.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                          <a href="{{ route('pages.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                          <a href="{{ route('pages.delete',$item->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                       </td>

                      </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
