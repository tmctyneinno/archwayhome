<div class="comment-content">
    <h4 class="mb-1">{{ $comment->author_name }}</h4>
    <p class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('F d, Y \a\t h:i a') }}</p>
    
    <p class="comment" style="width: 780px; object-fit: cover;">{{ $comment->content }}</p>
    
    <div class="comment-like">
        <div class="like-title float-left">
            <a href="#" class="reply-toggle nir-btn mr-2">Reply</a>
        </div>
    </div>
    
    <div class="reply-form" style="display: none;">
        <form id="replyForm_{{ $comment->id }}" class="mt-2">
            <div class="form-wrap">
                <label class="form-label-outside" for="reply-name-{{ $comment->id }}">Your Name:*</label>
                <input class="form-input" id="reply-name-{{ $comment->id }}" type="text" name="author_name" placeholder="Your Name" required>
            </div>
            <div class="form-wrap">
                <label class="form-label-outside" for="reply-email-{{ $comment->id }}">E-mail:*</label>
                <input class="form-input" id="reply-email-{{ $comment->id }}" type="email" name="author_email" placeholder="Email" required>
            </div>
            <div class="form-wrap mb-1">
                <label class="form-label-outside" for="reply-content-{{ $comment->id }}">Comment:*</label>
                <textarea class="form-input" id="reply-content-{{ $comment->id }}" name="content" placeholder="Comment" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            
            <button class="nir-btn" type="submit">Submit</button>
        </form>
    </div>

    @foreach ($comment->replies as $reply)
        @include('users.posts.reply', ['comment' => $reply])
    @endforeach
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('.reply-toggle').click(function(event) {
            event.preventDefault();
            const replyForm = $(this).closest('.comment-content').find('.reply-form');
            replyForm.toggle();
        });

        $('[id^="replyForm_"]').submit(function(event) {
            event.preventDefault();

            var formId = $(this).attr('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("comments.store") }}',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    toastr.success("Reply submitted successfully");
                    setTimeout(function() {
                        window.location.reload(); 
                    }, 2000); 

                    $('#' + formId)[0].reset(); 
                },
                error: function(error) {
                    toastr.error('Error submitting reply');
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
