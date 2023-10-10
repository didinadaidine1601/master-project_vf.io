@extends('components.app')

{{-- section pour style css --}}

@section('stylecss')
    @livewireStyles()
@endsection

{{-- section pour le content --}}
@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">

            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">

                    <div class="content-panel" id="datasource" style="display: block">
                        <section id="unseen">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h4><i class="fa fa-angle-right"></i> {{ __('Liste de notes') }}
                                        &nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('create-note') }}"
                                            class="btn btn-default btn-sm pull-right bg-theme"
                                            style="position: relative; bottom: 5px;float: right;">Ajouter
                                            des notes</a>
                                    </h4>
                                </div>
                            </div>
                            <!-- tableau -->
                            @livewire('note.datasource', ['titre' => 'Gestion des notes', 'list' => $note])
                            <!-- /table-responsive -->
                        </section>
                    </div>

                </div>
                <!-- /col-md-12 -->
            </div>
        </div>
    </div>
@endsection

{{-- section apport js - --}}

@section('styleJs')
    <script type="text/javascript" language="javascript"
        src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>

    <script>
        {{-- stylejs du dataTable --}}


        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });


        });
    </script>
    @livewireScripts()
@endsection
