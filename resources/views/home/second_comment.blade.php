<!-- resources/views/partials/comment.blade.php -->
<div class="box-comment">
    <div class="unit flex-sm-row unit-spacing-lg flex-column">
        <div class="unit-left">
            <div class="box-comment__icon"><span class="icon custom-font-person"></span></div>
        </div>
        <div class="unit-body">
            <div class="box-comment__body">
                <h5>{{ $comment->author_name }}</h5>
                <time datetime="{{ $comment->created_at->format('Y-m-d') }}">{{ $comment->created_at->format('M d, Y') }}</time>
                <p>{{ $comment->content }}</p>
                <div class="reply-form" style="display: none;">
                    <form method="post" action="{{ route('home.comments.store') }}" class="mt-2">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <div class="form-wrap">
                            <label class="form-label-outside" for="reply-name-{{ $comment->id }}">Your Name:*</label>
                            <input class="form-input" id="reply-name-{{ $comment->id }}" type="text" name="author_name" placeholder="Your Name" required>
                        </div>
                        <div class="form-wrap">
                            <label class="form-label-outside" for="reply-email-{{ $comment->id }}">E-mail:*</label>
                            <input class="form-input" id="reply-email-{{ $comment->id }}" type="email" name="author_email" placeholder="Email" required>
                        </div>
                        <div class="form-wrap">
                            <label class="form-label-outside" for="reply-content-{{ $comment->id }}">Comment:*</label>
                            <textarea class="form-input" id="reply-content-{{ $comment->id }}" name="content" placeholder="Comment" required></textarea>
                        </div>
                        <button class="button button-primary" type="submit">Submit</button>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
