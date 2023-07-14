@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Linha do tempo das atualizações do sistema</h1>
        </div><!-- /.container-fluid -->
    </section>

    <livewire:changelog.changelog-create />

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <livewire:changelog.changelog-timeline />
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
        <!-- /.timeline -->
@endsection
