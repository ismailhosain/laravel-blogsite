@extends('layout.app')


@section('content')

<!--banner section start -->

@include('components.homebanner')

<!--banner section end -->

<!--service section start -->

@include('components.service')

<!--service section end -->

<!--course section start -->

@include('components.courses')

<!--course section end -->

<!--projects section start -->

@include('components.projects')

<!--projects section end -->


@endsection