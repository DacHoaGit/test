<div id="main" class="container-fluid">
    <div class="row">
        <div class="col-4 bg-primary-subtle">
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text">Add Company</span>
                <input type="text" class="form-control name" placeholder="Name">
                <button data-type="company" class="btn btn-success btn-create">create</button>
            </div>
            <ul>
                @foreach ($companies as $company)
                    <li>
                        <div class="flex flex-row">
                            <span class="col">{{ $company->count }} {{ $company->name }}</span>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse"
                                data-bs-target="#add-company-{{ $company->id }}" aria-expanded="false"
                                aria-controls="add-company-{{ $company->id }}">
                                +
                            </button>
                            @include('swap', ['count' => $company->count, 'teams' => $companies, 'team' => $company,'type' => 'company','types' => 'companies'])

                            
                            <button type="button" data-id="{{ $company->id }}" data-type="company"
                                class="btn-close btn-delete" aria-label="Close"></button>


                            <div class="collapse" id="add-company-{{ $company->id }}">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Add Department</span>
                                    <input type="text" class="form-control name" placeholder="Name">
                                    <button data-type="department" data-company-id="{{ $company->id }}"
                                        class="btn btn-success btn-create">create</button>
                                </div>
                            </div>
                        </div>
                        @foreach ($company->departments as $department)
                            <ul>
                                <li>
                                    <div class="flex flex-row">
                                        <span class="col">{{ $company->count }}.{{ $department->count }}
                                            {{ $department->name }}</span>
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#add-department-{{ $department->id }}"
                                            aria-expanded="false"
                                            aria-controls="add-department-{{ $department->id }}">
                                            +
                                        </button>
                                        @include('swap', ['count' => $department->count, 'teams' => $company->departments, 'team' => $department,'type' => 'department','types' => 'departments'])

                                        
                                        <button type="button" data-id="{{ $department->id }}" data-type="department"
                                            class="btn-close btn-delete" aria-label="Close"></button>

                                        <div class="collapse" id="add-department-{{ $department->id }}">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Add Team</span>
                                                <input type="text" class="form-control name" placeholder="Name">
                                                <button data-type="team" data-company-id="{{ $company->id }}"
                                                    data-department-id="{{ $department->id }}"
                                                    class="btn btn-success btn-create">create</button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        @foreach ($department->teams as $team)
                                            <li class="px-4">
                                                <div class="flex flex-row">
                                                    <a href="{{ route('dashboard', [
                                                        'team' => $team->id,
                                                        'department' => $department->id,
                                                        'company' => $company->id,
                                                    ]) }}"
                                                        class="col">{{ $company->count }}.{{ $department->count }}.{{ $team->count }}
                                                        {{ $team->name }}</a>
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#add-team-{{ $team->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="add-team-{{ $team->id }}">
                                                        +
                                                    </button>
                                                    @include('swap', ['count' => $team->count, 'teams' => $department->teams, 'team' => $team,'type' => 'team','types' => 'teams'])

                                                    <button type="button" data-id="{{ $team->id }}"
                                                        data-type="team" class="btn-close btn-delete"
                                                        aria-label="Close"></button>

                                                    <div class="collapse" id="add-team-{{ $team->id }}">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Add Employee</span>
                                                            <input type="text" class="form-control name"
                                                                placeholder="Name">
                                                            <button data-type="employee"
                                                                data-company-id="{{ $company->id }}"
                                                                data-department-id="{{ $department->id }}"
                                                                data-team-id="{{ $team->id }}"
                                                                class="btn btn-success btn-create">create</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-8 bg-success">
            @php
                use App\Enums\ActionEnum;
                use Carbon\Carbon;
            @endphp
            <div class="input-group mb-3 mt-3 w-50">
                <input value="{{$date}}"  type="date" class="form-control input-date" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-info btn-search" type="button" id="button-addon2">Search</button>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Check In</th>
                        <th class="text-center" scope="col">Check Out</th>
                        <th class="text-center" scope="col">Total Hours(Month)</th>
                        <th class="text-center"scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($employees)
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <div class="d-flex flex-column">
                                            @if (isset($employee->dateAttendance->check_in))
                                                <span>

                                                    {{ Carbon::parse($employee->dateAttendance->check_in)->format('H:i:s') }}
                                                </span>

                                                <small
                                                    class="fst-italic">{{ ActionEnum::getKey($employee->dateAttendance->type_check_in) }}</small>
                                            @else
                                                _
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <div class="d-flex flex-column">
                                            @if (isset($employee->dateAttendance->check_out))
                                                <span>

                                                    {{ Carbon::parse($employee->dateAttendance->check_out)->format('H:i:s') }}
                                                </span>

                                                <small
                                                    class="fst-italic">{{ ActionEnum::getKey($employee->dateAttendance->type_check_out) }}</small>
                                            @else
                                                _
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @php
                                        $sum = 0;
                                        foreach ($employee->attendances as $attendance) {
                                            if($attendance->check_in && $attendance->check_out){
                                                $sum = $sum + calculateTotalHours($attendance->check_in, $attendance->check_out);
                                            }
                                        }
                                    @endphp
                                    {{$sum}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-evenly align-items-center">
                                        <div class="d-flex flex-column">
                                            <button data-employee-id="{{ $employee->id }}"
                                                data-type="{{ ActionEnum::FINGERPRINT }}"
                                                class="btn btn-info btn-sm btn-attendance">Chấm Vân tay</button>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <button data-employee-id="{{ $employee->id }}"
                                                data-type="{{ ActionEnum::CARD }}"
                                                class="btn btn-info btn-sm btn-attendance">Quét thẻ</button>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <button data-employee-id="{{ $employee->id }}"
                                                data-type="{{ ActionEnum::FACIAL }}"
                                                class="btn btn-info btn-sm btn-attendance">Quét Mặt</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>


    </div>
</div>
