@extends('layouts.master')

@section('content')
    <div class="d-flex mt-4">
        <h3>List Trip</h3>
        <button class="btn btn-sm btn-primary ms-auto add-btn"><i class="fa-solid fa-plus"></i> Add Trip</button>
    </div>
    <div class="divTable mt-2">
        <table class="table table-bordered table-striped" id="tableTrip">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Driver</th>
                    <th>Plat No</th>
                    <th>Date</th>
                    <th>Point Start</th>
                    <th>Point End</th>
                    <th>Distance (KM)</th>
                    <th>Standar Time</th>
                    <th>Price per KM</th>
                    <th>Actual Time</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data['trip']) > 0)
                    @php($no = 1)
                    @foreach ($data['trip'] as $trip)
                        <tr>
                            <td>{{ $no }}.</td>
                            <td>{{ $trip->driver }}</td>
                            <td>{{ $trip->plat_no }}</td>
                            <td>{{ $trip->date }}</td>
                            <td>{{ $trip->point_start }}</td>
                            <td>{{ $trip->point_end }}</td>
                            <td>{{ $trip->distance }}</td>
                            <td>{{ $trip->standard_time }}</td>
                            <td>{{ $trip->priceperkm }}</td>
                            <td>{{ $trip->actual_time }}</td>
                            <td>{{ $trip->total_cost }}</td>
                            <td>
                                <a href="" id="{{ $trip->id_trip }}" class="btn btn-sm btn-warning edit-btn"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" id="{{ $trip->id_trip }}" class="btn btn-sm btn-danger delete-btn"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @php($no++)
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myscript')
    <script>
        $('#tableTrip').DataTable();
        $('.add-btn').on('click', function(e) {
            $('#addModal').modal('show');
        });
    </script>
@endsection
