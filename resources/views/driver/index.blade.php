@extends('layouts.master')

@section('content')
    @if (session()->has('suc_message'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session()->get('suc_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('err_message'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            {{ session()->get('err_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex mt-4">
        <h3>Data Driver</h3>
        <button class="btn btn-sm btn-primary ms-auto" id="add-btn"><i class="fa-solid fa-plus"></i> Add Driver</button>
    </div>
    <div class="divTable mt-2">
        <table id="driver-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Driver</th>
                    <th>Plat No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 0)
                @foreach ($data['driver'] as $driver)
                    @php($no += 1)
                    <tr>
                        <td>{{ $no }}.</td>
                        <td>{{ $driver->driver }}</td>
                        <td>{{ $driver->plat_no }}</td>
                        <td>
                            <a href="" id="{{ $driver->id_driver }}" class="btn btn-sm btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="" id="{{ $driver->id_driver }}" class="btn btn-sm btn-danger"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="addDriverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Driver</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('insert-driver') }}" method="post" id="addDriverForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Driver</label>
                            <input type="text" class="form-control" id="driverInput" name="driverInput"
                                placeholder="Driver Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Plat No</label>
                            <input type="text" class="form-control" id="platInput" name="platInput" placeholder="Plat No"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save-add-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModalDriver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Driver</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('insert-driver') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Driver</label>
                            <input type="text" class="form-control" id="editDriverInput" name="editDriverInput"
                                placeholder="Driver Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Plat No</label>
                            <input type="text" class="form-control" id="editPlatInput" name="editPlatInput"
                                placeholder="Plat No" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('myscript')
    <script>
        $('#driver-table').dataTable();

        $('#add-btn').on('click', function() {
            $('#addDriverModal').modal('show');

            $('#save-add-btn').on('click', function() {
                $('addFormData').submit
                // let confirmAlert = confirm('Are you sure to add this data?');

                // if (confirmAlert) {
                //     alert(1);
                // } else {
                //     alert(2);
                // }
            });
        });
    </script>
@endsection
