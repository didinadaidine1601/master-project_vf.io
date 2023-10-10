@php
use App\Models\User;
    
@endphp
<div class="custom-check goleft mt">
    <table id="hidden-table-info"
    style="margin: 2px"
     class="table table-hover custom-check">
        <thead>
            <th>{{ __('Etudiant') }}</th>
            <th>{{ __('Matière') }}</th>
            <th>{{ __('Enseignant') }}</th>
            <th>{{ __('') }}</th>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr class="@if($item->id %2)gradeX @else gradeA @endif">
                    <td>
                        <span class="badge bg-theme">
                            <label> {{ $item->niveau }}&nbsp;&nbsp;{{ $item->classe }} </label>
                        </span>
                        <label> {{ $item->nom_etd }}&nbsp;&nbsp;{{ $item->prenom_etd }} </label>
                    </td>
                    <td>
                        <span class="badge bg-theme">
                            <label> {{ $item->note }} </label>
                        </span>
                        <label> {{ $item->matiere }} </label>
                    </td>
                    <td>
                        @php
                            $enseignant = User::selectRaw('users.*')
                                ->where('id', $item->idenseignant)
                                ->get();
                        @endphp
                        @foreach ($enseignant as $ens)
                            <span class="check">
                                <label class="badge bg-theme">{{ $ens->matricule }}</label>
                            </span>
                            <label> {{ $ens->nom }}&nbsp;&nbsp;{{ $ens->prenom }} </label>
                        @endforeach
                    </td>
                    <td>
                        <div style="display: flex;float:right">
                            <div>
                                <a href="{{ route('edit-note', ['id'=>$item->id]) }}"
                                    class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil fa-2x"></i>
                                </a>
                            </div>
                            <!-- espace en html -->
                            &nbsp;
                            &nbsp;
                            <div>
                                <form method="Post" action="{{ route('del_note', ['note'=>$item->id]) }}">
                                    @csrf
                                    @method('DELETE')
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
</div>