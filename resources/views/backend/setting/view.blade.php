@extends('backend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">Website Logo (header and footer)</label>
                                        <input type="file" value="{{ Setting::get('website_logo') }}"
                                            name="website_logo" class="form-control">
                                    </div>

                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">Website Name</label>
                                        <input type="text" value="{{ Setting::get('website_name') }}"
                                            name="website_name" class="form-control">
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">Maximizar</label>
                                        <input type="file" value="{{ Setting::get('maximizar') }}" name="maximizar"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">Automatizar</label>
                                        <input type="file" value="{{ Setting::get('automatizar') }}" name="automatizar"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">suprimir</label>
                                        <input type="file" value="{{ Setting::get('suprimir') }}" name="suprimir"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <label class="text-capitalize">section-3</label>
                                        <input type="file" value="{{ Setting::get('home_sec3') }}" name="home_sec3"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">step-1</label>
                                        <input type="file" value="{{ Setting::get('home_step1') }}" name="home_step1"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">step-2</label>
                                        <input type="file" value="{{ Setting::get('home_step2') }}" name="home_step2"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">step-3</label>
                                        <input type="file" value="{{ Setting::get('home_step3') }}" name="home_step3"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label class="text-capitalize">contact</label>
                                        <input type="file" value="{{ Setting::get('home_contact') }}"
                                            name="home_contact" class="form-control">
                                    </div>
                                </div>


                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Como Page</h4>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">Image 1</label>
                                        <input type="file" value="{{ Setting::get('como_img1') }}" name="como_img1"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">Image 2</label>
                                        <input type="file" value="{{ Setting::get('como_img2') }}" name="como_img2"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Registero</label>
                                        <input type="file" value="{{ Setting::get('como_register') }}"
                                            name="como_register" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Broker time</label>
                                        <input type="file" value="{{ Setting::get('broker_time') }}" name="broker_time"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Automatizacion</label>
                                        <input type="file" value="{{ Setting::get('como_automati') }}"
                                            name="como_automati" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Estrategias Page</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="text-capitalize">Image 1</label>
                                        <input type="file" value="{{ Setting::get('estra_img1') }}" name="estra_img1"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Iniciar Page</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="text-capitalize">Image 1</label>
                                        <input type="file" value="{{ Setting::get('iniciar_img1') }}"
                                            name="iniciar_img1" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Sobre Page</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 1</label>
                                        <input type="file" value="{{ Setting::get('sobre_img1') }}" name="sobre_img1"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 2</label>
                                        <input type="file" value="{{ Setting::get('sobre_img2') }}" name="sobre_img2"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 3</label>
                                        <input type="file" value="{{ Setting::get('sobre_img3') }}" name="sobre_img3"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Contacto Page</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 1</label>
                                        <input type="file" value="{{ Setting::get('contacto_img1') }}"
                                            name="contacto_img1" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 2</label>
                                        <input type="file" value="{{ Setting::get('contacto_img2') }}"
                                            name="contacto_img2" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-capitalize">Image 3</label>
                                        <input type="file" value="{{ Setting::get('contacto_img3') }}"
                                            name="contacto_img3" class="form-control">
                                    </div>
                                </div>
                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
{{-- <div class="row">
                                    @foreach ($fields as $key => $value)
                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">{{ str_replace("_"," ", $key )}}</label>
<input type="text" value="{{ $value }}" name="{{ $key }}" class="form-control">
</div>
@endforeach
</div> --}}