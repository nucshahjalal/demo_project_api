@extends('backend.app')
@section('page_title','Vehicle List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
    <div class="page-header-left d-flex align-items-center gap-2">
        <a href="" class="btn btn-sm btn-info">
            <i class="bi bi-file-earmark-excel"></i> Export Excel
        </a>

        <a href="" class="btn btn-sm btn-dark">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
        </a>
    </div>

    <div class="page-header-left d-flex align-items-center gap-2">
        <div class="page-header-right ms-auto">
            <form method="get" action="">
                @csrf
                <div class="d-flex align-items-center gap-2">
                    <input class="form-control" type="text" name="filter" 
                        value="{{ request('filter') }}" id="filter" placeholder="Search...">
                    <div class="col-auto">
                        <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>

       
    </div>
</div>

<div class="main-content">  
    <div class="row">
        <div class="col-xl-12">
            <div class="card stretch stretch-full">
            <div class="card-body">
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table  class="table table-hover mb-0">
                        
                        <tbody>

                           @foreach($students as $student)
@php
    $html = $template->editor_content ?? '';

    // Background
    $bgImage = !empty($template->template_file) 
        ? asset($template->template_file) 
        : '';

    $html = str_replace('[TEMPLATE_FILE]', $bgImage, $html);

    // Photo
    $studentPhoto = !empty($student->photo)
        ? asset('storage/' . $student->photo)
        : asset('images/default-user.png');

    $html = str_replace(['[PHOTO_URL]', '{{photo}}'], $studentPhoto, $html);

    // Data mapping
    $html = str_replace([
        '[NAME]', '{{name}}',
        '[ID]', '{{student_id}}',
        '[F_NAME]'
    ], [
        $student->name ?? '',
        $student->name ?? '',
        $student->reg_id ?? '',
        $student->reg_id ?? '',
        $student->f_name ?? ''
    ], $html);
@endphp

<div class="id-card-render shadow-sm p-1">
    {!! $html !!}
</div>
@endforeach
                    </tbody>
                </table>
                    {!! $vehicles->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <!-- dashboardMainContent -->
        <!-- [ Main Content ] end -->
    </div>
</div>
</div>
    <!-- [ Footer ] start -->
    <!-- @include('backend.footer') -->
    <!-- [ Footer ] end -->
    
</main>

<style>
   .btn {
        text-transform: capitalize;
    }

</style>

<script type="text/javascript">
    
    function updateStatus(id) {
        
        $.ajax({
            url: "/vehicle/update-status/",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
            success: function (response) {
                window.location.href = "{{ url('vehicle/transfer') }}/" + id;
            // window.location.href = "{{ url('vehicle/transfer') }}";
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update vehicle status.',
                });
            }
        });
    }
     
</script>

@endsection

