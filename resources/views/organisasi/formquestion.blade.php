@extends('layout2')
@section('card')
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('save.question', $form) }}" method="POST">
                    @csrf
                    @for ($i = 0; $i <= 10; $i++)
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="question">Berikan Pertanyaan</label>
                                    <input type="text" name="question[]" class="form-control"
                                        placeholder="Masukan pertanyaan">
                                </div>
                                <div class="col-6">
                                    <label for="question">tipe</label>
                                    <select name="type[]" id="question" class="form-control">
                                        <option selected value="">pilih tipe</option>
                                        @foreach ($formtype as $form)
                                            <option value="{{ $form->id }}">{{ $form->tipe }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="mb-3">
                        <button class="btn btn-primary">simpan data</button>
                        <a href="{{ route('show.event', $question->event->slug) }}" class="btn btn-danger">batalkan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
