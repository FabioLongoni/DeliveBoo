@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-lg-center">
                <h2 class="px-3">
                    Ciao <span class="text-capitalize c_seco_color font-weight-bold">{{ $user->name }}</span>!
                </h2>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center flex-wrap py-3">
            <div class="col-12 col-lg-5 img_cover box_shadow_stroke px-0 mb-3 mx-lg-3">
                <img src="{{ $restaurant->image_path }}" alt="Foto {{ $restaurant->name }}">
            </div>
            <div class="col-12 col-lg-5 box_shadow_stroke mb-3 mx-lg-3 px-0 d-flex flex-column">
                <h3 class="stroke_bottom px-2 h2">
                    {{ $restaurant->name }}
                </h3>
                <ul class="px-2 py-3 font_standard mb-0 stroke_bottom flex_grow">
                    <li>
                        <span class="h5 font-weight-bold">Indirizzo:</span>
                        {{ $restaurant->address }}
                    </li>
                    <li>
                        <span class="h5 font-weight-bold">Numero i telefono: </span>
                        {{ $restaurant->phone }}
                    </li>
                    <li>
                        <span class="h5 font-weight-bold">P.VA: </span>
                        {{ $restaurant->p_iva }}
                    </li>
                    <li>
                        <span class="h5 font-weight-bold">Email:</span>
                        {{ $user->email }}
                    </li>
                    <li>
                        <ul class="px-0 py-3 d-flex flex-wrap">
                            @foreach ($restaurant->categories as $category)
                                <li class="mr-3 px-2 box_shadow_stroke_small">
                                    {{ $category->name }}
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
                <div class="d-flex justify-content-between align-items-center flex-wrap px-2 py-3">
                    <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" type="button"
                        class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                        title="Modifica il tuo Ristorante">
                        Modifica Ristorante
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="{{ '#popup' }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button">
                        Elimina
                    </button>
                    {{-- <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                            title="Elimina il tuo Ristorante">
                            Elimina ristorante
                        </button>
                    </form> --}}
                </div>
                <!-- Modal -->
                <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="popupLabel"
                    aria-hidden="true">
                    <div class="modal-dialog box_shadow_stroke_small rounded-0">
                        <div class="modal-content rounded-0">
                            <div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="px-3 py-2 d-block">&times;</span>
                                </button>
                                <h5 class="modal-title px-3 py-2" id="popupLabel">Elimina Ristorante</h5>
                            </div>
                            <div class="modal-body font-weight-bold stroke_bottom">
                                Eliminare il ristorante? Cancellerai anche il tuo account...
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 mr-auto"
                                    data-dismiss="modal">Annulla</button>
                                <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST"
                                    class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg_seco_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 text-center font-weight-bold">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
