<div>
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <textarea wire:model.defer="body" rows="2" class="form-control mb-2 @error('body') is-invalid @enderror"
                        placeholder="Leave a comment"></textarea>
                    @error('body')
                        <div class="invalid-feedback my-2">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($comments->count() > 0)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <h6 class="card-title">
                            {{ $comment->user->name }}
                        </h6>
                        <p class="card-text text-secondary">
                            {{ $comment->body }}
                        </p>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-primary mb-1"
                                wire:click="selectReply({{ $comment->id }})">Reply</button>
                            @if ($comment->user_id == Auth::user()->id || Auth::user()->role_id == 1)
                                <button class="btn btn-sm btn-warning mb-1"
                                    wire:click="selectEdit({{ $comment->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger mb-1"
                                    wire:click="delete({{ $comment->id }})">Delete</button>
                            @endif
                        </div>
                        @if (isset($comment_id) && $comment_id == $comment->id)
                            <div class="row">
                                <div class="col-md-4">
                                    <form wire:submit.prevent="reply">
                                        <textarea wire:model.defer="body2" rows="2" class="form-control mb-2 @error('body2') is-invalid @enderror"
                                            placeholder="Leave a comment"></textarea>
                                        @error('body2')
                                            <div class="invalid-feedback my-2">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if (isset($edit_comment_id) && $edit_comment_id == $comment->id)
                            <div class="row">
                                <div class="col-md-4">
                                    <form wire:submit.prevent="change">
                                        <textarea wire:model.defer="body2" rows="2" class="form-control mb-2 @error('body2') is-invalid @enderror"
                                            placeholder="Leave a comment"></textarea>
                                        @error('body2')
                                            <div class="invalid-feedback my-2">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if ($comment->childrens)
                            @foreach ($comment->childrens as $comment2)
                                <div class="ms-4 mt-3">
                                    <h6 class="card-title">
                                        {{ $comment2->user->name }}
                                    </h6>
                                    <p class="card-text text-secondary">
                                        {{ $comment2->body }}
                                    </p>
                                    <div class="mb-2">
                                        <button class="btn btn-sm btn-primary mb-1"
                                            wire:click="selectReply({{ $comment2->id }})">Reply</button>
                                        @if ($comment2->user_id == Auth::user()->id || Auth::user()->role_id == 1)
                                            <button class="btn btn-sm btn-warning mb-1"
                                                wire:click="selectEdit({{ $comment2->id }})">Edit</button>
                                            <button class="btn btn-sm btn-danger mb-1"
                                                wire:click="delete({{ $comment2->id }})">Delete</button>
                                        @endif
                                    </div>
                                    @if (isset($comment_id) && $comment_id == $comment2->id)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form wire:submit.prevent="reply">
                                                    <textarea wire:model.defer="body2" rows="2" class="form-control mb-2 @error('body2') is-invalid @enderror"
                                                        placeholder="Leave a comment"></textarea>
                                                    @error('body2')
                                                        <div class="invalid-feedback my-2">
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                    @if (isset($edit_comment_id) && $edit_comment_id == $comment2->id)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form wire:submit.prevent="change">
                                                    <textarea wire:model.defer="body2" rows="2" class="form-control mb-2 @error('body2') is-invalid @enderror"
                                                        placeholder="Leave a comment"></textarea>
                                                    @error('body2')
                                                        <div class="invalid-feedback my-2">
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
