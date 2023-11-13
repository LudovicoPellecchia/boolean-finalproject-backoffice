@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Visualizza la lista delle tue recensioni:</h2>

    @if($userReviews->isEmpty())
    <p class="alert alert-warning">Non hai ancora ricevuto recensioni.</p>
    @else
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Testo</th>
                <th scope="col">Voto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userReviews as $review)
            <tr>
                <td>{{ $review->name }}</td>
                <td>{{ $review->surname }}</td>
                <td>
                    @if(strlen($review->text) > 50)
                    <span class="short-text" id="short-{{ $loop->index }}">{{ substr($review->text, 0, 50) }}...                    <a href="#" class="show-more" data-target="row-{{ $loop->index }}" data-short="short-{{ $loop->index }}">Leggi</a>
                    </span>
                    @else
                    <span class="full-text">{{ $review->text }}</span>
                    @endif
                </td>
                <td>{{ $review->score}} / 5</td>
            </tr>
            <tr class="hidden-row" id="row-{{ $loop->index }}" style="display:none;">
                <td colspan="4">
                    <div class="card p-5 rounded-5">
                        <span class="full-text" id="full-{{ $loop->index }}">{{ $review->text }} <a href="#" class="show-less" style="display:none;"
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
