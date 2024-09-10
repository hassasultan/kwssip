@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Priorities List</h6>
                </div>
                <div class="col-6 text-end">
                  @if(auth()->user()->role == 1)
                  <a class="btn bg-gradient-dark mb-0 mr-3" href="{{ route('admin.priorities-management.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;<i class="fa fa-truck"></i></a>
                  @else
                  <a class="btn bg-gradient-dark mb-0 mr-3" href="{{ route('system.priorities-management.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;<i class="fa fa-truck"></i></a>
                  @endif
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class=" p-0">
            <table id="example1" class="table table-bordered align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                  <th class="text-secondary opacity-7">Action</th>

                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @if(count($prio) > 0)
                    @foreach ($prio as $key => $row)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $row->title }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle">
                              @if(auth()->user()->role == 1)
                              <a href="{{ route('admin.priorities-management.edit',$row->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                              </a>
                              @else
                              <a href="{{ route('system.priorities-management.edit',$row->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                              </a>
                              @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    No Record Find...
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
