@extends('landingpage.dashboard')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($isAbsen == null && Auth::user()->role !== 'admin')
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
            </div>
            <form action="{{ url('/absensi/store') }}" method="post">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                    <div class="form-group">
                        <label for="status" class="form-label">Status: </label>
                        <select class="form-select" id="status" aria-label="Default select example" name="status">
                            <option selected>Pilih Status</option>
                            <option value="attend">Attend</option>
                            <option value="permit">Permit</option>
                            <option value="paid leave">Paid Leave</option>
                            <option value="sick">Sick</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                    <button type="submit" id="clockin" class="btn btn-success mx-auto" style="display: none;">
                        <span id="notabsence" style="display: none">Clock In</span>
                        <span id="absence" style="display: none">Absence</span>
                    </button>
                </div>
            </form>
        </div>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card" padding="20px">
            <br>
            <div class="row">
                <div class="text-center">
                    <h3 class="display-3">Riwayat Absensi</h3>
                </div>
            </div>
            @if (Auth::user()->role !== 'staff')
                <div class="row">
                    <div class="col-6 ps-4">
                        <a href="{{ url('absen-excel') }}" type="button" class="btn btn-primary btn-icon-text mr-3">
                            Unduh Absensi (Excel)
                            <i class="typcn typcn-folder btn-icon-append"></i>
                        </a>
                    </div>
                </div>
            @endif
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Clock_in</th>
                            <th>Clock_out</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i = 1; @endphp
                        @foreach ($absensi as $absen)
                            <tr>
                                <th scope="row" class="text-center">{{ $i++ }}</th>
                                <td>{{ $absen->user->fullname }}</td>
                                <td class="text-center">{{ $absen->status }}</td>
                                <td class="text-center">{{ $absen->clock_in }}</td>
                                @if ($absen->clock_out !== null)
                                    <td class="text-center">{{ $absen->clock_out }}</td>
                                @else
                                    <td class="text-center">
                                        @if ($absen->status === 'attend')
                                            <a class="btn btn-primary" href="{{ route('absensi.update', $absen->id) }}"><i
                                                    class="bi bi-pencil-square"></i>Clock Out</a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        //VISIBLE AND HIDE BUTTON ABSENCE
        // Get the select element
        const selectElement = document.getElementById('status');

        // Get the button element
        const buttonClockin = document.getElementById('clockin');

        // Get the span element
        const notAbsence = document.getElementById('notabsence');
        const absence = document.getElementById('absence');

        // Add event listener to the select element
        selectElement.addEventListener('change', function() {
            // Get the selected value
            const selectedValue = this.value;

            // Check the selected value and enable/disable the button accordingly
            if (selectedValue === 'attend') {
                buttonClockin.style.display = 'block';
                notAbsence.style.display = 'block';
                absence.style.display = 'none';
            } else if (selectedValue === 'Pilih Status') {
                buttonClockin.style.display = 'none';
                notAbsence.style.display = 'none';
                absence.style.display = 'none';
            } else {
                buttonClockin.style.display = 'block';
                notAbsence.style.display = 'none';
                absence.style.display = 'block';
            }
        });
    </script>
@endsection
