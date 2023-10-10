@php
    use App\Models\Mention;
    
@endphp

<div class="corps_bulletin">
    <table>
        <tr>
            <td colspan="2">
                <table>
                    <tr style="border-style:none;">
                        <td class="title">
                            <span style="font-size: 10px;"> <br>
                                {{ __('INSTITUT UNIVERSITAIRE DE GESTION ET DE MANAGEMENT(IUGM)') }} <br>
                                {{ __("Etablissement d'enseignement supérieure puiblic crée par le decret 036905 en conseil du gouvernement du 14 juin 2005. ") }}
                                <br>
                            </span>

                        </td>

                    </tr>
                </table>
            </td>
            <td>
                <img src="{{ asset('images/logo.png') }}" style="width: 80px;max-width: 100px;" alt="logo">

            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td colspan="7">
                            {{ __("Le directeur de l'Institut Universitaire de Gestion et de Management soussigné, atteste que:") }}
                            <br>
                            @if ($dataUser)
                                &nbsp;&nbsp;
                                @foreach ($dataUser as $key => $value)
                                    @if ($key == 0)
                                        @php
                                            $temp_mention = Mention::selectRaw('mentions.*')
                                                ->where('id', $value->_idmention)
                                                ->get();
                                        @endphp

                                        {{ __('M., Mme., Mlle:') }}
                                        {{ $value->nom_etd }} &nbsp;&nbsp;{{ $value->prenom }} <br>
                                        {{ __('Date de naissance:') }}&nbsp;&nbsp; {{ __('Lieu de naissance:') }}
                                        <br>
                                        {{ __("Numero d'inscription:") }}<input type="text"
                                            style="width: 30%;border:0px;background: transparent">&nbsp;&nbsp;
                                        @foreach ($temp_mention as $v)
                                            {{ __('Mention:') }}{{ $v->nom }} <br>
                                        @endforeach
                                        {{ __('Parcours:') }}{{ $value->classe }} <br>

                                        {{ __("Année d'etudes:") }} <input type="text"
                                            style="width: 20%;border:0px;background: transparent">&nbsp;&nbsp;
                                        {{ __('Année Universitaire:') }}<input type="text"
                                            style="width: 20%;border:0px;background: transparent"> <br>
                                        {{ __('à subi avec succès les examens théorique de') }}&nbsp{{ $value->niveau }}&nbsp;{{ $value->classe }}&nbsp;&nbsp;
                                    @endif
                                @endforeach

                            @endif
                            <br>
                            {{ __('Matricule:') }} <input wire:model="matricule" type="number"
                                style="width: 50%;border:0px;background: transparent"> <br>
                        </td>




                    </tr>
                </table>
            </td>
        </tr>

        {{-- semestre 1 --}}

        @foreach ($dataUser as $data)
            {{-- verifions s'il s'agit du 1er position du semestre --}}
            @if ($data->semestre % 2 != 0)
                {{-- verifions s'il s'agit du 2em position du semestre --}}
            @else
            @endif
        @endforeach
        <tr>
            <td colspan="6">
                Semestre <select wire:model="s1" name="semestre" style="width: 50%;border:0px;background: transparent">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <table style="border: 0px solid rgb(22, 18, 18);table-layout:initial;width: 100%">
                    <thead>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __("Unité d'enseignement (UE)") }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('Pourcentage') }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('CC') }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('Examen') }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('Coeff') }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('Notes avec coefficient') }}</th>
                        <th style="border:1px solid rgb(22, 18, 18)">{{ __('Observations') }}</th>
                    </thead>
                    <tbody>
                        @php
                            $t_coeff1 = 0;
                            $t_nt_coeff1 = 0;
                            $moyenne_G1 = 0;
                            
                        @endphp

                        @foreach ($dataUser as $key => $data)
                            {{-- verifions s'il s'agit du 1er position du semestre --}}
                            @if ($data->semestre % 2 != 0)
                                @php
                                    $t_coeff1 = $t_coeff1 + $data->coefficient;
                                    $t_nt_coeff1 = $t_nt_coeff1 + $data->note * $data->coefficient;
                                @endphp
                                <tr style="border:1px solid rgb(22, 18, 18);align-content:center;text-align:center">

                                    <td style="border:1px solid rgb(22, 18, 18)">ECUE1: {{ $data->matiere }}</td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>
                                    <td style="border:1px solid rgb(22, 18, 18)">{{ $data->note }}</td>
                                    <td style="border:1px solid rgb(22, 18, 18)">{{ $data->coefficient }}</td>
                                    <td style="border:1px solid rgb(22, 18, 18)">{{ $data->note * $data->coefficient }}
                                    </td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>




                                </tr>
                            @endif
                        @endforeach
                        <tr style="border:1px solid rgb(22, 18, 18);align-content:center;text-align:center">

                            <td colspan="2" style="text-align: right;border:1px solid rgb(22, 18, 18)">
                                {{ __('Moyenne (*)') }}</td>
                            <td></td>
                            <td></td>
                            <td> </td>
                            @if ($t_coeff1 != 0)
                                <td> {{ $moyenne_G1 = $t_nt_coeff1 / $t_coeff1 }} </td>
                            @endif
                            <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)"> {{ __('V') }}
                            </td>
                        </tr>


                        {{-- semestre 2 --}}
                        <tr>
                            <td colspan="6">
                                Semestre <select wire:model="s2" name="semestre"
                                    style="width: 50%;border:0px;background: transparent">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>

                        @php
                            $t_coeff2 = 0;
                            $t_nt_coeff2 = 0;
                            $moyenne_G2 = 0;
                        @endphp

                        @foreach ($dataUser as $key => $data)
                            {{-- verifions s'il s'agit du 1er position du semestre --}}
                            @if ($data->semestre % 2 == 0)
                                @php
                                    $t_coeff2 = $t_coeff2 + $data->coefficient;
                                    $t_nt_coeff2 = $t_nt_coeff2 + $data->note * $data->coefficient;
                                @endphp
                                <tr style="border:1px solid rgb(22, 18, 18);align-content:center;text-align:center">

                                    <td style="border:1px solid rgb(22, 18, 18)">ECUE1:
                                        {{ $data->matiere }}</td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>
                                    <td style="border:1px solid rgb(22, 18, 18)">{{ $data->note }}
                                    </td>
                                    <td style="border:1px solid rgb(22, 18, 18)">
                                        {{ $data->coefficient }}</td>
                                    <td style="border:1px solid rgb(22, 18, 18)">
                                        {{ $data->note * $data->coefficient }}</td>
                                    <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)">
                                        {{ __('') }}</td>




                                </tr>
                            @endif
                        @endforeach

                        <tr style="border:1px solid rgb(22, 18, 18);align-content:center;text-align:center">

                            <td colspan="2" style="text-align: right;border:1px solid rgb(22, 18, 18)">
                                {{ __('Moyenne (*)') }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            @if ($t_coeff2 != 0)
                                <td> {{ $moyenne_G2 = $t_nt_coeff2 / $t_coeff2 }} </td>
                            @endif
                            <td contenteditable="true" style="border:1px solid rgb(22, 18, 18)"> {{ __('V') }}
                            </td>
                        </tr>

                    </tbody>

                </table>
                <table style="table-layout:fixed;width: 100% ">
                    <tr>
                        <td colspan="6">
                            {{ __("(*) La moyenne d'une UE doit être supérieure ou égale à 11/20.") }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">MOYENNE GENERALE:</td>
                        <td>{{ ($moyenne_G1 + $moyenne_G2) / 2 }}/20</td>
                    </tr>
                </table>

                <table style="table-layout:fixed;width: 100% ">
                    <tr style="border:0px solide transparent">
                        <td colspan="3">
                            {{ __('Fait à Mahajanga, le _______/_______/______') }} <br>

                        </td>
                        <td>{{ __('Le President de jury') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>
