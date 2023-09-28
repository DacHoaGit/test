<button class="btn btn-secondary btn-sm" type="button" id="swap-{{$type}}-{{ $count }}" data-bs-toggle="dropdown"
    aria-expanded="false">
    Swap
</button>
<ul class="dropdown-menu" aria-labelledby="swap-{{$type}}-{{ $count }}">
    @foreach ($teams as $team_swap)
        @if ($team != $team_swap)
            <li><button data-id="{{ $team->id }}" data-swap-id="{{ $team_swap->id }}" data-type="{{$types}}"
                    class="dropdown-item btn-swap">{{ $team_swap->name }}
                </button>
            </li>
        @endif
    @endforeach
</ul>
