<div class="content-panel" id="datasource">
    <section id="unseen">
        <table cellpadding="0" cellspacing="0" class="display table table-striped table-condensed" id="hidden-table-info">

            <h4><i class="fa fa-angle-right"></i> {{ __($titre) }}
                <button class="btn btn-primary btn-sm" style="position: relative; left: 30%" id="btn_add">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
            </h4>
            <thead>
                <tr>
                    <th style="text-align: center">{{ __('Nom de la mention') }}</th>
                    <th>{{ __('') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr class="@if($item->id %2)gradeX @else gradeA @endif">
                        <td style="text-align: center;">{{ $item->nom }}</td>
                        <td>
                            <div style="display: flex;float:right">
                                <div>
                                    <button class="btn btn-primary btn-sm" id="btn_edit{{$item->id}}">
                                        <i class="fa fa-edit 2-x" ></i>

                                    </button>

                                </div>
                                <!-- espace en html -->
                                &nbsp;
                                &nbsp;


                                <div>
                                    <form method="Post" action="{{ route('delete_mention', ['mention'=>$item->id]) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash 2-x"></i>
                                        </button>
                                    </form>
                                </div>


                            </div>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </section>
</div>


