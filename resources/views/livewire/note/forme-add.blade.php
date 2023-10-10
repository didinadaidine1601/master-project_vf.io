@php
    use App\Models\Matiere;
    use App\Models\User;
    use App\Models\Notes;
    $id = 0;
    
@endphp
<div class="content-panel" id="formAdd">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>
        <form class="form-horizontal">
            @csrf
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matiere">{{ __('Matiere') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="matiere" id="matiere" wire:model="w_selectedmatiere"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>
                        <option value="" style="text-align: center">{{ __('selectionnez une matiere') }}</option>
                        @foreach ($matiere as $item)
                            <option style="text-align: center" value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('matiere')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="note">{{ __('Note') }}</label>
                <div class="col-lg-8">
                    <input type="number" wire:model="w_note"
                        style="text-align: center;@error('note') 
                        border: 1px solid red
                    @enderror"
                        name="note" class="form-control" id="notes"><br>
                    @error('note')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matricule">{{ __('Matricule') }}</label>
                <div class="col-lg-8">
                    <input type="number" style="text-align: center" wire:model="w_matricule" name="matricule"
                        class="form-control" id="matricule"><br>
                    @php
                        
                        $Usedata = User::selectRaw('users.*')
                            ->where('matricule', $w_matricule)
                            ->get();
                        
                        foreach ($Usedata as $value) {
                            $id = $value->id;
                        }
                        
                    @endphp

                    @foreach ($Usedata as $value)
                        <span
                            style="font-family: monospace;font-size: 16px;">{{ $value->nom }}&nbsp;&nbsp;{{ $value->prenom }}
                        </span>
                    @endforeach
                </div>
            </div>
            

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="classe">{{ __('Classe') }}</label>

                <div class="col-lg-8">
                    <select class="form-control" name="classe" id="classe" wire:model="w_selectedClasse"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>

                        <option value="" style="text-align: center">{{ __('selectionnez la classe') }}
                        </option>

                        @foreach ($option as $item)
                            <option style="text-align: center" value="{{ $item->id }}">
                                {{ $item->niveau }}&nbsp;&nbsp;{{ $item->nom }}</option>
                        @endforeach



                    </select>
                    <br>
                    @error('classe')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>



            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <label style="color:red">
                        @if ($erreur)
                            {{ __('veuillez remplir tous les champs') }}
                        @endif
                    </label>
                    <button class="btn btn-theme" wire:click="onAdd({{ $id }})" type="button"
                        id="btnAddlist">{{ __('Ajouter') }}</button>
                    <button class="btn btn-theme04" type="submit" id="btn_close">{{ __('Annuler') }}</button>
                </div>
            </div>

        </form>

        <table id="todo" class="table table-hover">
            <thead>
                <th>{{ __('Etudiant') }}</th>
                <th>{{ __('Matière') }}</th>
                <th>{{ __('Note') }}</th>
                <th>{{ __('') }}</th>
            </thead>
            <tbody id="listchaine">
                @foreach ($temp_data as $key => $value)
                    <tr>
                        <td>
                            @php
                                $datauser = User::selectRaw('users.nom,users.prenom')
                                    ->where('matricule', $value['_idUser'])
                                    ->get();
                                
                                foreach ($datauser as $u) {
                                    echo $u->nom . ' ' . $u->prenom;
                                }
                            @endphp
                        </td>
                        <td>
                            @php
                                $data = Matiere::selectRaw('matieres.nom')
                                    ->where('id', $value['_idmatiere'])
                                    ->get();
                                foreach ($data as $m) {
                                    echo $m->nom;
                                }
                            @endphp </td>
                        <td>{{ $value['note'] }} </td>
                        <td>
                            <div style="float: left;">

                                <div>
                                    <button class="btn btn-danger btn-sm" wire:click="deleteNote({{ $key }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>
                    @if ($err)
                        <label
                            style="color:red">{{ __('une erreur est survenue lors de cette enregistrement') }}</label>&nbsp;&nbsp;
                    @endif
                    @if ($temp_data)
                        <button wire:click="onSave" style="color:white" id="btn_save"
                            class="btn btn-black bg-theme">Sauvegarder</button>
                    @endif
                </td>
            </tfoot>
        </table>
    </div>
</div>
