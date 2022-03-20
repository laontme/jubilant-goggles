@extends('layout.app')

@section('main')
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo">
                    Personal Access Tokens
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if($tokens->count() > 0)
                    <ul class="list-group mb-3">
                        @foreach($tokens as $token)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-primary">{{ $token->name }}</span>
                                <code class="user-select-all">{{ $token->token }}</code>
                            </div>
                            <form action="{{ route('token.revoke') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{$token->token}}">
                                <button type="submit" class="btn btn-danger">Revoke</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="post" action="{{ route('token.issue') }}">
                        @csrf

                        <label class="w-100 form-label">
                            Token comment
                            <input type="text" class="form-control @error('comment') is-invalid @enderror" name="comment"
                                   placeholder="Ivan's phone" value="{{ old('comment') }}">
                            @error('comment')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </label>

{{--                        <code>{{ $errors }}</code>--}}
                        <button type="submit" class="w-100 btn btn-primary">Issue new token</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
