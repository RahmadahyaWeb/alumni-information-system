@extends('frontend.layouts.app')

@section('content')
    <!-- Modal add -->
    <div class="modal fade" id="thread" tabindex="-1" aria-labelledby="threadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="threadLabel">Create your own thread</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('forum.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter your thread title here" required>
                                    <label for="title">Enter your thread title here</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Share your thoughts here" id="body" style="height: 100px" required
                                        name="body"></textarea>
                                    <label for="body">Share your thoughts here</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewire('post-card')
@endsection
