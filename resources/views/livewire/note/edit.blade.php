@php
    use App\Models\Matiere;
    use App\Models\User;
    $id = 0;
    
    
@endphp
<div class="content-panel" id="formAdd">
    <div id="unseen">
    <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>
        <form class="form-horizontal" method="post" action="{{ route('updatenote', ['note'=>$data->id]) }}">
            @csrf
            @method("PUT")
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matiere">{{ __('Matiere') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="matiere" id="matiere" wire:model="w_selectedmatiere"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>
                        @foreach ($matiere as $item)
                            <option style="text-align: center"  value="{{ $item->id }}">{{ $item->nom }}</option>
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
                        <input type="hidden" name="idUser" value="{{$value->id}}">
                    @endforeach
                </div>
            </div>



            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="classe">{{ __('Classe') }}</label>
                <div class="col-lg-8">

                    <select class="form-control" name="classe" id="classe" wire:model="w_selectedClasse"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>
                    <option value="" style="text-align: center">{{__('selectionnez la classe')}}</option>

                        @foreach ($option as $item)
                            <option style="text-align: center" value="{{ $item->id }}">
                                {{ $item->nom }}&nbsp;&nbsp;{{ $item->niveau }}</option>
                        @endforeach

                    </select>
                    <br>
                    @error('classe')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="coefficient">{{ __('Coefficient') }}</label>
                <div class="col-lg-8">
                    <input type="number" wire:model="w_coefficient"
                        style="text-align: center;@error('coefficient') 
                       border: 1px solid red
                    @enderror"
                        name="coefficient" class="form-control" id="coefficient"><br>
                    @error('coefficient')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                   
                    <button class="btn btn-theme" type="submit"
                        id="btnAddlist">{{ __('Mise à jour') }}</button>
                    <button class="btn btn-theme04" type="reset" id="btn_close">{{ __('Annuler') }}</button>
                </div>
            </div>

        </form>
       
    </div>
</div>