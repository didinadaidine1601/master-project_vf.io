<div class="content-panel" id="formAdd" style="display: none;">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>


        <form class="form-horizontal" method="post" action="{{ route('ajout_matiere') }}">
            @csrf
            <div class="form-inline">
                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4" for="nom">{{ __('Nom matiere') }}</label>
                    <div class="col-lg-8">
                        <input type="text"
                            @error('nom') 
                        style="border: 1px solid red"
                    @enderror
                            name="nom" class="form-control" id="nom"><br>
                        @error('nom')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="volume_horaire">{{ __('Volume horaire') }}</label>
                    <div class="col-lg-8">
                        <input type="number" name="volume_horaire"
                            @error('volume_horaire')
                    style="border: 1px solid red"
                    
                    @enderror
                            class="form-control" id="volume_horaire"><br>
                        @error('volume_horaire')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="form-inline">
                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4" for="name_UE">{{ __('UE') }}</label>
                    <div class="col-lg-8">
                        <input type="text"
                            @error('name_UE') 
                        style="border: 1px solid red"
                    @enderror
                            name="name_UE" class="form-control" id="name_UE"><br>
                        @error('name_UE')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="semestre">{{ __('Semestre') }}</label>
                    <div class="col-lg-8">
                        <input type="number" name="semestre"
                            @error('semestre')
                    style="border: 1px solid red"
                    
                    @enderror
                            class="form-control" id="semestre"><br>
                        @error('semestre')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
      
            <div class="form-inline">
                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="iduser">{{ __("Nom de l'enseignant") }}</label>
                    <select name="_iduser" class="form-control" id="iduser">

                        @foreach ($listProf as $item)
                        <option value="{{$item->id}}">{{__($item->nom)}} &nbsp;&nbsp;{{$item->prenom}}</option>
                            
                        @endforeach
                    </select>

                </div>

                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="coefficient_ma">{{ __('Coefficient') }}</label>
                    <div class="col-lg-8">
                        <input type="number" name="coefficient_ma"
                            @error('coefficient_ma')
                    style="border: 1px solid red"
                    
                    @enderror
                            class="form-control" id="coefficient_ma"><br>
                        @error('coefficient_maw')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <button class="btn btn-theme" type="submit">{{ __('Ajouter') }}</button>
                    <button class="btn btn-theme04" type="button" id="btn_close">{{ __('Fermer') }}</button>
                </div>
            </div>

        </form>
    </div>
</div>
