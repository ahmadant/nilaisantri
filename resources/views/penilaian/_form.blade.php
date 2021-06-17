<div class="form-group">
      <label for="squareInput">Nama Santri</label>
      {!! Form::select('id_santri', [''=>'-']+ App\Santri::pluck('nama','id')->all(),null,['class' =>$errors->has('id_santri') ? 'form-control is-invalid' : 'form-control','required' ])!!}
     @if ($errors->has('id_santri'))
      <span class="invalid-feedback">
          <strong>{{ $errors->first('id_santri') }}</strong>
      </span>
     @endif
 </div>
 <div class="form-group">
        <label for="squareInput">Kategori Penilaian</label>
        @php
        $ktgs = App\Kategori::select('id','nama','bobot')->get();
        @endphp
        <div class="form-check">
            @foreach ($ktgs as $item)
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="ktgnilai">
                        <span class="form-check-sign">{{ $item->nama }}({{ $item->bobot }})</span>
                    </label>
            @endforeach
        </div>
</div>
<div class="form-group">
        <label for="squareInput">Keterangan</label>
       {!! Form::textarea('keterangan',null,['class'=>$errors->has('keterangan') ? 'form-control is-invalid' : 'form-control'  ]) !!}
      @if ($errors->has('keterangan'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('keterangan') }}</strong>
        </span>
       @endif
</div>