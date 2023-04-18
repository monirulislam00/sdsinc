@foreach ($departments as $department)
    <h3>{{ $department->department_name }}</h3>
    @foreach ($department as $department)
    @endforeach
@endforeach
