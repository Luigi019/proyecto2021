<div class="{{ $var = $var ?? '' }}">
    @include('courses.inc.courses', ['collects' => $data, 'var' => $var, 'modal'=>$modal])
</div>

