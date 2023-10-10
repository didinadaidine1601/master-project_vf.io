@extends('components.app')

{{-- section pour style css --}}

@section('stylecss')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        .section_commande button {
            position: relative;
            right: 0%;
            top: 10%;
            float: right;
            margin-top: 10px;
        }

        td.title>img {
            object-fit: cover;
            border-radius: 50%;
        }



        .corps_bulletin {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border: 1px solid #eee;
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neuve", Arial, Helvetica, sans-serif;
            color: #555
        }

        .corps_bulletin table {
            width: 100%;
            line-height: inherit;
            text-align: left
        }

        .corps_bulletin table td {
            padding: 5px;
            vertical-align: top;
        }

        @media print {
            .section_commande {
                display: none
            }

            aside {
                display: none
            }

            header#header {
                display: none
            }

            .corps_bulletin {
                max-width: unset;
                box-shadow: none;
                border: 0px;
                background-color: white;
                height: 100%;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                margin: 0;
                padding: 15px;
                font-size: 14px;
                line-height: 18px;
            }
        }

        @media only screen and(max-width:600px) {
            .corps_bulletin table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        @livewireStyles()
    </style>
@endsection


{{-- section pour le content --}}
@section('content')
    <div class="section_commande">
        <button class="btn-print btn bg-theme"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimer</button>
    </div>

    <a class="save_to_image">
        {{-- page pour le bulletin - --}}

        @livewire('bulletin.create')
    </a>
@endsection



{{-- section apport js - --}}

@section('styleJs')
    <script>
        $(() => {
            const btn_print = $('button.btn-print')
            btn_print.on('click', (event) => {
                window.print()
            })
        })
    </script>
    @livewireScripts()
@endsection
