<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>NAME</th>
        <th>MONTHLY SALARY</th>
        <th>WORKING DAYS</th>
        <th>SALARY</th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
    <tr>
        <td>{{ $staff->name }}</td>
        <td>{{ $staff->salary }}</td>
        <td>
            @php
            $staff_id = $staff->id;
            $working_days = \App\Models\Attendance::where('staff_id',$staff_id)->where('status',1)->whereBetween('attendance_date',[$from_date,$to_date])->count();
            echo $working_days;
            @endphp
        </td>
        <td>{{ round(($staff->salary/30)*$working_days) }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<br>
<a href="{{ route('print.salary.sheet',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
