@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Visualizza la lista dei tuoi messaggi:</h2>

    @if($userMessages->isEmpty())
    <p class="alert alert-warning mt-4">Non hai ancora ricevuto messaggi.</p>
    @else
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th scope="col">Testo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userMessages as $userMessage)
            <tr>
                <td>{{ $userMessage->name }}</td>
                <td>{{ $userMessage->surname }}</td>
                <td>{{ $userMessage->email}}</td>

                <td>
                    @if(strlen($userMessage->description) > 50)
                    <span class="short-text" id="short-{{ $loop->index }}">{{ substr($userMessage->description, 0, 50) }}...
                        <a href="#" class="show-more" data-target="row-{{ $loop->index }}" data-short="short-{{ $loop->index }}">Leggi</a>
                    </span>
                    @else
                    <span class="full-text">{{ $userMessage->description }}</span>
                    @endif
                </td>
            </tr>
            <tr class="hidden-row" id="row-{{ $loop->index }}" style="display:none;">
                <td colspan="4">
                    <div class="card p-5 rounded-5">
                        <span class="full-text" id="full-{{ $loop->index }}">{{ $userMessage->description }} <a href="#" class="show-less" style="display:none;"
                                data-target="row-{{ $loop->index }}" data-short="short-{{ $loop->index }}">Nascondi</a>
                        </span>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showMoreLinks = document.querySelectorAll('.show-more');
        const showLessLinks = document.querySelectorAll('.show-less');

        showMoreLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const targetRowId = this.getAttribute('data-target');
                const targetRow = document.getElementById(targetRowId);
                const shortTextId = this.getAttribute('data-short');
                const shortText = document.getElementById(shortTextId);
                
                targetRow.style.display = 'table-row';
                this.style.display = 'none';

                if (shortText) {
                    shortText.style.display = 'none';
                }

                const showLessLink = targetRow.querySelector('.show-less');
                if (showLessLink) {
                    showLessLink.style.display = 'inline';
                }
            });
        });

        showLessLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const targetRowId = this.getAttribute('data-target');
                const targetRow = document.getElementById(targetRowId);
                const shortTextId = this.getAttribute('data-short');
                const shortText = document.getElementById(shortTextId);
                
                targetRow.style.display = 'none';

                if (shortText) {
                    shortText.style.display = 'inline';
                }

                const showMoreLink = targetRow.previousElementSibling.querySelector('.show-more');
                if (showMoreLink) {
                    showMoreLink.style.display = 'inline';
                }
            });
        });
    });
</script>


<style>
    a{
        text-decoration: none;
        text-align: end;
        display: inline-block;
        text-align: end
    }
</style>
@endsection
